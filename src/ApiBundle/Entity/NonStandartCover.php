<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * NonStandartCover
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="non_standart_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\NonStandartCoverRepository")
 */
class NonStandartCover
{
    public $coverTypes=[
        'кожаные'=>'leaser',
        'хенд-мейд'=>'handmade'
    ];
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
     * @var \ApiBundle\Entity\NonStandartCoverGalleryImage
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\NonStandartCoverGalleryImage",mappedBy="cover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $galleryImages;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="Phone", inversedBy="nonStandartCovers")
     * @ORM\JoinTable(name="phone_has_non_standart_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="HotSeller", inversedBy="nonStandartCovers")
     * @ORM\JoinTable(name="hot_seller_has_non_standart_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="hot_seller_id", referencedColumnName="id")
     *   }
     * )
     */
    private $hotSellers;
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
     *
     * @var \ApiBundle\Entity\NsCategory
     *
     * @ORM\ManyToOne(targetEntity="NsCategory",inversedBy="covers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;
    /**
     * @var string
     *
     * @ORM\Column(name="poster_title", type="string", length=255, nullable=true)
     */
    private $posterTitle;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="poster", type="text", nullable=true)
     */
    private $poster;
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
     * @var \OrderHasNonStandartCovers
     *
     * @ORM\OneToMany(targetEntity="OrderHasNonStandartCover",mappedBy="cover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $nonStandartCoverHasOrders;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterMaterial", inversedBy="nsCovers")
     * @ORM\JoinTable(name="material_has_ns_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterItemType", inversedBy="nsCovers")
     * @ORM\JoinTable(name="type_has_ns_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterColor", inversedBy="nsCovers")
     * @ORM\JoinTable(name="color_has_ns_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\PatternTags", inversedBy="nsCovers")
     * @ORM\JoinTable(name="tag_has_ns_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;
    /**
     * @var string - used to sort covers
     *
     * @ORM\Column(name="priority", type="integer", nullable=true)
     */
    private $priority=2;
    /**
     * whether or not item available for customer
     *
     * @var boolean
     * @ORM\Column(name="not_available_field", type="boolean", nullable=false)
     */
    private $notAvailable=true;
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
    public $delete;
    public $add;
    public function getClassName()
    {
        return "NonStandartCover";
    }
    public function __toString()
    {
        return ($this->title)?$this->title:"новый";
    }
    public function getArticul(){
        $length = 6-strlen((string)$this->id);
        return "ns".substr("000000",0,$length).$this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->galleryImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hotSellers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nonStandartCoverHasOrders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * Set coverType
     *
     * @param string $coverType
     *
     * @return NonStandartCover
     */
    public function setCoverType($coverType)
    {
        $this->coverType = $coverType;

        return $this;
    }

    /**
     * Get coverType
     *
     * @return string
     */
    public function getCoverType()
    {
        return $this->coverType;
    }

    /**
     * Set poster
     *
     * @param string $poster
     *
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @param \ApiBundle\Entity\NonStandartCoverGalleryImage $galleryImage
     *
     * @return NonStandartCover
     */
    public function addGalleryImage(\ApiBundle\Entity\NonStandartCoverGalleryImage $galleryImage)
    {
        $galleryImage->setCover($this);
        $this->galleryImages[] = $galleryImage;

        return $this;
    }

    /**
     * Remove galleryImage
     *
     * @param \ApiBundle\Entity\NonStandartCoverGalleryImage $galleryImage
     */
    public function removeGalleryImage(\ApiBundle\Entity\NonStandartCoverGalleryImage $galleryImage)
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
     * @return NonStandartCover
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
     * Add hotSeller
     *
     * @param \ApiBundle\Entity\HotSeller $hotSeller
     *
     * @return NonStandartCover
     */
    public function addHotSeller(\ApiBundle\Entity\HotSeller $hotSeller)
    {
        $this->hotSellers[] = $hotSeller;

        return $this;
    }

    /**
     * Remove hotSeller
     *
     * @param \ApiBundle\Entity\HotSeller $hotSeller
     */
    public function removeHotSeller(\ApiBundle\Entity\HotSeller $hotSeller)
    {
        $this->hotSellers->removeElement($hotSeller);
    }

    /**
     * Get hotSellers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHotSellers()
    {
        return $this->hotSellers;
    }

    /**
     * Add nonStandartCoverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $nonStandartCoverHasOrder
     *
     * @return NonStandartCover
     */
    public function addNonStandartCoverHasOrder(\ApiBundle\Entity\OrderHasNonStandartCover $nonStandartCoverHasOrder)
    {
        $this->nonStandartCoverHasOrders[] = $nonStandartCoverHasOrder;

        return $this;
    }

    /**
     * Remove nonStandartCoverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $nonStandartCoverHasOrder
     */
    public function removeNonStandartCoverHasOrder(\ApiBundle\Entity\OrderHasNonStandartCover $nonStandartCoverHasOrder)
    {
        $this->nonStandartCoverHasOrders->removeElement($nonStandartCoverHasOrder);
    }

    /**
     * Get nonStandartCoverHasOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNonStandartCoverHasOrders()
    {
        return $this->nonStandartCoverHasOrders;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return NonStandartCover
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
     * Set priority
     *
     * @param integer $priority
     *
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * @return NonStandartCover
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
     * Set category
     *
     * @param \ApiBundle\Entity\NsCategory $category
     *
     * @return NonStandartCover
     */
    public function setCategory(\ApiBundle\Entity\NsCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ApiBundle\Entity\NsCategory
     */
    public function getCategory()
    {
        return $this->category;
    }
}
