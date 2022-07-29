<?php

namespace App\Repository;

use App\Entity\OfficeShopLandImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfficeShopLandImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfficeShopLandImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfficeShopLandImages[]    findAll()
 * @method OfficeShopLandImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficeShopLandImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfficeShopLandImages::class);
    }

    // /**
    //  * @return OfficeShopLandImages[] Returns an array of OfficeShopLandImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfficeShopLandImages
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
