<?php

namespace App\Controller;

use App\Entity\CarSearch;
use App\Entity\ParkAuto;
use App\Entity\ParkAutoSearch;
use App\Entity\ServicesParkAuto;
use App\Entity\User;
use App\Form\CarSearchFormType;
use App\Form\ParkAutoFormType;
use App\Form\ParkAutoSearchFormType;
use App\Repository\CarRepository;
use App\Repository\ParkAutoRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class ParkAutoController extends AbstractController
{

    private EntityManagerInterface $entityManager;

    /**
     * ParkAutoController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/park/auto", name="park_auto")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param ParkAutoRepository $repository
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, ParkAutoRepository $repository): Response
    {
        $search = new ParkAutoSearch();
        $form = $this->createForm(ParkAutoSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('park_auto/index.html.twig', [
                'pagination'=>$pagination,
                'form_search' => $form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('park_auto/index.html.twig', [
            'pagination'=>$pagination,
            'form_search' => $form->createView()
        ]);
        $response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, true);
        $response->setCache([
            'max_age'=>3600,
            's_maxage'=>3600,
            'immutable'=>true,
            'last_modified'=>new \DateTime(),
        ]);
        return $response;
    }

    /**
     * @param Request $request
     * @param User $user
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/park/auto/new_park_auto/{id}-new-park-auto-{slug}", name="new_park_auto")
     */
    public function new_park_auto(Request $request, User $user, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        $parkAuto = new ParkAuto();
        $form = $this->createForm(ParkAutoFormType::class, $parkAuto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $parkAuto->setCreatedAt(new \DateTime('now'));
            $parkAuto->setUser($user);
            $services = $form['services']->getData();
            foreach ($services as $service){
                $servicePk = new ServicesParkAuto();
                $servicePk->setServiceName($service);
                $parkAuto->addService($servicePk);
            }
            if($logo = $form['filename']->getData()){
                $logoFilename = $fileUploader->upload($logo);
                $parkAuto->setFilename($logoFilename);
            }
            $this->entityManager->persist($parkAuto);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre park a été créé avec succès !", ['browser']));

            return $this->redirectToRoute('profile');
        }
        return $this->render('/park_auto/new_park_auto.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param ParkAuto $parkAuto
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/park/auto/edit_park_auto/{id}-edit-park-auto-{slug}", name="edit_park_auto")
     */
    public function edit_park_auto(Request $request, ParkAuto $parkAuto, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        $form = $this->createForm(ParkAutoFormType::class, $parkAuto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $parkAuto->setCreatedAt(new \DateTime('now'));
            $services = $form['services']->getData();
            foreach ($services as $service){
                $servicePk = new ServicesParkAuto();
                $servicePk->setServiceName($service);
                $parkAuto->addService($servicePk);
            }
            if($logo = $form['filename']->getData()){
                $fileUploader->delete($parkAuto->getFilename());
                $logoFilename = $fileUploader->upload($logo);
                $parkAuto->setFilename($logoFilename);
            }
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre park a été modifié avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('/park_auto/edit_park_auto.html.twig', [
            'form'=>$form->createView(),
            'parkAuto'=>$parkAuto
        ]);
    }

    /**
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @param ParkAuto $parkAuto
     * @return Response
     * @Route("/park/auto/delete_park_auto/{id}-deletion", name="delete_park_auto")
     */
    public function delete_park_auto(Request $request, FileUploader $fileUploader, NotifierInterface $notifier, ParkAuto $parkAuto):Response{
        if($this->isCsrfTokenValid('delete'.$parkAuto->getId(), $request->get('_token'))){
            if($parkAuto->getFilename()!== null)
                $fileUploader->delete($parkAuto->getFilename());
            $this->entityManager->remove($parkAuto);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre park auto a bien été supprimé !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @param ParkAuto $parkAuto
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param CarRepository $repository
     * @return Response
     * @Route("/park/auto/park_auto_page/{id}-page", name="park_auto_page")
     */
    public function park_auto_page(ParkAuto $parkAuto, Request $request, PaginatorInterface $paginator, CarRepository $repository):Response{
        $search = new CarSearch();
        $search->setParkAutoId($parkAuto->getId());
        $form = $this->createForm(CarSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('/park_auto/park_auto_page.html.twig', [
                'park_auto'=>$parkAuto,
                'form_search'=>$form->createView(),
                'pagination'=>$pagination,
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findByIdQuery($parkAuto),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('/park_auto/park_auto_page.html.twig', [
            'park_auto'=>$parkAuto,
            'form_search'=>$form->createView(),
            'pagination'=>$pagination
        ]);
        $response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, true);
        $response->setCache([
            'max_age'=>3600,
            's_maxage'=>3600,
            'immutable'=>true,
            'last_modified'=>new \DateTime(),
        ]);
        return $response;
    }

    /**
     * @param ParkAuto $parkAuto
     * @param Request $request
     * @param CarRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     * @Route("/park/auto/park_auto_owner_page/{id}-owener-page-{csrf}", name="park_auto_owner_page")
     */
    public function park_auto_owner_page(ParkAuto $parkAuto, Request $request, CarRepository $repository, PaginatorInterface $paginator):Response{
        if($this->isCsrfTokenValid(''.$parkAuto->getSlug(), $request->get('owner_page'))){
            return $this->render("park_auto/park_auto_owner_page.html.twig", [
                'park_auto'=>$parkAuto,
                'cars'=>$repository->findBy(['park_auto'=>$parkAuto->getId()])
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findByIdQuery($parkAuto),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render("park_auto/park_auto_owner_page.html.twig", [
            'park_auto'=>$parkAuto,
            'pagination'=>$pagination
        ]);
    }

    /**
     * @param ParkAuto $parkAuto
     * @param ServicesParkAuto $servicesParkAuto
     * @return Response
     */
    #[Route('/park/auto/remove_service/{parkAuto}-{service}', name: 'remove_service')]
    public function removeService(ParkAuto $parkAuto, ServicesParkAuto $servicesParkAuto):Response{
        $parkAuto->removeService($servicesParkAuto);
        $this->entityManager->flush();
        return $this->json(["status"=>"Ok"]);
    }
}
