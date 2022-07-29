<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserAvatar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use League\OAuth2\Client\Provider\FacebookUser;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     * @throws ORMException
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     * @throws ORMException
     */
    public function findOrCreateFromFacebookOauth(FacebookUser $facebookUser, UserPasswordEncoderInterface $encoder):User{
        $user = $this->createQueryBuilder('u')
            ->where('u.facebook_id = :facebookId')
            ->setParameter('facebookId', $facebookUser->getId())
            ->getQuery()
            ->getSingleResult();

        if($user) {
            return $user;
        }
        $user = new User();
        $password_hash = $encoder->encodePassword($user, $user->getPassword());

        $user->setFacebookId($facebookUser->getId())
            ->setEmail($facebookUser->getEmail())
            ->setUsername($facebookUser->getName())
            ->setRoles(['ROLE_USER'])
            ->setPassword($password_hash)
            ->setSubscribeAt(new \DateTime('now'));
        $this->_em->persist($user);
        $this->_em->flush();

        return  $user;
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws ORMException
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function findOrCreateGoogleOauth(GoogleUser $googleUser, UserPasswordEncoderInterface $encoder):User{
        $user = $this->createQueryBuilder('u')
            ->where('u.google_id = :googleId')
            ->setParameter('googleId', $googleUser->getId())
            ->getQuery()
            ->getResult();

        if($user) {
            return $user;
        }
        $user = new User();
        $password_hash = $encoder->encodePassword($user, $user->getPassword());
        $user->setGoogleId($googleUser->getId())
            ->setUsername($googleUser->getName())
            ->setEmail($googleUser->getEmail())
            ->setRoles(['ROLE_USER'])
            ->setPassword($password_hash)
            ->setSubscribeAt(new \DateTime('now'));
        $this->_em->persist($user);
        $this->_em->flush();
        return  $user;
    }
}
