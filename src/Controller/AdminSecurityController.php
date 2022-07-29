<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminRegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminSecurityController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * AdminSecurityController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/security/login_admin", name="login_admin")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('/security/login_admin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/security/admin_register", name="admin_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function admin_register(Request $request, UserPasswordEncoderInterface $encoder):Response{
        $admin = new Admin();
        $form = $this->createForm(AdminRegisterFormType::class, $admin);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $admin->setRoles($admin->getRoles());
            $admin->setRegisterAt(new \DateTime());
            $password_hash = $encoder->encodePassword($admin, $admin->getPassword());
            $admin->setPassword($password_hash);
            $this->entityManager->persist($admin);
            $this->entityManager->flush();
            return $this->redirectToRoute('login_admin', []);
        }
        return $this->render('/security/admin_register.html.twig', [
            "register_form"=>$form->createView(),
        ]);
    }
}
