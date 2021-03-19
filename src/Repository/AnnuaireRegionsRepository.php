<?php

namespace App\Repository;

use App\Entity\AnnuaireRegions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnuaireRegions|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnuaireRegions|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnuaireRegions[]    findAll()
 * @method AnnuaireRegions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnuaireRegionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnuaireRegions::class);
    }

    // /**
    //  * @return AnnuaireRegions[] Returns an array of AnnuaireRegions objects
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
    public function findOneBySomeField($value): ?AnnuaireRegions
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
