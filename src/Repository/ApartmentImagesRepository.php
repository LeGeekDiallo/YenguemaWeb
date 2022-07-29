<?php

namespace App\Repository;

use App\Entity\ApartmentImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApartmentImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApartmentImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApartmentImages[]    findAll()
 * @method ApartmentImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApartmentImages::class);
    }

    // /**
    //  * @return ApartmentImages[] Returns an array of ApartmentImages objects
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
    public function findOneBySomeField($value): ?ApartmentImages
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
