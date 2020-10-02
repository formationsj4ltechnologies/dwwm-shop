<?php

namespace App\Repository;

use App\Entity\Processeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Processeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Processeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Processeur[]    findAll()
 * @method Processeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcesseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Processeur::class);
    }

    // /**
    //  * @return Processeur[] Returns an array of Processeur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Processeur
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
