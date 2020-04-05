<?php

namespace App\Repository;

use App\Entity\DiceRoundResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DiceRoundResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiceRoundResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiceRoundResult[]    findAll()
 * @method DiceRoundResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiceRoundResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiceRoundResult::class);
    }

    // /**
    //  * @return DiceRoundResult[] Returns an array of DiceRoundResult objects
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
    public function findOneBySomeField($value): ?DiceRoundResult
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
