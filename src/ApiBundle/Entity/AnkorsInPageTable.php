<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AnkorsInPageTable
 *
 * @ORM\Table(name="ankors_in_page_table", indexes={@ORM\Index(name="fk_ankors_in_page_table_product_category_table1_idx", columns={"product_category_table_id"}), @ORM\Index(name="fk_ankors_in_page_table_phone_table1_idx", columns={"phone_table_id"})})
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\AnkorsInPageTableRepository")
 */
class AnkorsInPageTable
{
    /* YES / NO */
    const YES = 1;
    const NO = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_homepage", type="integer", nullable=false)
     */
    private $isHomepage = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="is_constructor", type="integer", nullable=false)
     */
    private $isConstructor = '0';

    /**
     * @var \ApiBundle\Entity\Cover
     *
     * @ORM\ManyToOne(targetEntity="Cover")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $cover;

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
     * @var \ApiBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_table_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $productTable;

    /**
     * @var \ApiBundle\Entity\Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_table_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $phoneTable;

    /**
     * @var \ApiBundle\Entity\AnkorTable
     *
     * @ORM\ManyToOne(targetEntity="AnkorTable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ankor_table_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $ankorTable;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ankorTable = new ArrayCollection();
    }


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
     * Set isHomepage
     *
     * @param integer $isHomepage
     *
     * @return AnkorsInPageTable
     */
    public function setIsHomepage($isHomepage)
    {
        $this->isHomepage = $isHomepage;

        return $this;
    }

    /**
     * Get isHomepage
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
     * @return AnkorsInPageTable
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
     * Set productCategoryTable
     *
     * @param \ApiBundle\Entity\ProductCategory $productCategoryTable
     *
     * @return AnkorsInPageTable
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

    /**
     * Set productTable
     *
     * @param \ApiBundle\Entity\Product $productTable
     *
     * @return AnkorsInPageTable
     */
    public function setProductTable(Product $productTable = null)
    {
        $this->productTable = $productTable;

        return $this;
    }

    /**
     * Get productTable
     *
     * @return \ApiBundle\Entity\Product
     */
    public function getProductTable()
    {
        return $this->productTable;
    }

    /**
     * Set phoneTable
     *
     * @param \ApiBundle\Entity\Phone $phoneTable
     *
     * @return AnkorsInPageTable
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

    /**
     * Set ankorTable
     *
     * @param \ApiBundle\Entity\AnkorTable $ankorTable
     *
     * @return AnkorsInPageTable
     */
    public function setAnkorTable(AnkorTable $ankorTable = null)
    {
        $this->ankorTable = $ankorTable;

        return $this;
    }

    /**
     * Get ankorTable
     *
     * @return \ApiBundle\Entity\AnkorTable
     */
    public function getAnkorTable()
    {
        return $this->ankorTable;
    }

    /**
     * Set cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return AnkorsInPageTable
     */
    public function setCover(\ApiBundle\Entity\Cover $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \ApiBundle\Entity\Cover
     */
    public function getCover()
    {
        return $this->cover;
    }
}
