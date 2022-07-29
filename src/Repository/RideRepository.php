<?php

namespace App\Repository;

use App\Entity\Ride;
use App\Entity\RideSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Ride|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ride|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ride[]    findAll()
 * @method Ride[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ride::class);
    }

    public function findSearchByQuery(RideSearch $search):Query{
        $query = $this->createQueryBuilder('ride');
        $query->andWhere(
            $query->expr()->andX(
                $query->expr()->like(
                    $query->expr()->lower('ride.departure'),
                    $query->expr()->lower(':departure')
                ),
                $query->expr()->like(
                    $query->expr()->lower('ride.destination'),
                    $query->expr()->lower(':destination')
                ),
                $query->expr()->gte('ride.departure_date', ':date'
                ),
                //$query->expr()->gte('ride.departure_time', (new \DateTime('now'))->format('H:i:s'))
            )
        )
            ->orderBy('ride.created_at', 'DESC')
            ->setParameters([
                ':departure'=>$search->getDeparture(),
                ':destination'=>$search->getDestination(),
                ':date'=>$search->getDateDepart()
            ]);

        return $query->getQuery();
    }

    public function findByQuery(string $column, string $destination):Query{
        $query = $this->createQueryBuilder('ride');
        $query->andWhere(
            $query->expr()->orX($query->expr()->eq('ride.departure_date', ':dateNow'),
            $query->expr()->eq('ride.'.$column, ':destination'))
        );

        $query->setParameters([':destination'=>$destination, ':dateNow'=>(new \DateTime('now'))->format('Y-d-m 00:00:00')]);
        return $query->getQuery();
    }
    // /**
    //  * @return Ride[] Returns an array of Ride objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ride
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
