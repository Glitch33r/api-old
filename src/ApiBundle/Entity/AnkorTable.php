<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AnkorTable
 *
 * @ORM\Table(name="ankor_table", indexes={@ORM\Index(name="fk_ankor_table_phone_table1_idx", columns={"phone_table_id"}), @ORM\Index(name="fk_ankor_table_product_category_table1_idx", columns={"product_category_table_id"})})
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\AnkorTableRepository")
 */
class AnkorTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_homepage", type="integer", nullable=false)
     */
    private $isHomepage = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_constructor", type="integer", nullable=false)
     */
    private $isConstructor = false;

    /**
     * @var \ApiBundle\Entity\Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_table_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $phoneTable;

//    /**
//     * @var \ApiBundle\Entity\Product
//     *
//     * @ORM\ManyToOne(targetEntity="Product")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="product_table_id", referencedColumnName="id")
//     * })
//     */
//    private $productTable;

    /**
     * @var \ApiBundle\Entity\ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_category_table_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $productCategoryTable;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return AnkorTable
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set isHomepege
     *
     * @param integer $isHomepage
     *
     * @return AnkorTable
     */
    public function setIsHomepage($isHomepage)
    {
        $this->isHomepage = $isHomepage;

        return $this;
    }

    /**
     * Get isHomepege
     *
     * @return integer
     */
    public function getIsHomepage()
    {
        return $this->isHomepage;
    }

    /**
     * Set isConstructor
     *
     * @param integer $isConstructor
     *
     * @return AnkorTable
     */
    public function setIsConstructor($isConstructor)
    {
        $this->isConstructor = $isConstructor;

        return $this;
    }

    /**
     * Get isConstructor
     *
     * @return integer
     */
    public function getIsConstructor()
    {
        return $this->isConstructor;
    }

    /**
     * Set phoneTable
     *
     * @param \ApiBundle\Entity\Phone $phoneTable
     *
     * @return AnkorTable
     */
    public function setPhoneTable(Phone $phoneTable = null)
    {
        $this->phoneTable = $phoneTable;

        return $this;
    }

    /**
     * Get phoneTable
     *
     * @return \ApiBundle\Entity\Phone
     */
    public function getPhoneTable()
    {
        return $this->phoneTable;
    }

//    /**
//     * Set productTable
//     *
//     * @param \ApiBundle\Entity\Product $productTable
//     *
//     * @return AnkorTable
//     */
//    public function setProductTable(Product $productTable = null)
//    {
//        $this->productTable = $productTable;
//
//        return $this;
//    }
//
//    /**
//     * Get productTable
//     *
//     * @return \ApiBundle\Entity\Product
//     */
//    public function getProductTable()
//    {
//        return $this->productTable;
//    }

    /**
     * Set productCategoryTable
     *
     * @param \ApiBundle\Entity\ProductCategory $productCategoryTable
     *
     * @return AnkorTable
     */
    public function setProductCategoryTable(ProductCategory $productCategoryTable = null)
    {
        $this->productCategoryTable = $productCategoryTable;

        return $this;
    }

    /**
     * Get productCategoryTable
     *
     * @return \ApiBundle\Entity\ProductCategory
     */
    public function getProductCategoryTable()
    {
        return $this->productCategoryTable;
    }
}
