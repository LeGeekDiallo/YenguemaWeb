<?php

namespace App\Repository;

use App\Entity\ActivityImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActivityImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityImage[]    findAll()
 * @method ActivityImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityImage::class);
    }

    // /**
    //  * @return ActivityImage[] Returns an array of ActivityImage objects
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
    public function findOneBySomeField($value): ?ActivityImage
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
