<?php

namespace App\Repository;

use App\Entity\CartePerso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CartePerso>
 *
 * @method CartePerso|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartePerso|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartePerso[]    findAll()
 * @method CartePerso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartePersoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartePerso::class);
    }

//    /**
//     * @return CartePerso[] Returns an array of CartePerso objects
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

//    public function findOneBySomeField($value): ?CartePerso
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
