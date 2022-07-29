<?php

namespace App\Repository;

use App\Entity\HouseVillaImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HouseVillaImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseVillaImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseVillaImages[]    findAll()
 * @method HouseVillaImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseVillaImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HouseVillaImages::class);
    }

    // /**
    //  * @return HouseVillaImages[] Returns an array of HouseVillaImages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HouseVillaImages
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
