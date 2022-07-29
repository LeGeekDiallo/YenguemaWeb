<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\CarSearch;
use App\Entity\ParkAuto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findSearchByQuery(CarSearch $search):Query{
        $query = $this->createQueryBuilder('car');
        $query->andWhere('car.park_auto=:park_auto_id',
            $query->expr()->andX(
                $query->expr()->like($query->expr()->lower('car.car_brand'), $query->expr()->lower(':brand')),
                $query->expr()->lte('car.car_price', ':price'),
                $query->expr()->lte('car.car_year', ':year'),
                $query->expr()->lte('car.mileage', ':mileage')
            )
        )
            ->orderBy('car.created_at', 'DESC')
            ->setParameters([
                ':brand'=>$search->getModel(),
                ':price'=>$search->getPrice(),
                ':year'=>$search->getYear(),
                ':mileage'=>$search->getMileage(),
                ':park_auto_id'=>$search->getParkAutoId(),
            ]);
        return $query->getQuery();
    }
    public function findByQuery(string $column, string $filter):Query{
        return $this->createQueryBuilder('car')
            ->andWhere('car.'.$column.'=:filter')
            ->orderBy('car.created_at', 'DESC')
            ->setParameter(':filter',$filter)
            ->getQuery();
    }
    public function findByIdQuery(ParkAuto $parkAuto):Query{
        return $this->createQueryBuilder('car')
            ->andWhere('car.park_auto=:id')
            ->orderBy('car.created_at', 'DESC')
            ->setParameter(':id',$parkAuto->getId())
            ->getQuery();
    }
    // /**
    //  * @return Car[] Returns an array of Car objects
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
    public function findOneBySomeField($value): ?Car
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
