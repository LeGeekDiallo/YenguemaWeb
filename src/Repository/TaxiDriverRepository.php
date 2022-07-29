<?php

namespace App\Repository;

use App\Entity\TaxiDriver;
use App\Entity\TaxiDriverSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaxiDriver|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxiDriver|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxiDriver[]    findAll()
 * @method TaxiDriver[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxiDriverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaxiDriver::class);
    }

    public function findSearchByQuery(TaxiDriverSearch $search):Query{
        $query = $this->createQueryBuilder('taxi');
        $query->andWhere(
            $query->expr()->orX(
                $query->expr()->like(
                    $query->expr()->lower('taxi.city'),
                    $query->expr()->lower(':city')
                ),
                $query->expr()->like(
                    $query->expr()->lower('taxi.municipality'),
                    $query->expr()->lower(':municipality')
                ),
                $query->expr()->like(
                    $query->expr()->lower('taxi.district'),
                    $query->expr()->lower(':district')
                )
            )
        )
            ->orderBy('taxi.createdAt', 'DESC')
            ->setParameters([
                ':city'=>$search->getLocation(),
                ':municipality'=>$search->getLocation(),
                ':district'=>$search->getLocation()
            ]);

        return $query->getQuery();
    }
    public function findByQuery(string $column, string $criteria):Query{

        return $this->createQueryBuilder('taxi_driver')
            ->andWhere('taxi_driver.'.$column.'=:criteria')
            ->orderBy('taxi_driver.createdAt', 'DESC')
            ->setParameter(':criteria',$criteria)
            ->getQuery();
    }
    // /**
    //  * @return TaxiDriver[] Returns an array of TaxiDriver objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaxiDriver
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
