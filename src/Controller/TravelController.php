<?php

namespace App\Controller;

use App\Entity\Ride;
use App\Entity\RideSearch;
use App\Entity\User;
use App\Form\RideFormType;
use App\Form\RideSearchFormType;
use App\Repository\RideRepository;
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

class TravelController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * TravelController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/travel", name="travel")
     */
    public function index(): Response
    {
        $rideSearch = new RideSearch();
        $form = $this->createForm(RideSearchFormType::class, $rideSearch);
        return $this->render('travel/index.html.twig', [
            'form_search'=>$form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/travel/new_ride/{id}-new-ride", name="new_ride")
     * @IsGranted("ROLE_USER")
     */
    public function new_ride(Request $request, User $user, NotifierInterface $notifier):Response{
        $ride = new Ride();
        $form = $this->createForm(RideFormType::class, $ride);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $ride->setCreatedAt(new \DateTime('now'))
                ->setUser($user);
            $this->entityManager->persist($ride);
            $this->entityManager->flush();

            $notifier->send(new Notification("Votre trajet a été ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('/travel/new_ride.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param Ride $ride
     * @param NotifierInterface $notifier
     * @param Request $request
     * @return Response
     * @Route("/travel/edit_ride/edit-ride-{id}-{slug}", name="edit_ride")
     * @IsGranted("ROLE_USER")
     */
    public function edit_ride(Ride $ride, NotifierInterface $notifier, Request $request):Response{
        $form = $this->createForm(RideFormType::class, $ride);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $ride->setCreatedAt(new \DateTime('now'));
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre trajet a été modifié avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('/travel/new_ride.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param NotifierInterface $notifier
     * @param Ride $ride
     * @return Response
     * @Route("/travel/delete_ride/{id}", name="delete_ride")
     */
    public function delete_ride(Request $request, NotifierInterface $notifier, Ride $ride):Response{
        if($this->isCsrfTokenValid('delete'.$ride->getId(), $request->get('_token'))){
            $this->entityManager->remove($ride);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre trajet a été supprimé avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @param Request $request
     * @param RideRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route('/travel/trips', name: 'trips')]
    public function trips_page(Request $request, RideRepository $repository, PaginatorInterface $paginator):Response{
        $rideSearch = new RideSearch();
        $form = $this->createForm(RideSearchFormType::class, $rideSearch);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($rideSearch),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('travel/trips.html.twig', [
                'form_search'=>$form->createView(),
                'pagination'=>$pagination,
            ]);
        }
        $response = $this->render('/travel/trips.html.twig', [
            'pagination'=>null,
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

    #[Route('/travel/trips/{column}={filter}', name: 'trip_destination')]
    /**
     * @param string $column
     * @param string $filter
     * @param Request $request
     * @param RideRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function trips_by_destination(string $column, string $filter, Request $request, RideRepository $repository, PaginatorInterface $paginator):Response{
        $rideSearch = new RideSearch();
        $form = $this->createForm(RideSearchFormType::class, $rideSearch);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $filter),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('/travel/trips.html.twig', [
            'pagination'=> $pagination,
            'form_search'=>$form->createView()
        ]);
    }
    /**
     * @param Ride $ride
     * @return Response
     * @Route("/travel/trip_details/{id}-{slug}", name="ride_details")
     */
    public function ride_details(Ride $ride):Response{
        return $this->render('/travel/ride_details.html.twig', [
            'ride'=>$ride
        ]);
    }
}
