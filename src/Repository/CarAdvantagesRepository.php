<?php

namespace App\Repository;

use App\Entity\CarAdvantages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarAdvantages|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarAdvantages|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarAdvantages[]    findAll()
 * @method CarAdvantages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarAdvantagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarAdvantages::class);
    }

    // /**
    //  * @return CarAdvantages[] Returns an array of CarAdvantages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarAdvantages
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
