<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Scpi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Scpi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scpi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scpi[]    findAll()
 * @method Scpi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScpiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Scpi::class);
        $this->paginator = $paginator;
    }

    /**
     * Récupére les Scpis liées au filter selon les categories, sociétes de gestion et l'assurance vie
     * @return PaginationInterface
     */
    public function findByFilter(SearchData $search)
    {
        $query = $this
            ->createQueryBuilder('s')
            ->orderBy('s.id', 'DESC')
            ->select('so', 's', 'c')
            ->join('s.societe_de_gestion', 'so')
            ->join('s.categorie', 'c');
        if (!empty($search->societe_de_gestion)) {
            $query = $query
                ->andWhere('so.id IN (:societe_de_gestion)')
                ->setParameter('societe_de_gestion', $search->societe_de_gestion);
        }
        if (!empty($search->categorie)) {
            $query = $query
                ->andWhere('c.id IN (:categorie)')
                ->setParameter('categorie', $search->categorie);
        }
        if (!empty($search->assurance_vie)) {
            $query = $query
                ->andWhere('s.assurance_vie = 1');
        }
        $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
            9
        );

    }
    // /**
    //  * @return Scpi[] Returns an array of Scpi objects
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
public function findOneBySomeField($value): ?Scpi
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
