<?php

namespace App\Repository;

use App\Entity\ApartFilter;
use App\Entity\HouseVilla;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HouseVilla|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseVilla|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseVilla[]    findAll()
 * @method HouseVilla[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseVillaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HouseVilla::class);
    }

    public function findAllHouseVilla():Query{
        $query = $this->createQueryBuilder('apartment')
            ->select('apartment')
            ->orderBy('apartment.created_at', 'DESC');

        return $query->getQuery();
    }

    public function findSearchByQuery(ApartFilter $search):Query{
        $query = $this->createQueryBuilder('houseVilla');
        $query->andWhere(
            $query->expr()->orX(
                $query->expr()->like(
                    $query->expr()->lower('houseVilla.city'),
                    $query->expr()->lower(':city')
                ),
                $query->expr()->like(
                    $query->expr()->lower('houseVilla.municipality'),
                    $query->expr()->lower(':municipality')
                ),
                $query->expr()->like(
                    $query->expr()->lower('houseVilla.district'),
                    $query->expr()->lower(':district')
                ),
                $query->expr()->lte('houseVilla.price', ':price'),
            )
        )
            ->orderBy('houseVilla.created_at', 'DESC')
            ->setParameters([
                ':city'=>$search->getLocation(),
                ':municipality'=>$search->getLocation(),
                ':district'=>$search->getLocation(),
                ':price'=>$search->getPrice()
            ]);

        return $query->getQuery();
    }
    // /**
    //  * @return HouseVilla[] Returns an array of HouseVilla objects
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
    public function findOneBySomeField($value): ?HouseVilla
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
