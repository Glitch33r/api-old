<?php

namespace ApiBundle\Entity\Repository;

use ApiBundle\Entity\AnkorsInPageTable;

/**
 * BestOfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnkorsInPageTableRepository extends \Doctrine\ORM\EntityRepository
{
    public function getElementsForPhone($slug, $count)
    {
        return $this->createQueryBuilder('q')
            ->select('q, phoneTable, ankorTable, ankorPhone, ankorProductCategory')
            ->leftJoin('q.ankorTable', 'ankorTable')
            ->leftJoin('q.phoneTable', 'phoneTable')
            ->leftJoin('ankorTable.phoneTable', 'ankorPhone')
            ->leftJoin('ankorTable.productCategoryTable', 'ankorProductCategory')
            ->andWhere('q.isHomepage = :isHomepage')
            ->andWhere('q.isConstructor = :isConstructor')
            ->andWhere('phoneTable.slug = :slug')
            ->andWhere('q.cover IS NULL')
            ->andWhere('q.productTable IS NULL')
            ->andWhere('q.productCategoryTable IS NULL')
            ->orderBy('q.id', 'ASC')
            ->setMaxResults($count)
            ->setParameters([
                'isHomepage' => AnkorsInPageTable::NO,
                'isConstructor' => AnkorsInPageTable::NO,
                'slug' => $slug,
            ])
            ->getQuery()
            ->getResult();
    }

    public function getElementsForStekla($phone, $category, $count)
    {
        return $this->createQueryBuilder('q')
            ->select('q, phoneTable, ankorTable, ankorPhone, ankorProductCategory, productCategoryTable')
            ->leftJoin('q.ankorTable', 'ankorTable')
            ->leftJoin('q.phoneTable', 'phoneTable')
            ->leftJoin('q.productCategoryTable', 'productCategoryTable')
            ->leftJoin('ankorTable.phoneTable', 'ankorPhone')
            ->leftJoin('ankorTable.productCategoryTable', 'ankorProductCategory')
            ->andWhere('q.isHomepage = :isHomepage')
            ->andWhere('q.isConstructor = :isConstructor')
            ->andWhere('phoneTable.id = :phoneTableIid')
            ->andWhere('q.cover IS NULL')
            ->andWhere('q.productTable IS NULL')
            ->andWhere('productCategoryTable.id = :productCategoryTableId')
            ->orderBy('q.id', 'ASC')
            ->setParameters([
                'isHomepage' => AnkorsInPageTable::NO,
                'isConstructor' => AnkorsInPageTable::NO,
                'phoneTableIid' => $phone->getId(),
                'productCategoryTableId' => $category->getId(),
            ])
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }

    public function getElementsForCategory($category, $count)
    {
        return $this->createQueryBuilder('q')
            ->select('q, phoneTable, ankorTable, ankorPhone, ankorProductCategory, productCategoryTable')
            ->leftJoin('q.ankorTable', 'ankorTable')
            ->leftJoin('q.phoneTable', 'phoneTable')
            ->leftJoin('q.productCategoryTable', 'productCategoryTable')
            ->leftJoin('ankorTable.phoneTable', 'ankorPhone')
            ->leftJoin('ankorTable.productCategoryTable', 'ankorProductCategory')
            ->andWhere('q.isHomepage = :isHomepage')
            ->andWhere('q.isConstructor = :isConstructor')
            ->andWhere('q.phoneTable IS NULL')
            ->andWhere('q.cover IS NULL')
            ->andWhere('q.productTable IS NULL')
            ->andWhere('productCategoryTable.id = :productCategoryTableId')
            ->orderBy('q.id', 'ASC')
            ->setParameters([
                'isHomepage' => AnkorsInPageTable::NO,
                'isConstructor' => AnkorsInPageTable::NO,
                'productCategoryTableId' => $category->getId(),
            ])
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }

    public function getElementsForCover($slug, $count)
    {
        return $this->createQueryBuilder('q')
            ->select('q, phoneTable, ankorTable, ankorPhone, ankorProductCategory, productCategoryTable, cover')
            ->leftJoin('q.ankorTable', 'ankorTable')
            ->leftJoin('q.phoneTable', 'phoneTable')
            ->leftJoin('q.productCategoryTable', 'productCategoryTable')
            ->leftJoin('q.cover', 'cover')
            ->leftJoin('ankorTable.phoneTable', 'ankorPhone')
            ->leftJoin('ankorTable.productCategoryTable', 'ankorProductCategory')
            ->andWhere('q.isHomepage = :isHomepage')
            ->andWhere('q.isConstructor = :isConstructor')
            ->andWhere('q.phoneTable IS NULL')
            ->andWhere('q.productTable IS NULL')
            ->andWhere('q.productCategoryTable IS NULL')
            ->andWhere('cover.slug = :cover')
            ->orderBy('q.id', 'ASC')
            ->setParameters([
                'isHomepage' => AnkorsInPageTable::NO,
                'isConstructor' => AnkorsInPageTable::NO,
                'cover' => $slug,
            ])
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }

    public function getElementsForCategoryElement($category, $product, $count)
    {
        return $this->createQueryBuilder('q')
            ->select('q, phoneTable, ankorTable, ankorPhone, ankorProductCategory, productCategoryTable, cover, productTable')
            ->leftJoin('q.ankorTable', 'ankorTable')
            ->leftJoin('q.phoneTable', 'phoneTable')
            ->leftJoin('q.productCategoryTable', 'productCategoryTable')
            ->leftJoin('q.productTable', 'productTable')
            ->leftJoin('q.cover', 'cover')
            ->leftJoin('ankorTable.phoneTable', 'ankorPhone')
            ->leftJoin('ankorTable.productCategoryTable', 'ankorProductCategory')
            ->andWhere('q.isHomepage = :isHomepage')
            ->andWhere('q.isConstructor = :isConstructor')
            ->andWhere('q.phoneTable IS NULL')
            ->andWhere('productTable.id = :productTable')
            ->andWhere('q.cover IS NULL')
            ->andWhere('productCategoryTable.id = :productCategoryTableId')
            ->orderBy('q.id', 'ASC')
            ->setParameters([
                'isHomepage' => AnkorsInPageTable::NO,
                'isConstructor' => AnkorsInPageTable::NO,
                'productTable' => $product->getId(),
                'productCategoryTableId' => $category->getId(),
            ])
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }


}
