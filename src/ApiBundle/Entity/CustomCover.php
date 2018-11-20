<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CustomCover
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="custom_cover_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CustomCoverRepository")
 */
class CustomCover
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
     * @var string - text
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;
    /**
     * @var \CustomCoverGalleryImages
     *
     * @ORM\OneToMany(targetEntity="CustomCoverGalleryImage",mappedBy="customCover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $customCoverGalleryImages;
    /**
     * @var \CustomCoverGalleryTexts
     *
     * @ORM\OneToMany(targetEntity="CustomCoverGalleryText",mappedBy="customCover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $customCoverGalleryTexts;
    /**
     *
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone",inversedBy="customCovers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * })
     */
    private $phone;

    /**
     * @var string - phone slug mapped false field
     */
    private $phoneSlug;
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
     * @var \CustomCoverType
     *
     * @ORM\ManyToOne(targetEntity="CustomCoverType",inversedBy="customCovers" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_cover_type_id", referencedColumnName="id")
     * })
     */
    private $customCoverType;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $previewImage;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="pattern_image", type="text", nullable=true)
     */
    private $patternImage;

    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;

    /**
     * @var \User
     *
     * person - who creates cover with custom design
     *
     * @ORM\ManyToOne(targetEntity="User",inversedBy="customCovers" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user_id", referencedColumnName="id")
     * })
     */
    private $creator;

    /**
     * @var \OrderHasCovers
     *
     * @ORM\OneToMany(targetEntity="OrderHasCover",mappedBy="customCover",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $customCoverHasOrders;
    public function getImage(){
        return $this->previewImage;
    }
    public function setImage($image){
        $this->previewImage = $image;
        return $this;
    }
    /**
     * for capability with other covers
     */
    public function getFilterPrice(){
        return $this->getPrice();
    }
    public function __toString()
    {
        return $this->title ? $this->title : 'new';
    }
    public function getCoverTypeTitle()
    {
        return $this->customCoverType->getTitle();
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
    /**
     * Set price
     *
     * @param int $price
     *
     * @return CustomCover
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
        if(!$this->price){
            return
                round($this->getCustomCoverType()->getPrice());
        }
        return round($this->price);
    }

    /**
     * Set promoPrice
     *
     * @param int $promoPrice
     *
     * @return CustomCover
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

    public function setPhoneSlug($phoneSlug)
    {
        $this->phoneSlug = $phoneSlug;

        return $this;
    }
    public function getPhoneSlug()
    {
        return $this->phoneSlug;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return CustomCover
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * Set previewImage
     *
     * @param string $previewImage
     *
     * @return CustomCover
     */
    public function setPreviewImage($previewImage)
    {
        $this->previewImage = $previewImage;

        return $this;
    }

    /**
     * Get previewImage
     *
     * @return string
     */
    public function getPreviewImage()
    {
        return $this->previewImage;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CustomCover
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
     * @return CustomCover
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
     * Set customCoverType
     *
     * @param \ApiBundle\Entity\CustomCoverType $customCoverType
     *
     * @return CustomCover
     */
    public function setCustomCoverType(\ApiBundle\Entity\CustomCoverType $customCoverType = null)
    {
        $this->customCoverType = $customCoverType;

        return $this;
    }

    /**
     * Get customCoverType
     *
     * @return \ApiBundle\Entity\CustomCoverType
     */
    public function getCustomCoverType()
    {
        return $this->customCoverType;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return CustomCover
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
     * Add customCoverGalleryImage
     *
     * @param \ApiBundle\Entity\CustomCoverGalleryImage $customCoverGalleryImage
     *
     * @return CustomCover
     */
    public function addCustomCoverGalleryImage(\ApiBundle\Entity\CustomCoverGalleryImage $customCoverGalleryImage)
    {
        $customCoverGalleryImage->setCustomCover($this);
        $this->customCoverGalleryImages[] = $customCoverGalleryImage;

        return $this;
    }

    /**
     * Remove customCoverGalleryImage
     *
     * @param \ApiBundle\Entity\CustomCoverGalleryImage $customCoverGalleryImage
     */
    public function removeCustomCoverGalleryImage(\ApiBundle\Entity\CustomCoverGalleryImage $customCoverGalleryImage)
    {
        $this->customCoverGalleryImages->removeElement($customCoverGalleryImage);
    }

    /**
     * Get customCoverGalleryImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomCoverGalleryImages()
    {
        return $this->customCoverGalleryImages;
    }

    /**
     * Add customCoverGalleryText
     *
     * @param \ApiBundle\Entity\CustomCoverGalleryText $customCoverGalleryText
     *
     * @return CustomCover
     */
    public function addCustomCoverGalleryText(\ApiBundle\Entity\CustomCoverGalleryText $customCoverGalleryText)
    {
        $customCoverGalleryText->setCustomCover($this);
        $this->customCoverGalleryTexts[] = $customCoverGalleryText;

        return $this;
    }

    /**
     * Remove customCoverGalleryText
     *
     * @param \ApiBundle\Entity\CustomCoverGalleryText $customCoverGalleryText
     */
    public function removeCustomCoverGalleryText(\ApiBundle\Entity\CustomCoverGalleryText $customCoverGalleryText)
    {
        $this->customCoverGalleryTexts->removeElement($customCoverGalleryText);
    }

    /**
     * Get customCoverGalleryTexts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomCoverGalleryTexts()
    {
        return $this->customCoverGalleryTexts;
    }
    /**
     * Set creator
     *
     * @param \ApiBundle\Entity\User $creator
     *
     * @return CustomCover
     */
    public function setCreator(\ApiBundle\Entity\User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \ApiBundle\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Add customCoverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasCover $customCoverHasOrder
     *
     * @return CustomCover
     */
    public function addCustomCoverHasOrder(\ApiBundle\Entity\OrderHasCover $customCoverHasOrder)
    {
        $this->customCoverHasOrders[] = $customCoverHasOrder;

        return $this;
    }

    /**
     * Remove customCoverHasOrder
     *
     * @param \ApiBundle\Entity\OrderHasCover $customCoverHasOrder
     */
    public function removeCustomCoverHasOrder(\ApiBundle\Entity\OrderHasCover $customCoverHasOrder)
    {
        $this->customCoverHasOrders->removeElement($customCoverHasOrder);
    }

    /**
     * Get customCoverHasOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomCoverHasOrders()
    {
        return $this->customCoverHasOrders;
    }
    public function getClassName()
    {
        return "CustomCover";
    }
    public function orderTitle()
    {
        return "Свой дизайн:&nbsp;&nbsp;&nbsp;<label>".$this->getPhone()->getTitle()."</label>";
    }
    public function getOrderId(){
        return $this->getCustomCoverHasOrders()->first()->getId();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customCoverGalleryImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customCoverGalleryTexts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customCoverHasOrders = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set patternImage
     *
     * @param string $patternImage
     *
     * @return CustomCover
     */
    public function setPatternImage($patternImage)
    {
        $this->patternImage = $patternImage;

        return $this;
    }

    /**
     * Get patternImage
     *
     * @return string
     */
    public function getPatternImage()
    {
        return $this->patternImage;
    }
}
