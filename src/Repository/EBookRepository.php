<?php

namespace App\Repository;

use App\Entity\EBook;
use App\Entity\EBookSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method EBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method EBook[]    findAll()
 * @method EBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EBook::class);
    }

    public function findSearchByQuery(EBookSearch $search):Query{
        $query = $this->createQueryBuilder('ebook');
        $query->where($query->expr()->orX(
                $query->expr()->like($query->expr()->lower('ebook.title'), $query->expr()->lower(':book_name')),
                $query->expr()->like($query->expr()->lower('ebook.category'), $query->expr()->lower(':book_name'))))
            ->orderBy('ebook.created_at', 'DESC')
            ->setParameter(':book_name',$search->getEbookName());
        return $query->getQuery();

    }
    public function findByQuery(string $column, string $filter):Query{
        return $this->createQueryBuilder('ebook')
            ->andWhere('ebook.'.$column.'=:filter')
            ->orderBy('ebook.created_at', 'DESC')
            ->setParameter(':filter',$filter)
            ->getQuery();
    }
    // /**
    //  * @return EBook[] Returns an array of EBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EBook
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
