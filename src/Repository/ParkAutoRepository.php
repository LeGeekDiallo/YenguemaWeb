<?php

namespace App\Repository;

use App\Entity\ParkAuto;
use App\Entity\ParkAutoSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParkAuto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParkAuto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParkAuto[]    findAll()
 * @method ParkAuto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParkAutoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParkAuto::class);
    }
    public function findSearchByQuery(ParkAutoSearch $search):Query{
        $query = $this->createQueryBuilder('park_auto');
        $query->andWhere(
            $query->expr()->andX(
                $query->expr()->like($query->expr()->lower('park_auto.park_name'), $query->expr()->lower(':park_name')),
                $query->expr()->orX(
                    $query->expr()->like($query->expr()->lower('park_auto.city'), $query->expr()->lower(':address')),
                    $query->expr()->like($query->expr()->lower('park_auto.municipality'), $query->expr()->lower(':address')),
                    $query->expr()->like($query->expr()->lower('park_auto.address'), $query->expr()->lower(':address')),
                )
            )
        )
            ->orderBy('park_auto.createdAt', 'DESC')
            ->setParameters([
                ':address'=>$search->getAddress(),
                ':park_name'=>$search->getParkName(),
            ]);
        return $query->getQuery();
    }
    // /**
    //  * @return ParkAuto[] Returns an array of ParkAuto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParkAuto
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
