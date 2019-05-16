<?php

namespace App\Repository;

use App\Entity\Avenger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Avenger|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avenger|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avenger[]    findAll()
 * @method Avenger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvengerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Avenger::class);
    }

    // /**
    //  * @return Avenger[] Returns an array of Avenger objects
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
    public function findOneBySomeField($value): ?Avenger
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
