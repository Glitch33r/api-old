<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Product
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="product_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\ProductRepository")
 */
class Product
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
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @var string - description of product
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var \ProductGalleryImages
     *
     * @ORM\OneToMany(targetEntity="ProductGalleryImage",mappedBy="product",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $galleryImages;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="Phone", inversedBy="products")
     * @ORM\JoinTable(name="phone_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     *   }
     * )
     */
    private $phones;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="BestOffer", inversedBy="products")
     * @ORM\JoinTable(name="best_offer_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     *   }
     * )
     */
    private $bestOffers;
    /**
     * @var integer - cover original price
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;
    /**
     * @var integer - cover promo price
     *
     * @ORM\Column(name="promo_price", type="integer", nullable=true)
     */
    private $promo_price;
    /**
     *
     * @ORM\Column(name="filter_price", type="integer", nullable=true)
     */
    private $filter_price;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="poster", type="text", nullable=true)
     */
    private $poster;
    /**
     * @var string
     *
     * @ORM\Column(name="poster_title", type="string", length=255, nullable=true)
     */
    private $posterTitle;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="background", type="text", nullable=true)
     */
    private $background;
    /**
     * @var string - video path
     *
     * @ORM\Column(name="video", type="text", nullable=true)
     */
    private $video;
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @Gedmo\Slug(fields={"title"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    /**
     * @var \OrderHasProduct
     *
     * @ORM\OneToMany(targetEntity="OrderHasProduct",mappedBy="product",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $productHasOrders;
    /**
     *
     * @var \ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="ProductCategory",inversedBy="products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterMaterial", inversedBy="products")
     * @ORM\JoinTable(name="material_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     *   }
     * )
     */
    private $materials;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterItemType", inversedBy="products")
     * @ORM\JoinTable(name="type_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     *   }
     * )
     */
    private $types;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterColor", inversedBy="products")
     * @ORM\JoinTable(name="color_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     *   }
     * )
     */
    private $colors;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\PatternTags", inversedBy="products")
     * @ORM\JoinTable(name="tag_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;
    /**
     * @var string - used to sort products in list
     *
     * @ORM\Column(name="priority", type="integer", nullable=true)
     */
    private $priority=3;
    /**
     * whether or not item available for customer
     *
     * @var boolean
     * @ORM\Column(name="not_available_field", type="boolean", nullable=false)
     */
    private $notAvailable=false;
    /**
     * @var string - used to sort covers
     *
     * @ORM\Column(name="suggestion_weight", type="integer", nullable=true)
     */
    private $suggestionWeight;
    /**
     * whether or not item display in suggestion slider
     *
     * @var boolean
     * @ORM\Column(name="suggestion_available_field", type="boolean", nullable=false)
     */
    private $suggestionAvailable=false;

    /**
     * delete and add options are for custom collection manipulations
     * in best-offer actions
     */
    public $delete;
    public $add;
    public function getArticul(){
        $length = 6-strlen((string)$this->id);
        return "p".substr("000000",0,$length).$this->id;
    }
    public function __toString()
    {
        return ($this->title)?"Товар : ".$this->title:"Новый товар";
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->galleryImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bestOffers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productHasOrders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Set price
     *
     * @param integer $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set promoPrice
     *
     * @param integer $promoPrice
     *
     * @return Product
     */
    public function setPromoPrice($promoPrice)
    {
        $this->promo_price = $promoPrice;

        return $this;
    }

    /**
     * Get promoPrice
     *
     * @return integer
     */
    public function getPromoPrice()
    {
        return $this->promo_price;
    }

    /**
     * Set filterPrice
     *
     * @param integer $filterPrice
     *
     * @return Product
     */
    public function setFilterPrice($filterPrice)
    {
        $this->filter_price = $filterPrice;

        return $this;
    }

    /**
     * Get filterPrice
     *
     * @return integer
     */
    public function getFilterPrice()
    {
        return $this->filter_price;
    }

    /**
     * Set poster
     *
     * @param string $poster
     *
     * @return Product
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Product
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add galleryImage
     *
     * @param \ApiBundle\Entity\ProductGalleryImage $galleryImage
     *
     * @return Product
     */
    public function addGalleryImage(\ApiBundle\Entity\ProductGalleryImage $galleryImage)
    {
        $galleryImage->setProduct($this);
        $this->galleryImages[] = $galleryImage;

        return $this;
    }

    /**
     * Remove galleryImage
     *
     * @param \ApiBundle\Entity\ProductGalleryImage $galleryImage
     */
    public function removeGalleryImage(\ApiBundle\Entity\ProductGalleryImage $galleryImage)
    {
        $this->galleryImages->removeElement($galleryImage);
    }

    /**
     * Get galleryImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleryImages()
    {
        return $this->galleryImages;
    }

    /**
     * Add phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return Product
     */
    public function addPhone(\ApiBundle\Entity\Phone $phone)
    {
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     */
    public function removePhone(\ApiBundle\Entity\Phone $phone)
    {
        $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add bestOffer
     *
     * @param \ApiBundle\Entity\BestOffer $bestOffer
     *
     * @return Product
     */
    public function addBestOffer(\ApiBundle\Entity\BestOffer $bestOffer)
    {
        $this->bestOffers[] = $bestOffer;

        return $this;
    }

    /**
     * Remove bestOffer
     *
     * @param \ApiBundle\Entity\BestOffer $bestOffer
     */
    public function removeBestOffer(\ApiBundle\Entity\BestOffer $bestOffer)
    {
        $this->bestOffers->removeElement($bestOffer);
    }

    /**
     * Get bestOffers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBestOffers()
    {
        return $this->bestOffers;
    }

    /**
     * Add productHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasProduct $productHasOrder
     *
     * @return Product
     */
    public function addProductHasOrder(\ApiBundle\Entity\OrderHasProduct $productHasOrder)
    {
        $this->productHasOrders[] = $productHasOrder;

        return $this;
    }

    /**
     * Remove productHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasProduct $productHasOrder
     */
    public function removeProductHasOrder(\ApiBundle\Entity\OrderHasProduct $productHasOrder)
    {
        $this->productHasOrders->removeElement($productHasOrder);
    }

    /**
     * Get productHasOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductHasOrders()
    {
        return $this->productHasOrders;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set category
     *
     * @param \ApiBundle\Entity\ProductCategory $category
     *
     * @return Product
     */
    public function setCategory(\ApiBundle\Entity\ProductCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ApiBundle\Entity\ProductCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Product
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Add material
     *
     * @param \ApiBundle\Entity\FilterMaterial $material
     *
     * @return Product
     */
    public function addMaterial(\ApiBundle\Entity\FilterMaterial $material)
    {
        $this->materials[] = $material;

        return $this;
    }

    /**
     * Remove material
     *
     * @param \ApiBundle\Entity\FilterMaterial $material
     */
    public function removeMaterial(\ApiBundle\Entity\FilterMaterial $material)
    {
        $this->materials->removeElement($material);
    }

    /**
     * Get materials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * Add type
     *
     * @param \ApiBundle\Entity\FilterItemType $type
     *
     * @return Product
     */
    public function addType(\ApiBundle\Entity\FilterItemType $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \ApiBundle\Entity\FilterItemType $type
     */
    public function removeType(\ApiBundle\Entity\FilterItemType $type)
    {
        $this->types->removeElement($type);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Add color
     *
     * @param \ApiBundle\Entity\FilterColor $color
     *
     * @return Product
     */
    public function addColor(\ApiBundle\Entity\FilterColor $color)
    {
        $this->colors[] = $color;

        return $this;
    }

    /**
     * Remove color
     *
     * @param \ApiBundle\Entity\FilterColor $color
     */
    public function removeColor(\ApiBundle\Entity\FilterColor $color)
    {
        $this->colors->removeElement($color);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Add tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     *
     * @return Product
     */
    public function addTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     */
    public function removeTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set background
     *
     * @param string $background
     *
     * @return Product
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set posterTitle
     *
     * @param string $posterTitle
     *
     * @return Product
     */
    public function setPosterTitle($posterTitle)
    {
        $this->posterTitle = $posterTitle;

        return $this;
    }

    /**
     * Get posterTitle
     *
     * @return string
     */
    public function getPosterTitle()
    {
        return $this->posterTitle;
    }
    /**
     * Set suggestionWeight
     *
     * @param integer $suggestionWeight
     *
     * @return Product
     */
    public function setSuggestionWeight($suggestionWeight)
    {
        $this->suggestionWeight = $suggestionWeight;

        return $this;
    }

    /**
     * Get suggestionWeight
     *
     * @return integer
     */
    public function getSuggestionWeight()
    {
        return $this->suggestionWeight;
    }

    /**
     * Set suggestionAvailable
     *
     * @param boolean $suggestionAvailable
     *
     * @return Product
     */
    public function setSuggestionAvailable($suggestionAvailable)
    {
        $this->suggestionAvailable = $suggestionAvailable;

        return $this;
    }

    /**
     * Get suggestionAvailable
     *
     * @return boolean
     */
    public function getSuggestionAvailable()
    {
        return $this->suggestionAvailable;
    }

    /**
     * Set notAvailable
     *
     * @param boolean $notAvailable
     *
     * @return Product
     */
    public function setNotAvailable($notAvailable)
    {
        $this->notAvailable = $notAvailable;

        return $this;
    }

    /**
     * Get notAvailable
     *
     * @return boolean
     */
    public function getNotAvailable()
    {
        return $this->notAvailable;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
