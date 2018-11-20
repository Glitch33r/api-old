<?php

namespace ApiBundle\Entity\Repository;
use ApiBundle\Entity\AnkorsInPageTable;

/**
 * BestOfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnkorTableRepository extends \Doctrine\ORM\EntityRepository
{
    public function getRandomElements($count)
    {
        return $this->createQueryBuilder('q')
            ->select('q')
            ->addSelect('RAND() as HIDDEN rand')
            ->addOrderBy('rand')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }
}

