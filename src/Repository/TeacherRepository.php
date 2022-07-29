<?php

namespace App\Repository;

use App\Entity\Teacher;
use App\Entity\TeacherSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Teacher|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teacher|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teacher[]    findAll()
 * @method Teacher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teacher::class);
    }

    public function findByQuery(string $column, string $filter):Query{
        return $this->createQueryBuilder('teacher')
            ->andWhere('teacher.'.$column.'=:filter')
            ->orderBy('teacher.created_at', 'DESC')
            ->setParameter(':filter',$filter)
            ->getQuery();
    }

    public function findSearchByQuery(TeacherSearch $search):Query{
        $query = $this->createQueryBuilder('teacher');
        $query->andWhere('teacher.course=:course_name')
            ->andWhere($query->expr()->orX(
                $query->expr()->like('teacher.city', ':city'),
                $query->expr()->like('teacher.municipality', ':city'),
            ))
            ->orderBy('teacher.created_at', 'DESC')
            ->setParameters([
                ':course_name'=>$search->getCourseName(),
                ':city'=>$search->getCity()
            ]);
        return $query->getQuery();

    }
    // /**
    //  * @return Teacher[] Returns an array of Teacher objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Teacher
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
