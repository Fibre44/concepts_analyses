<?php

namespace App\Repository;

use App\Entity\Detailrubrique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Detailrubrique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Detailrubrique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Detailrubrique[]    findAll()
 * @method Detailrubrique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailrubriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detailrubrique::class);
    }

    // /**
    //  * @return Detailrubrique[] Returns an array of Detailrubrique objects
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
    public function findOneBySomeField($value): ?Detailrubrique
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
