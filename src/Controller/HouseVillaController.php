<?php

namespace App\Controller;

use App\Entity\ApartFilter;
use App\Entity\HouseVilla;
use App\Entity\User;
use App\Form\ApartFilterFormType;
use App\Form\HouseVillaFormType;
use App\Repository\HouseVillaRepository;
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

class HouseVillaController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * HouseVillaController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/house/villa', name: 'house_villa')]
    public function index(): Response
    {
        return $this->render('house_villa/index.html.twig', [
            'controller_name' => 'HouseVillaController',
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @param FileUploader $fileUploader
     * @return Response
     */
    #[Route('/house/villa/{id}-new-house', name: 'new_house')]
    public function newHouseVilla(Request $request, User $user, NotifierInterface $notifier, FileUploader $fileUploader):Response{
        $house = new HouseVilla();
        $form = $this->createForm(HouseVillaFormType::class, $house);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $house->setCreatedAt(new \DateTime('now'))
                ->setUser($user);
            if($images = $form['houseVillaImages']->getData()){
                $fileUploader->houseVillaImagesUpload($images, $house);
            }
            $this->entityManager->persist($house);
            $this->entityManager->flush();

            $notifier->send(new Notification("La ".$house->getPropertyType()." été ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('house_villa/new_house.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route('/house/villa/houses/{id}-house-villa-{slug}', name: 'user_houses')]
    public function userHouses(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/house_villa/houses.html.twig', [
                'results'=>$user->getHouseVillas()
            ]);
        }
        $response = $this->render('house_villa/houses.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$user->getSlug(),
            'results'=>$user->getHouseVillas()
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
     * @param HouseVilla $houseVilla
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @return Response
     */
    #[Route('/house/villa/delete_house/{id}-deleting-{user}-{slug}', name: 'delete_house_villa')]
    public function deleteProperty(User $user, string $slug, HouseVilla $houseVilla, Request $request, FileUploader $fileUploader, NotifierInterface $notifier):Response{
        if ($this->isCsrfTokenValid('delete'.$houseVilla->getId(), $request->get('_token'))){
            foreach ($houseVilla->getHouseVillaImages() as $apartmentImage){
                $fileUploader->delete($apartmentImage->getFilename());
            }
            $this->entityManager->remove($houseVilla);
            $this->entityManager->flush();
            $notifier->send(new Notification("La ".$houseVilla->getPropertyType()." a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('user_houses', [
                'id'=>$user->getId(),
                'slug'=>$slug
            ]);
        }
        return $this->redirectToRoute('user_houses', [
            'id'=>$user->getId(),
            'slug'=>$slug
        ]);
    }

    /**
     * @param Request $request
     * @param HouseVillaRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/house/villa/houses', name: 'all_houses')]
    public function allHouses(Request $request, HouseVillaRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findAllHouseVilla(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('house_villa/all_houses.html.twig', [
            'houses'=>$pagination,
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
     * @param Request $request
     * @param HouseVillaRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/house/villa/search', name: 'house_search')]
    public function houseSearch(Request $request, HouseVillaRepository $repository, PaginatorInterface $paginator):Response{
        $search = new ApartFilter();
        $form = $this->createForm(ApartFilterFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('house_villa/all_houses.html.twig', [
                'houses'=>$pagination,
                'form_search'=>$form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAllHouseVilla(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('house_villa/all_houses.html.twig', [
            'houses'=>$pagination,
            'form_search'=>$form->createView()
        ]);
    }

    /**
     * @param HouseVilla $house
     * @param string $slug
     * @return Response
     */
    #[Route('/house/villa/details/{id}-house-villa-details-{slug}', name: 'house_details')]
    public function houseDetails(HouseVilla $house, string $slug):Response{
        if($this->isCsrfTokenValid('house'.$house->getSlug(), $slug)){
            return $this->render('/house_villa/house_villa.html.twig', [
                'id'=>$house->getId(),
                'slug'=>$slug,
                'house'=>$house
            ]);
        }
        return $this->render('/house_villa/house_villa.html.twig', [
            'id'=>$house->getId(),
            'slug'=>$slug,
            'house'=>$house
        ]);
    }
}
