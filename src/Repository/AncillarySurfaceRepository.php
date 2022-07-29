<?php

namespace App\Repository;

use App\Entity\AncillarySurface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AncillarySurface|null find($id, $lockMode = null, $lockVersion = null)
 * @method AncillarySurface|null findOneBy(array $criteria, array $orderBy = null)
 * @method AncillarySurface[]    findAll()
 * @method AncillarySurface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AncillarySurfaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AncillarySurface::class);
    }

    // /**
    //  * @return AncillarySurface[] Returns an array of AncillarySurface objects
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
    public function findOneBySomeField($value): ?AncillarySurface
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
