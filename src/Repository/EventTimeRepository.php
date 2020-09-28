<?php

namespace App\Repository;

use App\Entity\EventTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventTime[]    findAll()
 * @method EventTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventTime::class);
    }

    // /**
    //  * @return EventTime[] Returns an array of EventTime objects
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
    public function findOneBySomeField($value): ?EventTime
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
