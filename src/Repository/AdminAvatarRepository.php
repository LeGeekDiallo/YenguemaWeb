<?php

namespace App\Repository;

use App\Entity\AdminAvatar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdminAvatar|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminAvatar|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminAvatar[]    findAll()
 * @method AdminAvatar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminAvatarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminAvatar::class);
    }

    // /**
    //  * @return AdminAvatar[] Returns an array of AdminAvatar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdminAvatar
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
