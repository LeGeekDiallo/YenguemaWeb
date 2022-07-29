<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class NewUserFromApp
{
    /**
     * SecurityController constructor.
     * @param UserPasswordEncoderInterface $encoder
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        private UserPasswordEncoderInterface $encoder,
        private EntityManagerInterface $entityManager
    )
    {}

    /**
     * @param Request $request
     * @param UserRepository $repos
     * @return User|null
     */
    public function __invoke(Request $request, UserRepository $repos):?User{
        $user = new User();
        $user->setRoles($user->getRoles())
            ->setUsername($request->get("username"))
            ->setSexe($request->get("sexe"))
            ->setEmail($request->get("email"))
            ->setPassword($this->encoder->encodePassword($user, $request->get('password')))
            ->setPhoneNumber($request->get("phoneNumber"))
            ->setSubscribeAt(new \DateTime('now'));

        if($repos->findOneBy(['email'=>$user->getEmail()])){
            return null;
        }
        $this->entityManager->flush();

        return $user;
    }
}