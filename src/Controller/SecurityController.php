<?php

namespace App\Controller;

use App\Entity\NewPassword;
use App\Entity\User;
use App\Entity\UserAvatar;
use App\Form\NewPasswordFormType;
use App\Form\UploadFileFormType;
use App\Repository\UserRepository;
use App\Tools\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $encoder
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $encoder)
    {}
    #[Route(path: '/login', name: 'login_user')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_user.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/profile", name="profile")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function profile(AuthenticationUtils $authenticationUtils):Response{
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('/security/profile.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/security/activate/{email}", name="activate_user")
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function activate_user(Request $request, User  $user):Response{
        $validate = $request->query->get('activate');

        return $this->render('security/activate.html.twig', [
            'user'=>$user,
            'validate'=>$validate
        ]);
    }


    /**
     * @Route("/security/upload_user_avatar/{id}", name="upload_avatar", requirements={"id"="\d+"})
     * @param Request $request
     * @param UserAvatar $userAvatar
     * @param string $avatarDir
     * @return Response
     * @throws Exception
     */
    public function upload_user_avatar(Request $request, UserAvatar $userAvatar, string $avatarDir):Response{
        $form = $this->createForm(UploadFileFormType::class, $userAvatar);
        $form->handleRequest($request);
        $oldImage = $userAvatar->getImageName();
        if($form->isSubmitted() && $form->isValid()){
            $userAvatar->setUpdateAt(new \DateTime('now'));
            $uploadFile = new UploadFile();
            $filename = $uploadFile->uploadFile($form, $oldImage, $avatarDir);
            $userAvatar->setImageName($filename);
            $this->entityManager->flush();
            return $this->redirectToRoute('profile');
        }
        return $this->render('/security/upload_user_avatar.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param string $avatarDir
     * @param UserRepository $repos
     * @return Response
     * @throws Exception
     */
    #[Route("/security/upload_user_avatar", name: "update_avatar")]
    public function updateUserAvatarFromApp(Request $request, string $avatarDir, UserRepository $repos):Response{
        $user = $repos->findOneBy(["email"=>$_POST["user_email"]]);
        $avatar = $user->getUserAvatar();
        $file = $_FILES["imageName"];
        if($avatar != null){
            $oldImage = $avatar->getImageName();
            $avatar->setUpdateAt(new \DateTime('now'));
            $uploadFile = new UploadFile();
            $filename = $uploadFile->updateUserAvatarFromApp($file, $oldImage, $avatarDir);
            $avatar->setImageName($filename);
            $this->entityManager->flush();
            return $this->json(["resp"=>true]);
        }
        $userAvatar = new UserAvatar();
        $userAvatar->setUser($user);
        $userAvatar->setUpdateAt(new \DateTime('now'));
        $uploadFile = new UploadFile();
        $filename = $uploadFile->loadFileFromApp($file, $avatarDir);
        $userAvatar->setImageName($filename);
        $this->entityManager->persist($userAvatar);
        $this->entityManager->flush();

        return $this->json(["resp"=>true]);
    }
    /**
     * @Route("/security/upload_user_avatar/{email}", name="new_avatar")
     * @param Request $request
     * @param User $user
     * @param string $avatarDir
     * @return Response
     * @throws Exception
     */
    public function new_user_avatar(Request $request, User $user, string $avatarDir):Response{
        $userAvatar = new UserAvatar();
        $form = $this->createForm(UploadFileFormType::class, $userAvatar);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $userAvatar->setUser($user);
            $userAvatar->setUpdateAt(new \DateTime('now'));
            $uploadFile = new UploadFile();
            $filename = $uploadFile->loadFile($form, $avatarDir);
            $userAvatar->setImageName($filename);
            $this->entityManager->persist($userAvatar);
            $this->entityManager->flush();
            return $this->redirectToRoute('profile');
        }
        return $this->render('/security/upload_user_avatar.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/security/password_update", name="password_update")
     * @param UserRepository $userRepository
     * @param Request $request
     * @param NotifierInterface $notifier
     * @return Response
     * @throws ORMException|\Doctrine\ORM\ORMException
     */
    public function password_update(UserRepository $userRepository, Request $request, NotifierInterface $notifier):Response{
        $newPassword = new NewPassword();
        $form = $this->createForm(NewPasswordFormType::class, $newPassword);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $userRepository->findOneBy(['email'=>$newPassword->getEmail()]);
            if($user){
                $password_hash = $this->encoder->hashPassword($user, $newPassword->getNewPassword());
                $userRepository->upgradePassword($user, $password_hash);
                $notifier->send(new Notification("Mot de passe modifié avec succès !", ['browser']));
                return $this->redirectToRoute('login_user');
            }else{
                $notifier->send(new Notification("Email introuvable !", ['browser']));
            }

        }
        return $this->render('/security/password_update.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route("/profile/ads/user={id}-ads-{slug}", name: "user_ads")]
    public function userAds(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/security/ads.html.twig', [
                'results'=>$user->getAds()
            ]);
        }
        return $this->render('/security/ads.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=>$user->getAds()
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route("/profile/courses/user={id}-courses-{slug}", name: "user_courses_ads")]
    public function userCourseAds(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/security/courses_ads.html.twig', [
                'results'=>$user->getMyCourses()
            ]);
        }
        return $this->render('/security/courses_ads.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=>$user->getMyCourses()
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route("/profile/job_offers/user={id}-jobs-{slug}", name: "user_job_ads")]
    public function userJobOffersAds(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/security/job_offer_ads.html.twig', [
                'results'=>$user->getJobOffers()
            ]);
        }
        return $this->render('/security/job_offer_ads.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=>$user->getJobOffers()
        ]);
    }

    /**
     * @param User $user
     * @param string $slug
     * @return Response
     */
    #[Route("/profile/park_auto/user={id}-park_auto-{slug}", name: "user_park_auto")]
    public function userParkAuto(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/security/park_auto.html.twig', [
                'results'=>$user->getParkAutos()
            ]);
        }
        return $this->render('/security/park_auto.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=>$user->getParkAutos()
        ]);
    }

    #[Route("/profile/rides/user={id}-rides-{slug}", name: "user_rides_auto")]
    public function userRides(User $user, string $slug):Response{
        if($this->isCsrfTokenValid('_user'.$user->getSlug(), $slug)){
            return $this->render('/security/rides.html.twig', [
                'results'=>$user->getRides()
            ]);
        }
        return $this->render('/security/rides.html.twig', [
            'id'=>$user->getId(),
            'slug'=>$slug,
            'results'=>$user->getRides()
        ]);
    }

    /**
     * @param Request $request
     * @param UserPasswordHasherInterface $encoder
     * @param UserRepository $repos
     * @return Response
     */
    #[Route("/security/login_app", name: "login_app")]
    public function logInFromApp(Request $request, UserPasswordHasherInterface $encoder, UserRepository $repos):Response{
        if($user = $repos->findOneBy(["email"=>$request->get("email")])){
            $avFilename = null;
            if($encoder->isPasswordValid($user, $request->get("password"))) {
                if($user->getUserAvatar()!=null)
                    $avFilename = $user->getUserAvatar()->getImageName();
                return $this->json(["resp" =>
                    ["logIn" => true, "u_id" => $user->getId(), "email" => $user->getEmail(),
                        "username" => $user->getUsername(),
                        "usergender" => $user->getSexe(),
                        "avatar" => $avFilename,
                        "avatar_URL" => "https://www.leyenguema.com/images/users_avatar/"
                    ]
                ]);
            } else{
                return $this->json(["resp"=>["logIn"=>false, "u_id"=>$user->getId(), "email"=>$user->getEmail(),
                    "username"=>$user->getUsername(),
                    "usergender"=>$user->getSexe(),
                    "avatar"=>null,
                    "avatar_URL"=>"https://127.0.0.1:8000/images/users_avatar/"
                ]]);
            }
        }
        return $this->json([
            "resp"=>["logIn"=>null, "u_id"=>null,
                "email"=>null,
                "username"=>null,
                "usergender"=>null,
                "avatar"=>null,
                "avatar_URL"=>null
            ]
        ]);
    }
}
