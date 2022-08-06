<?php

namespace App\Controller;

use App\Entity\AdditionalSurfaces;
use App\Entity\ApartFilter;
use App\Entity\Apartment;
use App\Entity\User;
use App\Form\ApartFilterFormType;
use App\Form\ApartmentFormType;
use App\Repository\ApartmentRepository;
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

class ApartController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * ApartController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     */
    #[Route('/apart/new_apartment/{id}-new-apartment', name: 'new_apart')]
    public function newApartment(Request $request, User $user, NotifierInterface $notifier, FileUploader $fileUploader): Response
    {
        $apart = new Apartment();
        $form = $this->createForm(ApartmentFormType::class, $apart);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $apart->setCreatedAt(new \DateTime('now'))
                ->setUser($user)
                ->setPropertyType('Appartement');
            $additionalSurfaces = $form['additionalSurfaces']->getData();
            foreach ($additionalSurfaces as $additionalSurface){
                $addS = new AdditionalSurfaces();
                $addS->setAdditionalSurfaceName($additionalSurface);
                $apart->addAdditionalSurface($addS);
            }

            if($images = $form['apartmentImages']->getData()){
                $fileUploader->ApartImagesUpload($images, $apart);
            }
            $this->entityManager->persist($apart);
            $this->entityManager->flush();

            $notifier->send(new Notification("L'appartement a été ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('apart/new_apartment.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route('/apart/apartments/{id}-apartments-{slug}', name: 'user_apartments')]
    public function userApartments(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('apart/apartments.html.twig', [
                'results'=>$user->getApartments()
            ]);
        }
        $response = $this->render('apart/apartments.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=> $user->getApartments()
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
     * @param User $user
     * @param string $slug
     * @param Apartment $apartment
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     */
    #[Route('/apart/delete_apartment/{id}-deletion-{user}-{slug}', name: 'delete_property')]
    public function deleteProperty(User $user, string $slug, Apartment $apartment, Request $request, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        if ($this->isCsrfTokenValid('delete'.$apartment->getId(), $request->get('_token'))){
            foreach ($apartment->getApartmentImages() as $apartmentImage){
                $fileUploader->delete($apartmentImage->getFilename());
            }
            $this->entityManager->remove($apartment);
            $this->entityManager->flush();
            $notifier->send(new Notification("L'appartement a bien été supprimé !", ['browser']));
            return $this->redirectToRoute('user_apartments', [
                'id'=>$user->getId(),
                'slug'=>$slug
            ]);
        }
        return $this->redirectToRoute('user_apartments', [
            'id'=>$user->getId(),
            'slug'=>$slug
        ]);
    }

    /**
     * @param Request $request
     * @param ApartmentRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/apart/all_apartments', name: 'all_apartments')]
    public function allApartments(Request $request, ApartmentRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findAllApart(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('apart/all_apartments.html.twig', [
            'aparts'=>$pagination,
            'form_search'=>$form->createView()
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
     * @param Apartment $apartment
     * @param string $slug
     * @return Response
     */
    #[Route('/apart/{id}-apartment-{slug}', name: 'apart_details')]
    public function apartDetails(Apartment $apartment, string $slug):Response{
        if($this->isCsrfTokenValid('apart'.$apartment->getSlug(), $slug)){
            return $this->render('/apart/apartment.html.twig', [
                'id'=>$apartment->getId(),
                'slug'=>$slug,
                'apart'=>$apartment
            ]);
        }
        return $this->render('/apart/apartment.html.twig', [
            'id'=>$apartment->getId(),
            'slug'=>$slug,
            'apart'=>$apartment
        ]);
    }

    /**
     * @param Request $request
     * @param ApartmentRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/apart/search', name: 'apart_search')]
    public function apartSearch(Request $request, ApartmentRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('apart/all_apartments.html.twig', [
                'aparts'=>$pagination,
                'form_search'=>$form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAllApart(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('apart/all_apartments.html.twig', [
            'aparts'=>$pagination,
            'form_search'=>$form->createView()
        ]);
    }
}
