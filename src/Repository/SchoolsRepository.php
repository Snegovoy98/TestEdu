<?php

namespace App\Repository;

use App\Entity\Schools;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Schools|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schools|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schools[]    findAll()
 * @method Schools[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Schools::class);
    }

    /**
     * @return Schools[] Returns an array of Schools objects
     */

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

    public function findOneBySomeField($value): ?Schools
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
