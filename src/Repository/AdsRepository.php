<?php

namespace App\Repository;

use App\Entity\Ads;
use App\Entity\AdSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Ads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ads[]    findAll()
 * @method Ads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ads::class);
    }

    /**
     * search full text
     * @param AdSearch $search
     * @return Query
     */
    public function findSearchByQuery(AdSearch $search):Query{
        $query = $this->createQueryBuilder('ads');
        $query->andWhere('MATCH_AGAINST(ads.adTitle, ads.adType, ads.details) AGAINST (:keyword boolean)>0')
            ->andWhere($query->expr()->orX(
                $query->expr()->like('ads.city', ':city'),
                $query->expr()->like('ads.municipality', ':municipality'),
                $query->expr()->like('ads.address', ':address')
            ))
            ->orderBy('ads.createdAt', 'DESC')
            ->setParameters([
                ':keyword'=>$search->getKeyWord(),
                ':city'=>$search->getAddress(),
                ':municipality'=>$search->getAddress(),
                ':address'=>$search->getAddress()
            ]);
        return $query->getQuery();
    }

    /**
     * @param string $column
     * @param string $criteria
     * @return Query
     */
    public function findByQuery(string $column, string $criteria):Query{
        return $this->createQueryBuilder('a')
            ->andWhere('a.'.$column.'=:criteria')
            ->orderBy('a.createdAt', 'DESC')
            ->setParameter(':criteria',$criteria)
            ->getQuery();
    }

    public function findLastFourAds():array{
        return $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Ads[] Returns an array of Ads objects
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
    public function findOneBySomeField($value): ?Ads
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
