<?php

namespace App\Repository;

use App\Entity\Rubriqueclient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rubriqueclient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rubriqueclient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rubriqueclient[]    findAll()
 * @method Rubriqueclient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RubriqueclientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rubriqueclient::class);
    }

    // /**
    //  * @return Rubriqueclient[] Returns an array of Rubriqueclient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rubriqueclient
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
