<?php

namespace App\Repository;

use App\Entity\Adherents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Adherents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adherents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adherents[]    findAll()
 * @method Adherents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdherentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adherents::class);
    }
    /**
    * @return Adherents[] Returns an array of Adherents objects
    */
    public function search ($critere)
    {
        return $this->createQueryBuilder('a')
            
            ->andWhere('a.NomPrenom LIKE :NomPrenom')
            ->setParameter('NomPrenom', '%'.$critere.'%')
            ->orWhere('a.Dossier LIKE :Dossier')
            ->setParameter('Dossier', '%'.$critere.'%')
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Adherents[] Returns an array of Adherents objects
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

    // public function search(?string $NomPrenom)
    // {
    //     $qb = $this->createQueryBuilder('a');
    //     $expr = $qb->expr();
    //     // $expr = new Expr();

    //     if ($NomPrenom) {
    //         $qb
    //             /* ->where($expr->orX(
    //             $expr->like($expr->concat($expr->concat('CONCATa.Nom', ' '), 'a.Prenom'), ':name'),
    //             $expr->like($expr->concat($expr->concat('a.Prenom', ' '), 'a.Nom'), ':name'),
    //         ))*/
    //             ->where($expr->orX(
    //                 $expr->like('CONCAT(a.NomPrenom)', ':NomPrenom')
                  
    //             ))
    //             ->setParameter('name', "%$NomPrenom%");
    //     }

    //     return $qb->getQuery()->getResult();
    // }

    /*
    public function findOneBySomeField($value): ?Adherents
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
