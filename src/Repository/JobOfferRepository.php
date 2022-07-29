<?php

namespace App\Repository;

use App\Entity\JobOffer;
use App\Entity\JobOfferSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobOffer[]    findAll()
 * @method JobOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobOffer::class);
    }

    public function findSearchByQuery(JobOfferSearch $search):Query{
        $query = $this->createQueryBuilder('job_offer');
        $query->andWhere('MATCH_AGAINST(job_offer.job_title, job_offer.category, job_offer.employer_profile, 
            job_offer.required_skills, job_offer.employer_mission, job_offer.other_details) AGAINST (:job_title boolean)>0')
            ->andWhere(
            $query->expr()->orX(
                $query->expr()->like($query->expr()->lower('job_offer.city'), $query->expr()->lower(':address')),
                $query->expr()->like($query->expr()->lower('job_offer.municipality'), $query->expr()->lower(':address'))
            ))
            ->orderBy('job_offer.created_at', 'DESC')
            ->setParameters([
                ':address'=>$search->getAddress(),
                ':job_title'=>$search->getJobTitle(),
            ]);
        return $query->getQuery();
    }

    public function findByQuery(string $column, string $criteria):Query{
        return $this->createQueryBuilder('job_offer')
            ->andWhere('job_offer.'.$column.'=:criteria')
            ->orderBy('job_offer.created_at', 'DESC')
            ->setParameter(':criteria',$criteria)
            ->getQuery();
    }
    public function findAddress(){
        return $this->createQueryBuilder('job_offer')
            ->select(array('job_offer.city', 'job_offer.municipality'))
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return JobOffer[] Returns an array of JobOffer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobOffer
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findRecentJob():array{
        return $this->createQueryBuilder('job_offer')
            ->orderBy('job_offer.created_at', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }
}
