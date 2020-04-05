<?php

namespace App\Repository;

use App\Entity\DiceBet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DiceBet|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiceBet|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiceBet[]    findAll()
 * @method DiceBet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiceBetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiceBet::class);
    }

    // /**
    //  * @return DiceBet[] Returns an array of DiceBet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiceBet
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
