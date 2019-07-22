<?php

namespace App\Repository;

use App\Entity\Wilder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Wilder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wilder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wilder[]    findAll()
 * @method Wilder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WilderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Wilder::class);
    }

    public function findAllByName()
    {
        $query = $this->createQueryBuilder('wilder')
            ->select('wilder')
            ->setMaxResults(10)
            ->orderBy('wilder.name', 'desc');
        return $query->getQuery()->getResult();
    }

    public function random()
    {
        $query = $this->createQueryBuilder('wilder')
            ->select('wilder')
            ->setMaxResults(2)
            ->orderBy('wilder.id', 'asc');
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Wilder[] Returns an array of Wilder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wilder
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
