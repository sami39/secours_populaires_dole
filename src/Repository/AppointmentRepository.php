<?php

namespace App\Repository;

use App\Entity\Appointment;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Appointment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointment[]    findAll()
 * @method Appointment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    // /**
    //  * @return Appointment[] Returns an array of Appointment objects
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
    public function findOneBySomeField($value): ?Appointment
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return Appointment[] Returns an array of Appointment objects
     */

    public function findByfichejournaliere(\DateTimeInterface $date)
    {
        $datestart = new \DateTime($date->format('Y-m-d') . '00:00:00', new \DateTimeZone('Europe/Paris'));
        $dateend = new \DateTime($date->format('Y-m-d') . '23:59:59',  new \DateTimeZone('Europe/Paris'));
        return $this->createQueryBuilder('a')
            ->andWhere('a.date BETWEEN :datestart AND :dateend')
            ->setParameter('datestart', $datestart)
            ->setParameter('dateend', $dateend)
            ->getQuery()
            ->getResult();
    }


     
    public function findOneByid($value): ?Appointment
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
