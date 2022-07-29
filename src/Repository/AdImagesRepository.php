<?php

namespace App\Repository;

use App\Entity\AdImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdImages[]    findAll()
 * @method AdImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdImages::class);
    }

    // /**
    //  * @return AdImages[] Returns an array of AdImages objects
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
    public function findOneBySomeField($value): ?AdImages
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
