<?php

namespace App\Repository;

use App\Entity\ProfileSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProfileSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfileSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfileSettings[]    findAll()
 * @method ProfileSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfileSettingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProfileSettings::class);
    }

//    /**
//     * @return ProfileSettings[] Returns an array of ProfileSettings objects
//     */
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
    public function findOneBySomeField($value): ?ProfileSettings
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
