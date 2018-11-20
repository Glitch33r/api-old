<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Phone
 *
 * @ORM\Table(name="phone_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PhoneRepository")
 */
class Phone
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
     * @ORM\Column(name="meta_title", type="string", length=255, nullable=true)
     */
    private $metaTitle;
    /**
     * @var string - text meta description to phone model
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

    /**
     * @var string - image that is shown on phone page
     *
     * @ORM\Column(name="static_text_image", type="text", nullable=true)
     */
    private $staticTextImage;
    /**
     * @var \ApiBundle\Entity\PhoneBackground - gallery of colored phones
     *
     * @ORM\OneToMany(targetEntity="PhoneBackground", mappedBy="phone", cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $phoneBackgrounds;
    /**
     * @var string - mask image path
     *
     * @ORM\Column(name="mask", type="text", nullable=true)
     */
    private $mask;
    /**
     * @var string - shadows image path
     *
     * @ORM\Column(name="shadows",type="text",nullable=true)
     */
    private $shadows;

    /**
     * @var string - shadows image path
     *
     * @ORM\Column(name="constructor_image",type="text",nullable=true)
     */
    private $constructorImage;
    /**
     * @var string - overlay of frontend constructor phone
     *
     * @ORM\Column(name="constructor_overlay",type="text",nullable=true)
     */
    private $constructorOverlay;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="seo_title", type="text", nullable=true)
     */
    private $seoTitle;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

//    /**
//     * @var string - condition show constructor in html sitemap
//     *
//     * @ORM\Column(name="show_constructor_in_html_sitemap", type="boolean", options={"default": true})
//     */
//    private $showConstructorInHTMLSitemap = 1;

//    /**
//     * @var string - condition show in html sitemap
//     *
//     * @ORM\Column(name="show_glass_in_html_sitemap", type="boolean", options={"default": true})
//     */
//    private $showGlassInHTMLSitemap = 1;

    /**
     * @var string - text long description to phone model
     *
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    private $longDescription;
    /**
     * @var string - text seo to phone model
     *
     * @ORM\Column(name="seo", type="text", nullable=true)
     */
    private $seo;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="sub_seo_title", type="text", nullable=true)
     */
    private $subSeoTitle;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="sub_description", type="text", nullable=true)
     */
    private $subDescription;

    /**
     * @var string - text long description to phone model
     *
     * @ORM\Column(name="sub_long_description", type="text", nullable=true)
     */
    private $subLongDescription;
    /**
     * @var string - text seo to phone model
     *
     * @ORM\Column(name="sub_seo", type="text", nullable=true)
     */
    private $subSeo;
    /**
     * @var string
     *
     * @ORM\Column(name="image_cover_meta_title", type="string", length=255, nullable=true)
     */
    private $imageCoverMetaTitle;

    /**
     * @var string - text meta description to phone model
     *
     * @ORM\Column(name="image_cover_meta_description", type="text", nullable=true)
     */
    private $imageCoverMetaDescription;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="glass_seo_title", type="text", nullable=true)
     */
    private $glassSeoTitle;
    /**
     * @var string - text description to phone model
     *
     * @ORM\Column(name="glass_description", type="text", nullable=true)
     */
    private $glassDescription;

    /**
     * @var string - text long description to phone model
     *
     * @ORM\Column(name="glass_long_description", type="text", nullable=true)
     */
    private $glassLongDescription;
    /**
     * @var string - text seo to phone model
     *
     * @ORM\Column(name="glass_seo", type="text", nullable=true)
     */
    private $glassTextSeo;
    /**
     * @var string
     *
     * @ORM\Column(name="glass_meta_title", type="string", length=255, nullable=true)
     */
    private $glassMetaTitle;

    /**
     * @var string - text meta description to phone model
     *
     * @ORM\Column(name="glass_meta_description", type="text", nullable=true)
     */
    private $glassMetaDescription;
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;
    /**
     * @var int
     *
     * @ORM\Column(name="typo_width", type="string",length=30, nullable=true)
     */
    private $typoWidth;
    /**
     * @var int
     *
     * @ORM\Column(name="typo_height", type="string",length=30, nullable=true)
     */
    private $typoHeight;
    /**
     * @var \ApiBundle\Entity\Cover
     *
     * @ORM\OneToMany(targetEntity="Cover", mappedBy="phone", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $covers;
    /**
     * @var \ApiBundle\Entity\CustomCover
     *
     * @ORM\OneToMany(targetEntity="CustomCover", mappedBy="phone", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $customCovers;
    /**
     * @var \ApiBundle\Entity\Vendor
     *
     * @ORM\ManyToOne(targetEntity="Vendor",inversedBy="phones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;
    /**
     * @var \ApiBundle\Entity\PhoneCoverTypeDescription
     *
     * @ORM\OneToMany(targetEntity="PhoneCoverTypeDescription", mappedBy="phone", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $phoneCoverTypeDescriptions;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string - used to sort covers
     *
     * @ORM\Column(name="priority", type="float", nullable=true)
     */
    private $priority;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="NonStandartCover", mappedBy="phones")
     */
    private $nonStandartCovers;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="phones")
     */
    private $products;
    /**
     * @var \ApiBundle\Entity\OrderHasProduct
     *
     * @ORM\OneToMany(targetEntity="OrderHasProduct",mappedBy="phone")
     */
    private $phoneHasProductOrders;
    /**
     * @var \ApiBundle\Entity\OrderHasNonStandartCover
     *
     * @ORM\OneToMany(targetEntity="OrderHasNonStandartCover",mappedBy="phone")
     */
    private $phoneHasNsOrders;

    /**
     *
     * @var boolean
     * @ORM\Column(name="use_for_black_cover", type="boolean", nullable=false)
     */
    private $useForBlackCover = true;

    public  function __toString()
    {
        return $this->title ? $this->title : 'new';
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
     * Set title
     *
     * @param string $title
     *
     * @return Phone
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
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return Phone
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set priority
     *
     * @param float $priority
     *
     * @return Phone
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return float
     */
    public function getPriority()
    {
        return $this->priority;
    }
    /**
     * Set mask
     *
     * @param string $mask
     *
     * @return Phone
     */
    public function setMask($mask)
    {
        $this->mask = $mask;

        return $this;
    }

    /**
     * Get mask
     *
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set staticTextImage
     *
     * @param string $staticTextImage
     *
     * @return Phone
     */
    public function setStaticTextImage($staticTextImage)
    {
        $this->staticTextImage = $staticTextImage;

        return $this;
    }

    /**
     * Get staticTextImage
     *
     * @return string
     */
    public function getStaticTextImage()
    {
        return $this->staticTextImage;
    }

    /**
     * Set shadows
     *
     * @param string $shadows
     *
     * @return Phone
     */
    public function setShadows($shadows)
    {
        $this->shadows = $shadows;

        return $this;
    }

    /**
     * Get shadows
     *
     * @return string
     */
    public function getShadows()
    {
        return $this->shadows;
    }

    /**
     * Set constructorImage
     *
     * @param string $constructorImage
     *
     * @return Phone
     */
    public function setConstructorImage($constructorImage)
    {
        $this->constructorImage = $constructorImage;

        return $this;
    }

    /**
     * Get constructorImage
     *
     * @return string
     */
    public function getConstructorImage()
    {
        return $this->constructorImage;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Phone
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

    /**
     * Set longDescription
     *
     * @param string $longDescription
     *
     * @return Phone
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }


    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return Phone
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set seo
     *
     * @param string $seo
     *
     * @return Phone
     */
    public function setSeo($seo)
    {
        $this->seo = $seo;

        return $this;
    }

    /**
     * Get seo
     *
     * @return string
     */
    public function getSeo()
    {
        return $this->seo;
    }

    /**
     * Set price
     *
     * @param int $price
     * @return Phone
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
     * Set covers collection
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $covers
     * @return Phone
     */
    public function setCovers(\Doctrine\Common\Collections\ArrayCollection $covers)
    {
        $this->covers=$covers;
        return $this;
    }
    /**
     * Add cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return Phone
     */
    public function addCover(\ApiBundle\Entity\Cover $cover)
    {
        $cover->setPhone($this);
        $this->covers[] = $cover;

        return $this;
    }

    /**
     * Remove cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCover(\ApiBundle\Entity\Cover $cover)
    {
        return $this->covers->removeElement($cover);
    }

    /**
     * Get covers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCovers()
    {
        return $this->covers;
    }

    /**
     * Add customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return Phone
     */
    public function addCustomCover(\ApiBundle\Entity\CustomCover $customCover)
    {
        $customCover->setPhone($this);
        $this->customCovers[] = $customCover;

        return $this;
    }

    /**
     * Remove customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCustomCover(\ApiBundle\Entity\CustomCover $customCover)
    {
        return $this->customCovers->removeElement($customCover);
    }

    /**
     * Get customCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomCovers()
    {
        return $this->customCovers;
    }

    /**
     * Set vendor
     *
     * @param \ApiBundle\Entity\Vendor $vendor
     *
     * @return Phone
     */
    public function setVendor(\ApiBundle\Entity\Vendor $vendor = null)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Get vendor
     *
     * @return \ApiBundle\Entity\Vendor
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Add phoneBackground
     *
     * @param \ApiBundle\Entity\PhoneBackground $phoneBackground
     *
     * @return Phone
     */
    public function addPhoneBackground(\ApiBundle\Entity\PhoneBackground $phoneBackground)
    {
        $phoneBackground->setPhone($this);
        $this->phoneBackgrounds[] = $phoneBackground;

        return $this;
    }

    /**
     * Remove phoneBackground
     *
     * @param \ApiBundle\Entity\PhoneBackground $phoneBackground
     */
    public function removePhoneBackground(\ApiBundle\Entity\PhoneBackground $phoneBackground)
    {
        $this->phoneBackgrounds->removeElement($phoneBackground);
    }

    /**
     * Get phoneBackgrounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhoneBackgrounds()
    {
        return $this->phoneBackgrounds;
    }

    /**
     * Add phoneCoverTypeDescription
     *
     * @param \ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription
     *
     * @return Phone
     */
    public function addPhoneCoverTypeDescription(\ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription)
    {
        $phoneCoverTypeDescription->setPhone($this);
        $this->phoneCoverTypeDescriptions[] = $phoneCoverTypeDescription;

        return $this;
    }

    /**
     * Remove phoneCoverTypeDescription
     *
     * @param \ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription
     */
    public function removePhoneCoverTypeDescription(\ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription)
    {
        $this->phoneCoverTypeDescriptions->removeElement($phoneCoverTypeDescription);
    }

    /**
     * Get phoneCoverTypeDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhoneCoverTypeDescriptions()
    {
        return $this->phoneCoverTypeDescriptions;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phoneBackgrounds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->covers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customCovers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phoneCoverTypeDescriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set typoWidth
     *
     * @param string $typoWidth
     *
     * @return Phone
     */
    public function setTypoWidth($typoWidth)
    {
        $this->typoWidth = $typoWidth;

        return $this;
    }

    /**
     * Get typoWidth
     *
     * @return string
     */
    public function getTypoWidth()
    {
        return $this->typoWidth;
    }

    /**
     * Set typoHeight
     *
     * @param string $typoHeight
     *
     * @return Phone
     */
    public function setTypoHeight($typoHeight)
    {
        $this->typoHeight = $typoHeight;

        return $this;
    }

    /**
     * Get typoHeight
     *
     * @return string
     */
    public function getTypoHeight()
    {
        return $this->typoHeight;
    }

    /**
     * Add nonStandartCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nonStandartCover
     *
     * @return Phone
     */
    public function addNonStandartCover(\ApiBundle\Entity\NonStandartCover $nonStandartCover)
    {
        $this->nonStandartCovers[] = $nonStandartCover;

        return $this;
    }

    /**
     * Remove nonStandartCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nonStandartCover
     */
    public function removeNonStandartCover(\ApiBundle\Entity\NonStandartCover $nonStandartCover)
    {
        $this->nonStandartCovers->removeElement($nonStandartCover);
    }

    /**
     * Get nonStandartCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNonStandartCovers()
    {
        return $this->nonStandartCovers;
    }

    /**
     * Add product
     *
     * @param \ApiBundle\Entity\Product $product
     *
     * @return Phone
     */
    public function addProduct(\ApiBundle\Entity\Product $product)
    {
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
        $this->products->removeElement($product);
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

    /**
     * Set constructorOverlay
     *
     * @param string $constructorOverlay
     *
     * @return Phone
     */
    public function setConstructorOverlay($constructorOverlay)
    {
        $this->constructorOverlay = $constructorOverlay;

        return $this;
    }

    /**
     * Get constructorOverlay
     *
     * @return string
     */
    public function getConstructorOverlay()
    {
        return $this->constructorOverlay;
    }

    /**
     * Set subDescription
     *
     * @param string $subDescription
     *
     * @return Phone
     */
    public function setSubDescription($subDescription)
    {
        $this->subDescription = $subDescription;

        return $this;
    }

    /**
     * Get subDescription
     *
     * @return string
     */
    public function getSubDescription()
    {
        return $this->subDescription;
    }

    /**
     * Set subLongDescription
     *
     * @param string $subLongDescription
     *
     * @return Phone
     */
    public function setSubLongDescription($subLongDescription)
    {
        $this->subLongDescription = $subLongDescription;

        return $this;
    }

    /**
     * Get subLongDescription
     *
     * @return string
     */
    public function getSubLongDescription()
    {
        return $this->subLongDescription;
    }

    /**
     * Set subSeo
     *
     * @param string $subSeo
     *
     * @return Phone
     */
    public function setSubSeo($subSeo)
    {
        $this->subSeo = $subSeo;

        return $this;
    }

    /**
     * Get subSeo
     *
     * @return string
     */
    public function getSubSeo()
    {
        return $this->subSeo;
    }

    /**
     * Set seoTitle
     *
     * @param string $seoTitle
     *
     * @return Phone
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    /**
     * Get seoTitle
     *
     * @return string
     */
    public function getSeoTitle()
    {
        return $this->seoTitle;
    }

    /**
     * Set subSeoTitle
     *
     * @param string $subSeoTitle
     *
     * @return Phone
     */
    public function setSubSeoTitle($subSeoTitle)
    {
        $this->subSeoTitle = $subSeoTitle;

        return $this;
    }

    /**
     * Get subSeoTitle
     *
     * @return string
     */
    public function getSubSeoTitle()
    {
        return $this->subSeoTitle;
    }

    /**
     * Set imageCoverMetaTitle
     *
     * @param string $imageCoverMetaTitle
     *
     * @return Phone
     */
    public function setImageCoverMetaTitle($imageCoverMetaTitle)
    {
        $this->imageCoverMetaTitle = $imageCoverMetaTitle;

        return $this;
    }

    /**
     * Get imageCoverMetaTitle
     *
     * @return string
     */
    public function getImageCoverMetaTitle()
    {
        return $this->imageCoverMetaTitle;
    }

    /**
     * Set imageCoverMetaDescription
     *
     * @param string $imageCoverMetaDescription
     *
     * @return Phone
     */
    public function setImageCoverMetaDescription($imageCoverMetaDescription)
    {
        $this->imageCoverMetaDescription = $imageCoverMetaDescription;

        return $this;
    }

    /**
     * Get imageCoverMetaDescription
     *
     * @return string
     */
    public function getImageCoverMetaDescription()
    {
        return $this->imageCoverMetaDescription;
    }

    /**
     * Set glassSeoTitle
     *
     * @param string $glassSeoTitle
     *
     * @return Phone
     */
    public function setGlassSeoTitle($glassSeoTitle)
    {
        $this->glassSeoTitle = $glassSeoTitle;

        return $this;
    }

    /**
     * Get glassSeoTitle
     *
     * @return string
     */
    public function getGlassSeoTitle()
    {
        return $this->glassSeoTitle;
    }

    /**
     * Set glassDescription
     *
     * @param string $glassDescription
     *
     * @return Phone
     */
    public function setGlassDescription($glassDescription)
    {
        $this->glassDescription = $glassDescription;

        return $this;
    }

    /**
     * Get glassDescription
     *
     * @return string
     */
    public function getGlassDescription()
    {
        return $this->glassDescription;
    }

    /**
     * Set glassLongDescription
     *
     * @param string $glassLongDescription
     *
     * @return Phone
     */
    public function setGlassLongDescription($glassLongDescription)
    {
        $this->glassLongDescription = $glassLongDescription;

        return $this;
    }

    /**
     * Get glassLongDescription
     *
     * @return string
     */
    public function getGlassLongDescription()
    {
        return $this->glassLongDescription;
    }

    /**
     * Set glassTextSeo
     *
     * @param string $glassTextSeo
     *
     * @return Phone
     */
    public function setGlassTextSeo($glassTextSeo)
    {
        $this->glassTextSeo = $glassTextSeo;

        return $this;
    }

    /**
     * Get glassTextSeo
     *
     * @return string
     */
    public function getGlassTextSeo()
    {
        return $this->glassTextSeo;
    }

    /**
     * Set glassMetaTitle
     *
     * @param string $glassMetaTitle
     *
     * @return Phone
     */
    public function setGlassMetaTitle($glassMetaTitle)
    {
        $this->glassMetaTitle = $glassMetaTitle;

        return $this;
    }

    /**
     * Get glassMetaTitle
     *
     * @return string
     */
    public function getGlassMetaTitle()
    {
        return $this->glassMetaTitle;
    }

    /**
     * Set glassMetaDescription
     *
     * @param string $glassMetaDescription
     *
     * @return Phone
     */
    public function setGlassMetaDescription($glassMetaDescription)
    {
        $this->glassMetaDescription = $glassMetaDescription;

        return $this;
    }

    /**
     * Get glassMetaDescription
     *
     * @return string
     */
    public function getGlassMetaDescription()
    {
        return $this->glassMetaDescription;
    }

    /**
     * Add phoneHasProductOrder
     *
     * @param \ApiBundle\Entity\OrderHasProduct $phoneHasProductOrder
     *
     * @return Phone
     */
    public function addPhoneHasProductOrder(\ApiBundle\Entity\OrderHasProduct $phoneHasProductOrder)
    {
        $this->phoneHasProductOrders[] = $phoneHasProductOrder;

        return $this;
    }

    /**
     * Remove phoneHasProductOrder
     *
     * @param \ApiBundle\Entity\OrderHasProduct $phoneHasProductOrder
     */
    public function removePhoneHasProductOrder(\ApiBundle\Entity\OrderHasProduct $phoneHasProductOrder)
    {
        $this->phoneHasProductOrders->removeElement($phoneHasProductOrder);
    }

    /**
     * Get phoneHasProductOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhoneHasProductOrders()
    {
        return $this->phoneHasProductOrders;
    }

    /**
     * Add phoneHasNsOrder
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $phoneHasNsOrder
     *
     * @return Phone
     */
    public function addPhoneHasNsOrder(\ApiBundle\Entity\OrderHasNonStandartCover $phoneHasNsOrder)
    {
        $this->phoneHasNsOrders[] = $phoneHasNsOrder;

        return $this;
    }

    /**
     * Remove phoneHasNsOrder
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $phoneHasNsOrder
     */
    public function removePhoneHasNsOrder(\ApiBundle\Entity\OrderHasNonStandartCover $phoneHasNsOrder)
    {
        $this->phoneHasNsOrders->removeElement($phoneHasNsOrder);
    }

    /**
     * Get phoneHasNsOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhoneHasNsOrders()
    {
        return $this->phoneHasNsOrders;
    }

    /**
     * @return bool
     */
    public function getUseForBlackCover()
    {
        return $this->useForBlackCover;
    }

    /**
     * @param bool $useForBlackCover
     */
    public function setUseForBlackCover($useForBlackCover)
    {
        $this->useForBlackCover = $useForBlackCover;
    }

//    /**
//     * @return string
//     */
//    public function getShowConstructorInHTMLSitemap()
//    {
//        return $this->showConstructorInHTMLSitemap;
//    }
//
//    /**
//     * @param string $showConstructorInHTMLSitemap
//     */
//    public function setShowConstructorInHTMLSitemap($showConstructorInHTMLSitemap)
//    {
//        $this->showConstructorInHTMLSitemap = $showConstructorInHTMLSitemap;
//    }
//
//    /**
//     * @return string
//     */
//    public function getShowGlassInHTMLSitemap()
//    {
//        return $this->showGlassInHTMLSitemap;
//    }
//
//    /**
//     * @param string $showGlassInHTMLSitemap
//     */
//    public function setShowGlassInHTMLSitemap($showGlassInHTMLSitemap)
//    {
//        $this->showGlassInHTMLSitemap = $showGlassInHTMLSitemap;
//    }
}
