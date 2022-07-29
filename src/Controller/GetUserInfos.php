<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class GetUserInfos
{
    /**
     * SecurityController constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        private UserPasswordEncoderInterface $encoder)
    {}

    public function __invoke(Request $request, UserRepository $repo):?User{
        $user = $repo->findOneBy(['email'=>$request->get('user_email')]);
        if($user and $this->encoder->isPasswordValid($user, $request->get('user_password'))){
            return $user;
        }
        return null;
    }
}