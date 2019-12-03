<?php

namespace App\Repository;

use App\Entity\ProgramationCircuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProgramationCircuit|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgramationCircuit|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgramationCircuit[]    findAll()
 * @method ProgramationCircuit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramationCircuitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProgramationCircuit::class);
    }

//    /**
//     * @return ProgramationCircuit[] Returns an array of ProgramationCircuit objects
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
    public function findOneBySomeField($value): ?ProgramationCircuit
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
