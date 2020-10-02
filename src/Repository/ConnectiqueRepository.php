<?php

namespace App\Repository;

use App\Entity\Connectique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Connectique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Connectique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Connectique[]    findAll()
 * @method Connectique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConnectiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Connectique::class);
    }

    // /**
    //  * @return Connectique[] Returns an array of Connectique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Connectique
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
