<?php

namespace App\Repository;

use App\Entity\CarteGraphique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarteGraphique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteGraphique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteGraphique[]    findAll()
 * @method CarteGraphique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteGraphiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteGraphique::class);
    }

    // /**
    //  * @return CarteGraphique[] Returns an array of CarteGraphique objects
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
    public function findOneBySomeField($value): ?CarteGraphique
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
