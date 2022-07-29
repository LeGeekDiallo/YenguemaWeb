<?php

namespace App\Repository;

use App\Entity\AdditionalSurfaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdditionalSurfaces|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdditionalSurfaces|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdditionalSurfaces[]    findAll()
 * @method AdditionalSurfaces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdditionalSurfacesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdditionalSurfaces::class);
    }

    // /**
    //  * @return AdditionalSurfaces[] Returns an array of AdditionalSurfaces objects
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
    public function findOneBySomeField($value): ?AdditionalSurfaces
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
