<?php

namespace App\Controller;

use App\emailController\NewUserEmailNotification;
use App\Entity\Ads;
use App\Entity\ContactUs;
use App\Entity\EmailToAdmin;
use App\Entity\User;
use App\Form\EmailToAdminFormType;
use App\Form\UserSubscribeFormType;
use App\Notification\NewUserNotification;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class YenguemaController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * YenguemaController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="yenguema")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $userEmail = new EmailToAdmin();
        $form = $this->createForm(EmailToAdminFormType::class, $userEmail);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from(new Address($userEmail->getUserEmail()))
                ->to(new Address('adminservice@leyenguema.com'))
                ->subject($userEmail->getSubject())
                ->htmlTemplate('emails/email_to_admin.html.twig')
                ->context([
                    'importance'=>'',
                    'action_url'=>false,
                    'action_text'=>'',
                    'exception'=>false,
                    'message'=>$userEmail->getMessage(),
                    'username'=>$userEmail->getUserName()
                ]);
            try {
                $mailer->send($email);
                return $this->redirectToRoute('yenguema', [
                    'form'=>$form->createView()
                ]);
            }catch (TransportExceptionInterface $exception){}
        }
        return $this->render('yenguema/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/user_register", name="new_user_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param NotifierInterface $notifier
     * @param UserRepository $repository
     * @return Response
     */
    public function user_register(Request $request, UserPasswordEncoderInterface $encoder, NotifierInterface $notifier, UserRepository $repository):Response{
        $user = new User();
        $form = $this->createForm(UserSubscribeFormType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user->setRoles($user->getRoles());
            $user->setSubscribeAt(new \DateTime('now'));
            $password_hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password_hash);
            $this->entityManager->persist($user);
            if($user_exist = $repository->findBy(['email'=>$user->getEmail()])){
                $notifier->send(new Notification("Ce mail est déjà utilisé !", ['browser']));

                return $this->redirectToRoute('new_user_register');
            }
            $this->entityManager->flush();
            $notifier->send(new Notification("Merci de vous compter parmi nous !", ['browser']));
            $notifier->send(new NewUserNotification($user), ...$notifier->getAdminRecipients());
            return $this->redirectToRoute('login_user');
        }
        if($form->isSubmitted()){
            $notifier->send(new Notification("Veillez reessayer, une erreur s'est produite", ['browser']));
        }
        return $this->render('user_register/register_form.html.twig', [
            'register_form'=>$form->createView(),
        ]);
    }

    private function getImageNames(Collection $array):array{
        $imagesName = array();
        foreach ($array as $value){
            $imagesName[] = $value->getFilename();
        }
        return $imagesName;
    }

    /**
     * @param string $email
     * @param UserRepository $repos
     * @return Response
     */
    #[Route("/user_infos/user_id={email}", name: "get_the_user_infos")]
    public function getUserInfos(string $email, UserRepository $repos):Response{
        $docs = array();
        $user = $repos->findOneBy(["email"=>$email]);
        $prestS = $user->getActivity();
        $ads = $user->getAds();
        $apart = $user->getApartments();
        $taxi = $user->getTaxiDriver();
        $studios = $user->getStudios();
        $houses = $user->getHouseVillas();
        $jobsPosted = $user->getJobOffers();
        $jobsApp = $user->getJobApplies();
        $courses = $user->getMyCourses();
        if($prestS!=null){
            $docs["prestS"] = [
                "prestS"=>[
                    "name"=>$prestS->getActivityName(),
                    "category"=>$prestS->getCategory(),
                    "address"=>$prestS->getAddress(),
                    "email"=>$prestS->getEmail(),
                    "phone_number"=>$prestS->getPhoneNumber(),
                    "details"=>$prestS->getDetails(),
                    "city"=>$prestS->getCity(),
                    "municipality"=>$prestS->getMunicipality(),
                    "likes"=>$prestS->getLikes(),
                    "unlikes"=>$prestS->getUnlikes()
                    ],
                "images"=>$this->getImageNames($prestS->getActivityImages()),
                "imagesURL"=>"https://leyenguema.com/images/activity_image/"
            ];
        }
        if(count($ads)){
            $ads_posted = [];
            foreach ($ads as $ad){
                $ads_posted[$ad->getAdTitle()]= $this->getAdInfos($ad);

            }
            $docs["ads_posted"]=$ads_posted;
        }
        return $this->json(["resp"=>$docs], );
    }
    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param UserRepository $repos
     * @return Response
     */
    #[Route("/new_user", name: "new_user_from_app")]
    public function userRegisterFromApp(Request $request, UserPasswordEncoderInterface $encoder, UserRepository $repos):Response{
        $user = new User();
        $user->setRoles($user->getRoles())
            ->setUsername($request->get("username"))
            ->setEmail($request->get("email"))
            ->setPassword($encoder->encodePassword($user, $request->get('password')))
            ->setPhoneNumber($request->get("phoneNumber"))
            ->setSubscribeAt(new \DateTime('now'));
        if($request->get("gender")=="M")
            $user->setSexe(1);
        else
            $user->setSexe(0);

        if($repos->findOneBy(['email'=>$user->getEmail()])){
            return $this->json(["resp"=>["response"=>"this email is already used !", "registered"=>false, "useremail"=>$user->getEmail(),
                "password"=>$request->get('password')]]);
        }
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $this->json(["resp"=>["response"=>"Merci de vous compter parmi nous !", "registered"=>true, "useremail"=>$user->getEmail(),
            "password"=>$request->get('password')]]);
    }

    /**
     * @param Ads $ad
     * @return array
     */
    private function getAdInfos(Ads $ad):array{
        $ad_infos = [];
        $ad_infos["id"] = $ad->getId();
        $ad_infos["title"] = $ad->getAdTitle();
        $ad_infos["price"] = $ad->getAdPrice();
        $ad_infos["category"] = $ad->getAdCategory();
        $ad_infos["type"] = $ad->getAdType();
        $ad_infos["brand"] = $ad->getBrand();
        $ad_infos["mileage"] = $ad->getMileage();
        $ad_infos["year"] = $ad->getYear();
        $ad_infos["city"] = $ad->getCity();
        $ad_infos["municipality"] = $ad->getMunicipality();
        $ad_infos["address"] = $ad->getAddress();
        $ad_infos["email"] = $ad->getEmail();
        $ad_infos["phone_number"] = $ad->getPhoneNumber();
        $ad_infos["details"] = $ad->getDetails();
        $ad_infos["vehicle_type"] = $ad->getVehicleType();
        $ad_infos["ad_state"] = $ad->getAdState();
        $ad_infos["transmission_type"] = $ad->getTransmissionType();
        $images = $ad->getAdPhotos();
        $filename = [];
        foreach ($images as $image){
            $filename[] = $image->getImageName();
        }
        $ad_infos["images"] = $filename;
        $ad_infos["imagesURL"] = "https://leyenguema.com/images/ad_images/";
        return $ad_infos;
    }

}
