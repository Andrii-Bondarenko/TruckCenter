<?php

namespace App\Repository;

use App\Entity\FeedbackContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FeedbackContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method FeedbackContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method FeedbackContact[]    findAll()
 * @method FeedbackContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeedbackContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FeedbackContact::class);
    }


}
