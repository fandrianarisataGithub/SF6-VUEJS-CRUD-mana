<?php

namespace App\Repository;

use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Member>
 *
 * @method Member|null find($id, $lockMode = null, $lockVersion = null)
 * @method Member|null findOneBy(array $criteria, array $orderBy = null)
 * @method Member[]    findAll()
 * @method Member[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Member::class);
    }
    public function findAll()
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.marketing', 'ma')
            ->leftJoin('m.building', 'b')
            ->select('
                m.id,
                m.hisFunction as hisFunction,
                m.sTel as sTel,
                m.fTel as fTel,
                m.mTel as mTel,
                m.email as email,
                m.linkedIn as linkedIn,
                ma.id as marketingId,
                ma.name as marketingName,
                b.id as bId,
                b.name as bName
            ')
            ->getQuery()
            ->getArrayResult()
        ;
    }

//    /**
//     * @return Member[] Returns an array of Member objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Member
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
