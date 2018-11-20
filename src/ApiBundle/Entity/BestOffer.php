<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * BestOffer
 *
 * @ORM\Table(name="best_offer_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\BestOfferRepository")
 */
class BestOffer
{
    /**
     * @var int
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
     * @var string
     *
     * @ORM\Column(name="linkname_field", type="string", length=255, nullable=true)
     */
    private $linkname;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="bestOffers",indexBy="id")
     */
    private $products;
    public $typeFilter;
    public $phonesFilter;
    public function __toString()
    {
        return ($this->title)?'Товары : '.$this->title:"Новое предложение";
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return BestOffer
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
     * Set linkname
     *
     * @param string $linkname
     *
     * @return BestOffer
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;

        return $this;
    }

    /**
     * Get linkname
     *
     * @return string
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * Add product
     *
     * @param \ApiBundle\Entity\Product $product
     *
     * @return BestOffer
     */
    public function addProduct(\ApiBundle\Entity\Product $product)
    {
        $product->addBestOffer($this);
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \ApiBundle\Entity\Product $product
     */
    public function removeProduct(\ApiBundle\Entity\Product $product)
    {
        $product->removeBestOffer($this);
//        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts($products){
        $this->products = $products;
    }
}
