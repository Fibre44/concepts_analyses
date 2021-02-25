<?php

namespace App\Repository;

use App\Entity\Rubriquehru;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rubriquehru|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rubriquehru|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rubriquehru[]    findAll()
 * @method Rubriquehru[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RubriquehruRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rubriquehru::class);
    }

    // /**
    //  * @return Rubriquehru[] Returns an array of Rubriquehru objects
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
    public function findOneBySomeField($value): ?Rubriquehru
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
