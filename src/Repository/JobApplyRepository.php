<?php

namespace App\Repository;

use App\Entity\JobApply;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobApply|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobApply|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobApply[]    findAll()
 * @method JobApply[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobApplyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobApply::class);
    }

    // /**
    //  * @return JobApply[] Returns an array of JobApply objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobApply
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
