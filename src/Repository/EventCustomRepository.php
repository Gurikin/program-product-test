<?php

namespace App\Repository;

use App\Entity\EventCustom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventCustom|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventCustom|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventCustom[]    findAll()
 * @method EventCustom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventCustomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventCustom::class);
    }

    // /**
    //  * @return EventCustom[] Returns an array of EventCustom objects
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
    public function findOneBySomeField($value): ?EventCustom
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
