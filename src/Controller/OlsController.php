<?php

namespace App\Controller;

use App\Entity\ApartFilter;
use App\Entity\OfficeShopLand;
use App\Entity\User;
use App\Form\ApartFilterFormType;
use App\Form\OfficeShopLandFormType;
use App\Repository\OfficeShopLandRepository;
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

class OlsController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager){}

    #[Route('/ols', name: 'ols')]
    public function index(): Response
    {
        return $this->render('ols/index.html.twig', [
            'controller_name' => 'OlsController',
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     * @IsGranted("ROLE_USER")
     */
    #[Route('/ols/new_ols/{id}-new-ols', name: 'new_ols')]
    public function newOls(Request $request, User $user, NotifierInterface $notifier, FileUploader $fileUploader):Response{
        $ols = new OfficeShopLand();
        $form = $this->createForm(OfficeShopLandFormType::class, $ols);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ols->setCreatedAt(new \DateTime('now'))
                ->setUser($user);
            if($images = $form['officeShopLandImages']->getData()){
                $fileUploader->olsImagesUpload($images, $ols);
            }
            $this->entityManager->persist($ols);
            $this->entityManager->flush();

            $notifier->send(new Notification($ols->getPropertyType()." ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('ols/new_ols.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     * @IsGranted("ROLE_USER")
     */
    #[Route('/ols/olss/{id}-olss-{slug}', name: 'user_olss')]
    public function userOls(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('ols/olss.html.twig', [
                'results'=>$user->getOfficeShopLands()
            ]);
        }
        $response = $this->render('ols/olss.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=> $user->getOfficeShopLands()
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
     * @param OfficeShopLand $officeShopLand
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     */
    #[Route('/ols/delete_ols/{id}-deleting-{user}-{slug}', name: 'delete_ols')]
    public function deleteOsl(User $user, string $slug, OfficeShopLand $officeShopLand, Request $request, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        if ($this->isCsrfTokenValid('delete'.$officeShopLand->getId(), $request->get('_token'))){
            foreach ($officeShopLand->getOfficeShopLandImages() as $apartmentImage){
                $fileUploader->delete($apartmentImage->getFilename());
            }
            $this->entityManager->remove($officeShopLand);
            $this->entityManager->flush();
            $notifier->send(new Notification("Suppression avec succès !", ['browser']));
            return $this->redirectToRoute('user_olss', [
                'id'=>$user->getId(),
                'slug'=>$slug
            ]);
        }
        return $this->redirectToRoute('user_olss', [
            'id'=>$user->getId(),
            'slug'=>$slug
        ]);
    }

    /**
     * @param Request $request
     * @param OfficeShopLandRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/ols/all_ols', name: 'all_ols')]
    public function allOls(Request $request, OfficeShopLandRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findAllOls(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('ols/all_ols.html.twig', [
            'ols_s'=>$pagination,
            'form_search'=>$form->createView(),
            'ols_type'=>'Bureau(x)|Magasin(s)|Entrepôt(s)'
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
     * @param OfficeShopLand $officeShopLand
     * @param string $slug
     * @return Response
     */
    #[Route('/ols/ols_details/{id}-ols-{slug}', name: 'ols_details')]
    public function olsDetails(OfficeShopLand $officeShopLand, string $slug):Response{
        if($this->isCsrfTokenValid('ols'.$officeShopLand->getSlug(), $slug)){
            return $this->render('/ols/ols.html.twig', [
                'id'=>$officeShopLand->getId(),
                'slug'=>$slug,
                'ols'=>$officeShopLand,
            ]);
        }
        return $this->render('/ols/ols.html.twig', [
            'id'=>$officeShopLand->getId(),
            'slug'=>$slug,
            'ols'=>$officeShopLand
        ]);
    }

    /**
     * @param Request $request
     * @param OfficeShopLandRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/ols/search', name: 'ols_search')]
    public function olsSearch(Request $request, OfficeShopLandRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('studio/all_studios.html.twig', [
                'ols_s'=>$pagination,
                'form_search'=>$form->createView(),
                'ols_type'=>'Bureau(x)|Magasin(s)|Entrepôt(s)'
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAllOls(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('studio/all_studios.html.twig', [
            'ols_s'=>$pagination,
            'form_search'=>$form->createView(),
            'ols_type'=>'Bureau(x)|Magasin(s)|Entrepôt(s)'
        ]);
    }

    #[Route('/ols/all_lands', name: 'all_lands')]
    public function lands(Request $request, OfficeShopLandRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findAllLands(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('ols/all_ols.html.twig', [
            'ols_s'=>$pagination,
            'form_search'=>$form->createView(),
            'ols_type'=>'Terrain(s)'
        ]);
    }
}
