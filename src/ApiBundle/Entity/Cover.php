<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Cover
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="cover_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CoverRepository")
 */
class Cover
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
     * @var \CoverGalleryImages
     *
     * @ORM\OneToMany(targetEntity="CoverGalleryImage",mappedBy="cover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $coverGalleryImages;
    /**
     *
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone",inversedBy="covers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * })
     */
    private $phone;
    /**
     *
     * @var \Pattern
     *
     * @ORM\ManyToOne(targetEntity="Pattern",inversedBy="covers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     * })
     */
    private $pattern;
    /**
     * @var integer - cover original price
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;
    /**
     * @var integer - cover original price
     *
     * @ORM\Column(name="filter_price", type="integer", nullable=true)
     */
    private $filterPrice;
    /**
     * @var integer - cover promo price
     *
     * @ORM\Column(name="promo_price", type="integer", nullable=true)
     */
    private $promo_price;
    /**
     * @var \CoverType
     *
     * @ORM\ManyToOne(targetEntity="CoverType",inversedBy="covers" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_type_id", referencedColumnName="id")
     * })
     */
    private $coverType;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;
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
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at",type="datetime", nullable=true)
     */
    private $updatedAt;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * peoples,who selected cover as liked
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="likes")
     * @ORM\JoinTable(name="user_likes_cover",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   }
     * )
     */
    private $users;

    /**
     * @var \TransparentImages
     *
     * @ORM\OneToMany(targetEntity="TransparentImage", mappedBy="cover" ,cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $transparentImages;
    /**
     * @var - none-table property for childCoverConstructorType
     */
    private $persist;
    /**
     * @var - none-table property for childCoverConstructorType
     */
    private $coverId;
    /**
     * @var - none-table property for cover List
     */
    private $coverTypeTitle;

    /**
     * @Gedmo\Slug(fields={"title"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    /**
     * @var \OrderHasCovers
     *
     * @ORM\OneToMany(targetEntity="OrderHasCover",mappedBy="cover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $coverHasOrders;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="HotSeller", inversedBy="covers")
     * @ORM\JoinTable(name="hot_seller_has_cover",
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
    public $delete;
    public $add;
    public function __toString()
    {
        return $this->title ? $this->title.' '.$this->getArticul() : 'new';
    }
    public function getCoverTypeTitle()
    {
        return $this->coverType->getTitle();
    }

    public function getSlug()
    {
        return $this->slug;
    }


    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function getCoverId()
    {
        return $this->getId();
    }
    public function setCoverId($coverId)
    {
        $this->coverId=$coverId;
        return $this;
    }
    public function getPersist()
    {
        return $this->persist;
    }
    public function setPersist($persist)
    {
        $this->persist=$persist;
        return $this;
    }
    /**
     * Set price
     *
     * @param int $price
     *
     * @return Cover
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set promoPrice
     *
     * @param int $promoPrice
     *
     * @return Cover
     */
    public function setPromoPrice($promoPrice)
    {
        $this->promo_price = $promoPrice;

        return $this;
    }

    /**
     * Get promoPrice
     *
     * @return int
     */
    public function getPromoPrice()
    {
        return round($this->promo_price);
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Cover
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Cover
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
     * @return Cover
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
     * Set phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return Cover
     */
    public function setPhone(\ApiBundle\Entity\Phone $phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \ApiBundle\Entity\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set pattern
     *
     * @param \ApiBundle\Entity\Pattern $pattern
     *
     * @return Cover
     */
    public function setPattern(\ApiBundle\Entity\Pattern $pattern = null)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return \ApiBundle\Entity\Pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set coverType
     *
     * @param \ApiBundle\Entity\CoverType $coverType
     *
     * @return Cover
     */
    public function setCoverType(\ApiBundle\Entity\CoverType $coverType = null)
    {
        $this->coverType = $coverType;

        return $this;
    }

    /**
     * Get coverType
     *
     * @return \ApiBundle\Entity\CoverType
     */
    public function getCoverType()
    {
        return $this->coverType;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Cover
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
     * Add transparentImage
     *
     * @param \ApiBundle\Entity\TransparentImage $transparentImage
     *
     * @return Cover
     */
    public function addTransparentImage(\ApiBundle\Entity\TransparentImage $transparentImage)
    {
        $transparentImage->setCover($this);
        $this->transparentImages[] = $transparentImage;

        return $this;
    }

    /**
     * Remove transparentImage
     *
     * @param \ApiBundle\Entity\TransparentImage $transparentImage
     */
    public function removeTransparentImage(\ApiBundle\Entity\TransparentImage $transparentImage)
    {
        $this->transparentImages->removeElement($transparentImage);
    }

    /**
     * Get transparentImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransparentImages()
    {
        return $this->transparentImages;
    }

    /**
     * Add coverGalleryImage
     *
     * @param \ApiBundle\Entity\CoverGalleryImage $coverGalleryImage
     *
     * @return Cover
     */
    public function addCoverGalleryImage(\ApiBundle\Entity\CoverGalleryImage $coverGalleryImage)
    {
        $coverGalleryImage->setCover($this);
        $this->coverGalleryImages[] = $coverGalleryImage;

        return $this;
    }

    /**
     * Remove coverGalleryImage
     *
     * @param \ApiBundle\Entity\CoverGalleryImage $coverGalleryImage
     */
    public function removeCoverGalleryImage(\ApiBundle\Entity\CoverGalleryImage $coverGalleryImage)
    {
        $this->coverGalleryImages->removeElement($coverGalleryImage);
    }

    /**
     * Get coverGalleryImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoverGalleryImages()
    {
        return $this->coverGalleryImages;
    }

    /**
     * Add coverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasCover $coverHasOrder
     *
     * @return Cover
     */
    public function addCoverHasOrder(\ApiBundle\Entity\OrderHasCover $coverHasOrder)
    {
        $this->coverHasOrders[] = $coverHasOrder;

        return $this;
    }

    /**
     * Remove coverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasCover $coverHasOrder
     */
    public function removeCoverHasOrder(\ApiBundle\Entity\OrderHasCover $coverHasOrder)
    {
        $this->coverHasOrders->removeElement($coverHasOrder);
    }

    /**
     * Get coverHasOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoverHasOrders()
    {
        return $this->coverHasOrders;
    }

    /**
     * Add user
     *
     * @param \ApiBundle\Entity\User $user
     *
     * @return Cover
     */
    public function addUser(\ApiBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \ApiBundle\Entity\User $user
     */
    public function removeUser(\ApiBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
    public function getArticul()
    {
        $patStr="0000";
        $phoStr="000";
        if($this->getPattern()){
            $patId=(string)$this->getPattern()->getId();
        }
        else{
            $patId = 'xxxx';
        }
        if($this->getPhone()){
            $phoId=(string)$this->getPhone()->getId();
        }
        else{
            $phoId = 'xxx';
        }
        return substr($patStr,0,4-strlen($patId)).$patId."-".substr($phoStr,0,3-strlen($phoId)).$phoId;
    }
    public function getClassName()
    {
        return "Cover";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coverGalleryImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transparentImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->coverHasOrders = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set filterPrice
     *
     * @param integer $filterPrice
     *
     * @return Cover
     */
    public function setFilterPrice($filterPrice)
    {
        $this->filterPrice = $filterPrice;

        return $this;
    }

    /**
     * Get filterPrice
     *
     * @return integer
     */
    public function getFilterPrice()
    {
        return $this->filterPrice;
    }

    /**
     * Add hotSeller
     *
     * @param \ApiBundle\Entity\HotSeller $hotSeller
     *
     * @return Cover
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
     * Set notAvailable
     *
     * @param boolean $notAvailable
     *
     * @return Cover
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
     * Set suggestionWeight
     *
     * @param integer $suggestionWeight
     *
     * @return Cover
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
     * @return Cover
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Cover
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
