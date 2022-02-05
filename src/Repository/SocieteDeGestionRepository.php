<?php

namespace App\Repository;

use App\Entity\SocieteDeGestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SocieteDeGestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocieteDeGestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocieteDeGestion[]    findAll()
 * @method SocieteDeGestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocieteDeGestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocieteDeGestion::class);
    }

    // /**
    //  * @return SocieteDeGestion[] Returns an array of SocieteDeGestion objects
    //  */
    /*
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
     */

    /*
public function findOneBySomeField($value): ?SocieteDeGestion
{
return $this->createQueryBuilder('s')
->andWhere('s.exampleField = :val')
->setParameter('val', $value)
->getQuery()
->getOneOrNullResult()
;
}
 */
}
