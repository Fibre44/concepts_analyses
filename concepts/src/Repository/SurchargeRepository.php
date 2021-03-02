<?php

namespace App\Repository;

use App\Entity\Surcharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Surcharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Surcharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Surcharge[]    findAll()
 * @method Surcharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurchargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Surcharge::class);
    }

    // /**
    //  * @return Surcharge[] Returns an array of Surcharge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Surcharge
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
