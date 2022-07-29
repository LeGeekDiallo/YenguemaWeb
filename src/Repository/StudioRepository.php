<?php

namespace App\Repository;

use App\Entity\ApartFilter;
use App\Entity\Studio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Studio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Studio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Studio[]    findAll()
 * @method Studio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Studio::class);
    }

    // /**
    //  * @return Studio[] Returns an array of Studio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Studio
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllStudio():Query{
        $query = $this->createQueryBuilder('studio')
            ->select('studio')
            ->orderBy('studio.created_at', 'DESC');

        return $query->getQuery();
    }
    public function findSearchByQuery(ApartFilter $search):Query{
        $query = $this->createQueryBuilder('studio');
        $query->andWhere(
            $query->expr()->orX(
                $query->expr()->like(
                    $query->expr()->lower('studio.city'),
                    $query->expr()->lower(':city')
                ),
                $query->expr()->like(
                    $query->expr()->lower('studio.municipality'),
                    $query->expr()->lower(':municipality')
                ),
                $query->expr()->like(
                    $query->expr()->lower('studio.district'),
                    $query->expr()->lower(':district')
                ),
                $query->expr()->lte('studio.price', ':price'),
            )
        )
            ->orderBy('studio.created_at', 'DESC')
            ->setParameters([
                ':city'=>$search->getLocation(),
                ':municipality'=>$search->getLocation(),
                ':district'=>$search->getLocation(),
                ':price'=>$search->getPrice()
            ]);

        return $query->getQuery();
    }

}
