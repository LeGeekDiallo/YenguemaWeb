<?php

namespace App\Repository;

use App\Entity\ApartFilter;
use App\Entity\Apartment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apartment[]    findAll()
 * @method Apartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apartment::class);
    }

    public function findAllApart():Query{
        $query = $this->createQueryBuilder('apartment')
            ->select('apartment')
            ->orderBy('apartment.created_at', 'DESC');

        return $query->getQuery();
    }

    public function findSearchByQuery(ApartFilter $search):Query{
        $query = $this->createQueryBuilder('apartment');
        $query->andWhere(
            $query->expr()->orX(
                $query->expr()->like(
                    $query->expr()->lower('apartment.city'),
                    $query->expr()->lower(':city')
                ),
                $query->expr()->like(
                    $query->expr()->lower('apartment.municipality'),
                    $query->expr()->lower(':municipality')
                ),
                $query->expr()->like(
                    $query->expr()->lower('apartment.district'),
                    $query->expr()->lower(':district')
                ),
                $query->expr()->lte('apartment.price', ':price'),
            )
        )
            ->orderBy('apartment.created_at', 'DESC')
            ->setParameters([
                ':city'=>$search->getLocation(),
                ':municipality'=>$search->getLocation(),
                ':district'=>$search->getLocation(),
                ':price'=>$search->getPrice()
            ]);

        return $query->getQuery();
    }
    // /**
    //  * @return Apartment[] Returns an array of Apartment objects
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
    public function findOneBySomeField($value): ?Apartment
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
