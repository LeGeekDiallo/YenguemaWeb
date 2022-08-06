<?php

namespace App\Controller;

use App\Entity\ApartFilter;
use App\Entity\Studio;
use App\Entity\User;
use App\Form\ApartFilterFormType;
use App\Form\StudioFormType;
use App\Repository\StudioRepository;
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

class StudioController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager){}

    #[Route('/studio', name: 'studio')]
    public function index(): Response
    {
        return $this->render('studio/index.html.twig', [
            'controller_name' => 'StudioController',
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     */
    #[Route('/studio/new_studio/{id}-new-studio', name: 'new_studio')]
    public function newStudio(Request $request, User $user, NotifierInterface $notifier, FileUploader $fileUploader):Response{
        $studio = new Studio();
        $form = $this->createForm(StudioFormType::class, $studio);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $studio->setCreatedAt(new \DateTime('now'))
                ->setUser($user);
            if($images = $form['studioImages']->getData()){
                $fileUploader->studioImagesUpload($images, $studio);
            }
            $this->entityManager->persist($studio);
            $this->entityManager->flush();

            $notifier->send(new Notification("La ".$studio->getPropertyType()." été ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('studio/new_studio.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route('/studio/studios/{id}-studios-{slug}', name: 'user_studios')]
    public function userStudios(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('studio/studios.html.twig', [
                'results'=>$user->getStudios()
            ]);
        }
        $response = $this->render('studio/studios.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=> $user->getStudios()
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

    #[Route('/studio/delete_studio/{id}-deleting-{user}-{slug}', name: 'delete_studio')]
    public function deleteStudio(User $user, string $slug, Studio $studio, Request $request, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        if ($this->isCsrfTokenValid('delete'.$studio->getId(), $request->get('_token'))){
            foreach ($studio->getStudioImages() as $apartmentImage){
                $fileUploader->delete($apartmentImage->getFilename());
            }
            $this->entityManager->remove($studio);
            $this->entityManager->flush();
            $notifier->send(new Notification("Le studio a bien été supprimé !", ['browser']));
            return $this->redirectToRoute('user_studios', [
                'id'=>$user->getId(),
                'slug'=>$slug
            ]);
        }
        return $this->redirectToRoute('user_studios', [
            'id'=>$user->getId(),
            'slug'=>$slug
        ]);
    }

    /**
     * @param Request $request
     * @param StudioRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/studio/all_studios', name: 'all_studios')]
    public function allStudios(Request $request, StudioRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findAllStudio(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('studio/all_studios.html.twig', [
            'studios'=>$pagination,
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
     * @param Studio $studio
     * @param string $slug
     * @return Response
     */
    #[Route('/studio/studio_details/{id}-studio-{slug}', name: 'studio_details')]
    public function studioDetails(Studio $studio, string $slug):Response{
        if($this->isCsrfTokenValid('studio'.$studio->getSlug(), $slug)){
            return $this->render('/studio/studio.html.twig', [
                'id'=>$studio->getId(),
                'slug'=>$slug,
                'studio'=>$studio
            ]);
        }
        return $this->render('/studio/studio.html.twig', [
            'id'=>$studio->getId(),
            'slug'=>$slug,
            'studio'=>$studio
        ]);
    }

    /**
     * @param Request $request
     * @param StudioRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/studio/search', name: 'studio_search')]
    public function studioSearch(Request $request, StudioRepository $repository, PaginatorInterface $paginator):Response{
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
                'studios'=>$pagination,
                'form_search'=>$form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAllStudio(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('studio/all_studios.html.twig', [
            'studios'=>$pagination,
            'form_search'=>$form->createView()
        ]);
    }
}
