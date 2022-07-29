<?php

namespace App\Repository;

use App\Entity\ApartFilter;
use App\Entity\OfficeShopLand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method OfficeShopLand|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfficeShopLand|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfficeShopLand[]    findAll()
 * @method OfficeShopLand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficeShopLandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfficeShopLand::class);
    }

    public function findAllOls():Query{
        $query = $this->createQueryBuilder('office_shop_land')
            ->select('office_shop_land')
            ->orderBy('office_shop_land.created_at', 'DESC');

        return $query->getQuery();
    }
    public function findAllLands():Query{
        $query = $this->createQueryBuilder('office_shop_land');
        $query->where(
            $query->expr()->like(
                'office_shop_land.property_type',
                ':terrain'
            ))
            ->setParameter(':terrain', 'Terrain')
            ->orderBy('office_shop_land.created_at', 'DESC');

        return $query->getQuery();
    }
    public function findSearchByQuery(ApartFilter $search):Query{
        $query = $this->createQueryBuilder('office_shop_land');
        $query->andWhere(
            $query->expr()->orX(
                $query->expr()->like(
                    $query->expr()->lower('office_shop_land.city'),
                    $query->expr()->lower(':city')
                ),
                $query->expr()->like(
                    $query->expr()->lower('office_shop_land.municipality'),
                    $query->expr()->lower(':municipality')
                ),
                $query->expr()->like(
                    $query->expr()->lower('office_shop_land.district'),
                    $query->expr()->lower(':district')
                ),
                $query->expr()->lte('office_shop_land.price', ':price'),
            )
        )
            ->orderBy('office_shop_land.created_at', 'DESC')
            ->setParameters([
                ':city'=>$search->getLocation(),
                ':municipality'=>$search->getLocation(),
                ':district'=>$search->getLocation(),
                ':price'=>$search->getPrice()
            ]);

        return $query->getQuery();
    }

    // /**
    //  * @return OfficeShopLand[] Returns an array of OfficeShopLand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfficeShopLand
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
