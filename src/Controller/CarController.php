<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarAdvantages;
use App\Entity\ParkAuto;
use App\Form\CarFormType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * CarController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/car/new_car/{id}-new-car-{csrf}", name="new_car")
     * @param Request $request
     * @param ParkAuto $parkAuto
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @param string $csrf
     * @return Response
     * @IsGranted("ROLE_USER")
     */
    public function new_car(Request $request, ParkAuto $parkAuto, FileUploader $fileUploader, NotifierInterface $notifier, string $csrf): Response
    {
        $car = new Car();
        $form = $this->createForm(CarFormType::class, $car);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $car->setParkAuto($parkAuto)
                ->setCreatedAt(new \DateTime('now'))
                ->setSaleState(false);
            $car_advantages = $form['carAdvantages']->getData();
            foreach ($car_advantages as $car_advantage){
                $carAdvantage = new CarAdvantages();
                $carAdvantage->setAdvantageName($car_advantage);
                $car->addCarAdvantage($carAdvantage);
            }
            if($images = $form['carImages']->getData()){
                $fileUploader->uploads($images, $car);
            }
            $this->entityManager->persist($car);
            $this->entityManager->flush();
            $notifier->send(new Notification("Le véhicule a été ajouté avec succès !", ['browser']));
            return $this->redirectToRoute('park_auto_owner_page', [
                'id'=>$parkAuto->getId(),
                'csrf'=>$csrf
            ]);
        }

        return $this->render('car/new_car.html.twig', [
            'form' => $form->createView(),
            'car'=>$car
        ]);
    }

    /**
     * @param Car $car
     * @return Response
     * @Route("/car/car_details/{id}-{csrf}", name="car_details")
     */
    public function car_details(Car $car):Response{
        return $this->render('/car/car_details.html.twig', [
            'car'=>$car
        ]);
    }

    /**
     * @param Car $car
     * @param Request $request
     * @param NotifierInterface $notifier
     * @param string $csrf
     * @param FileUploader $fileUploader
     * @return Response
     * @Route("/car/car_edit/{id}-car-edit-{csrf}", name="car_edit")
     * @IsGranted("ROLE_USER")
     */
    public function edit_car(Car $car, Request $request, NotifierInterface $notifier, string $csrf, FileUploader $fileUploader):Response{
        $form = $this->createForm(CarFormType::class, $car);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $car->setCreatedAt(new \DateTime('now'));
            $car_advantages = $form['carAdvantages']->getData();
            foreach ($car_advantages as $car_advantage){
                $carAdvantage = new CarAdvantages();
                $carAdvantage->setAdvantageName($car_advantage);
                $car->addCarAdvantage($carAdvantage);
            }
            if($images = $form['carImages']->getData()){
                $fileUploader->uploads($images, $car);
            }
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre véhicule a été modifié avec succès !", ['browser']));
            return $this->redirectToRoute('park_auto_owner_page', [
                'id'=>$car->getParkAuto()->getId(),
                'csrf'=>$csrf
            ]);
        }
        return $this->render('car/car_edit.html.twig', [
            'form' => $form->createView(),
            'car'=>$car
        ]);
    }

    /**
     * @param Car $car
     * @param Request $request
     * @param FileUploader $fileUploader
     * @param NotifierInterface $notifier
     * @param string $csrf
     * @return Response
     * @Route("car/delete_car/{id}-deletion-{csrf}", name="delete_car")
     */
    public function delete_car(Car $car, Request $request, FileUploader $fileUploader, NotifierInterface $notifier, string $csrf):Response{
        if($this->isCsrfTokenValid('delete'.$car->getId(), $request->get('_token'))){
            foreach ($car->getCarImages() as $carImage){
                $fileUploader->delete($carImage->getFilename());
            }
            $this->entityManager->remove($car);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre véhicule a bien été supprimé !", ['browser']));
            return $this->redirectToRoute('park_auto_owner_page', [
                'id'=>$car->getParkAuto()->getId(),
                'csrf'=>$csrf
            ]);
        }
        return $this->redirectToRoute('park_auto_owner_page', [
            'id'=>$car->getParkAuto()->getId(),
            'csrf'=>$csrf
        ]);
    }

    /**
     * @param Car $car
     * @return Response
     * @Route("/car/change_sale_state/{id}", name="change_sale_state")
     * @IsGranted("ROLE_USER")
     */
    public function change_sale_state(Car $car):Response{
        $car->setSaleState(!$car->getSaleState());
        $this->entityManager->flush();
        return $this->json(["status"=>"Ok", "sale_state"=>$car->getSaleState()]);
    }
}
