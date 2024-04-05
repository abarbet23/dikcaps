<?php

namespace App\Repository;

use App\Entity\Capote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Capote>
 *
 * @method Capote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Capote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Capote[]    findAll()
 * @method Capote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Capote::class);
    }

//    /**
//     * @return Capote[] Returns an array of Capote objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Capote
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
