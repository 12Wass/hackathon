<?php

namespace App\Repository;

use App\Entity\AnswerLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnswerLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnswerLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnswerLink[]    findAll()
 * @method AnswerLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnswerLink::class);
    }

    // /**
    //  * @return AnswerLink[] Returns an array of AnswerLink objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnswerLink
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
