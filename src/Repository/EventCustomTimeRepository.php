<?php

namespace App\Repository;

use App\Entity\EventCustomTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventCustomTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventCustomTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventCustomTime[]    findAll()
 * @method EventCustomTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventCustomTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventCustomTime::class);
    }

    // /**
    //  * @return EventCustomTime[] Returns an array of EventCustomTime objects
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
    public function findOneBySomeField($value): ?EventCustomTime
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
