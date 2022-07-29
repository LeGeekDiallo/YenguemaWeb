<?php

namespace App\Repository;

use App\Entity\StudioImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudioImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudioImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudioImages[]    findAll()
 * @method StudioImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudioImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudioImages::class);
    }

    // /**
    //  * @return StudioImages[] Returns an array of StudioImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StudioImages
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
