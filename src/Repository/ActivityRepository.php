<?php

namespace App\Repository;

use App\Entity\Activity;
use App\Entity\ActivitySearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Activity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activity[]    findAll()
 * @method Activity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function findByQuery(string $column, string $criteria):Query{
        return $this->createQueryBuilder('a')
            ->andWhere('a.'.$column.'=:criteria')
            ->orderBy('a.createdAt', 'DESC')
            ->setParameter(':criteria',$criteria)
            ->getQuery();
    }

    public function findSearchByQuery(ActivitySearch $search):Query{
        $query = $this->createQueryBuilder('a');
        $query->andWhere('a.category=:category')
            ->andWhere($query->expr()->orX(
                $query->expr()->like('a.city', ':city'),
                $query->expr()->like('a.municipality', ':municipality'),
                $query->expr()->like('a.address', ':address')
                    ))
            ->orderBy('a.createdAt', 'DESC')
            ->setParameters([
                ':category'=>$search->getCategory(),
                ':city'=>$search->getAddress(),
                ':municipality'=>$search->getAddress(),
                ':address'=>$search->getAddress()]);
        return $query->getQuery();

    }

    // /**
    //  * @return Activity[] Returns an array of Activity objects
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
    public function findOneBySomeField($value): ?Activity
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
