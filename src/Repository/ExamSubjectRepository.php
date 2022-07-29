<?php

namespace App\Repository;

use App\Entity\EBookSearch;
use App\Entity\ExamSubject;
use App\Entity\ExamSubjectSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamSubject|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamSubject|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamSubject[]    findAll()
 * @method ExamSubject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamSubjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamSubject::class);
    }

    public function findSearchByQuery(ExamSubjectSearch $search):Query{
        $query = $this->createQueryBuilder('exam_subject');
        $query->where($query->expr()->orX(
            $query->expr()->like($query->expr()->lower('exam_subject.course_name'), $query->expr()->lower(':book_name')),
            $query->expr()->like($query->expr()->lower('exam_subject.the_mention'), $query->expr()->lower(':book_name')),
            $query->expr()->like($query->expr()->lower('exam_subject.level'), $query->expr()->lower(':book_name')),
            $query->expr()->like('exam_subject.exam_year', $query->expr()->lower(':book_name')),
            $query->expr()->like($query->expr()->lower('exam_subject.school_name'), $query->expr()->lower(':book_name'))
            )
        )
            ->orderBy('exam_subject.created_at', 'DESC')
            ->setParameter(':book_name',$search->getCourseName());
        return $query->getQuery();

    }
    public function findByQuery(string $column, string $filter):Query{
        return $this->createQueryBuilder('exam_subject')
            ->andWhere('exam_subject.'.$column.'=:filter')
            ->orderBy('exam_subject.created_at', 'DESC')
            ->setParameter(':filter',$filter)
            ->getQuery();
    }
    // /**
    //  * @return ExamSubject[] Returns an array of ExamSubject objects
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
    public function findOneBySomeField($value): ?ExamSubject
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
