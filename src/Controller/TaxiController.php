<?php

namespace App\Controller;

use App\Entity\TaxiDriver;
use App\Entity\TaxiDriverSearch;
use App\Entity\User;
use App\Form\TaxiDriverFormType;
use App\Form\TaxiDriverSearchFormType;
use App\Repository\TaxiDriverRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class TaxiController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * TaxiController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/taxi', name: 'taxi')]
    public function index(TaxiDriverRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
        $search = new TaxiDriverSearch();
        $form = $this->createForm(TaxiDriverSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('taxi/taxi_driver_search.html.twig', [
                'pagination'=>$pagination,
                'form_search'=>$form->createView()
            ]);
        }
        return $this->render('taxi/index.html.twig', [
            'form_search'=>$form->createView(),
            'pagination'=>false
        ]);

    }

    /**
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @return Response
     */
    #[Route('/taxi/new_taxi/{id}-new-TaxiDriver', name: 'new_taxidriver')]
    public function addNewTaxi(Request $request, User $user, NotifierInterface $notifier):Response{
        $taxiDriver = new TaxiDriver();
        $form = $this->createForm(TaxiDriverFormType::class, $taxiDriver);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $taxiDriver->setCreatedAt(new \DateTime('now'))
                ->setUser($user)
                ->setState(false);
            $this->entityManager->persist($taxiDriver);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre taxi a bien été ajouté avec succès !", ['browser']));

            return $this->redirectToRoute('profile');
        }else{
            return $this->render('taxi/taxi_driver.html.twig', [
                'form'=>$form->createView()
            ]);
        }
    }


    /**
     * @param Request $request
     * @param TaxiDriver $taxiDriver
     * @param NotifierInterface $notifier
     * @return Response
     * @Route("/taxi/edit_taxi/{id}-edit-TaxiDriver", name="edit_taxi")
     */
    public function editTaxi(Request $request, TaxiDriver $taxiDriver, NotifierInterface $notifier):Response{
        $form = $this->createForm(TaxiDriverFormType::class, $taxiDriver);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $taxiDriver->setCreatedAt(new \DateTime('now'));
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre taxi a bien été modifié avec succès !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('taxi/taxi_driver.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    #[Route("/taxi/delete_taxi/{id}-delete-TaxiDriver", name: "delete_taxi")]
    /**
     * @param Request $request
     * @param TaxiDriver $taxiDriver
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function deleteTaxi(Request $request, TaxiDriver $taxiDriver, NotifierInterface $notifier):Response{
        if($this->isCsrfTokenValid('delete'.$taxiDriver->getId(), $request->get('_token'))){
            $this->entityManager->remove($taxiDriver);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre taxi a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @param TaxiDriver $taxiDriver
     * @return Response
     */
    #[Route("/taxi/switchState/{id}-switch_state", name: "switch_state")]
    public function switchState(TaxiDriver $taxiDriver):Response{
        $taxiDriver->setState(!$taxiDriver->getState());
        $this->entityManager->flush();
        return $this->json(["status"=>"Ok", "state"=>$taxiDriver->getState()]);
    }

    /**
     * @param TaxiDriverRepository $repository
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route("/taxi/taxi_driver_searcher", name: "taxi_driver_search")]
    public function taxiDriverSearch(TaxiDriverRepository $repository, Request $request, PaginatorInterface $paginator):Response{
        $search = new TaxiDriverSearch();
        $form = $this->createForm(TaxiDriverSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('taxi/taxi_driver_search.html.twig', [
                'pagination'=>$paginator,
                'form_search'=>$form->createView()
            ]);
        }
        return $this->render('taxi/taxi_driver_search.html.twig', [
            'form_search'=>$form->createView()
        ]);
    }

    /**
     * @param TaxiDriverRepository $repository
     * @param string $column
     * @param string $filter
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    #[Route("/taxi/taxi_drivers_matches/{column}={filter}", name: "taxi_driver_filter")]
    public function taxiDriverFilter(TaxiDriverRepository $repository, string $column, string $filter, Request $request, PaginatorInterface $paginator):Response{
        $search = new TaxiDriverSearch();
        $form = $this->createForm(TaxiDriverSearchFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $filter),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('taxi/taxi_driver_search.html.twig', [
            'pagination'=>$pagination,
            'form_search'=>$form->createView()
        ]);
    }
}
