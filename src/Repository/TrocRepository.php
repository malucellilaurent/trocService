<?php

namespace App\Repository;

use App\Entity\Troc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Troc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Troc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Troc[]    findAll()
 * @method Troc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Troc::class);
    }

    // /**
    //  * @return Troc[] Returns an array of Troc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Troc
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
