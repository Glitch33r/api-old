<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pattern
 *
 * @ORM\Table(name="pattern_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PatternRepository")
 */
class Pattern
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
     * @var string - original file image path
     *
     * @ORM\Column(name="file", type="text", nullable=false)
     */
    private $file;
    /**
     * @var string - tiff image path
     *
     * @ORM\Column(name="tiff", type="text", nullable=true)
     */
    private $tiff;
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;
    /**
     * @var string - description that is shown on a cover list page
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var float
     *
     * @ORM\Column(name="promo_coefficient", type="float", precision=10, scale=0, nullable=true)
     */
    private $promoCoef = 1;
    /**
     * @var string - WB image path for manufacturers
     *
     * @ORM\Column(name="manufacture_wb", type="text", nullable=true)
     */
    private $manufactureWB;
    /**
     * @var string - color image path for manufacturers
     *
     * @ORM\Column(name="manufactureC", type="text", nullable=true)
     */
    private $manufactureC;

    /**
     * @var string - background path
     *
     * @ORM\Column(name="background", type="text", nullable=true)
     */
    private $background;

    /**
     * @var string - cite path
     *
     * @ORM\Column(name="cite", type="text", nullable=true)
     */
    private $cite;

    /**
     * @var string - video path
     *
     * @ORM\Column(name="video", type="text", nullable=true)
     */
    private $video;
    /**
     * @var \Covers
     *
     * @ORM\OneToMany(targetEntity="Cover", mappedBy="pattern",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $covers;
    /**
     * @var string - alpha file image path for transparent cover
     *
     * @ORM\Column(name="alpha_image", type="text", nullable=true)
     */
    private $alphaImage;
    /**
     * @var string - semi-transparent file image path for transparent cover
     *
     * @ORM\Column(name="semi_transparent_image", type="text", nullable=true)
     */
    private $semiTransparentImage;

    /**
     * @var \PatternGalleryImages
     *
     * @ORM\OneToMany(targetEntity="PatternGalleryImage",mappedBy="pattern",cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $patternGalleryImages;

    /**
     * @var string - price of pattern
     *
     * @ORM\Column(name="price", type="string", nullable=true)
     */
    private $price;

    /**
     * @var string - used to sort covers
     *
     * @ORM\Column(name="priority", type="integer", nullable=true)
     */
    private $priority=1;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterMaterial", inversedBy="patterns")
     * @ORM\JoinTable(name="material_has_pattern",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterItemType", inversedBy="patterns")
     * @ORM\JoinTable(name="type_has_pattern",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterColor", inversedBy="patterns")
     * @ORM\JoinTable(name="color_has_pattern",
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
     * @ORM\ManyToMany(targetEntity="PatternTags", inversedBy="patterns")
     * @ORM\JoinTable(name="pattern_has_tags",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;
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
     * whether or not item available for customer
     *
     * @var boolean
     * @ORM\Column(name="is_for_black_cover", type="boolean", nullable=false)
     */
    private $isForBlackCover=false;

    /**
     * @return string
     */
    public function __toString(){
        return ($this->getTitle())?$this->getTitle():"Pattern";
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
     * Set file
     *
     * @param string $file
     *
     * @return Pattern
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set tiff
     *
     * @param string $tiff
     *
     * @return Pattern
     */
    public function setTiff($tiff)
    {
        $this->tiff = $tiff;

        return $this;
    }

    /**
     * Get tiff
     *
     * @return string
     */
    public function getTiff()
    {
        return $this->tiff;
    }

    /**
     * Set promoCoef
     *
     * @param float $promoCoef
     * @return Pattern
     */
    public function setPromoCoef($promoCoef)
    {
        $this->promoCoef = $promoCoef;

        return $this;
    }

    /**
     * Get promoCoef
     *
     * @return float
     */
    public function getPromoCoef()
    {
        return $this->promoCoef;
    }

    /**
     * Set manufactureWB
     *
     * @param string $manufactureWB
     *
     * @return Pattern
     */
    public function setManufactureWB($manufactureWB)
    {
        $this->manufactureWB = $manufactureWB;

        return $this;
    }

    /**
     * Get manufactureWB
     *
     * @return string
     */
    public function getManufactureWB()
    {
        return $this->manufactureWB;
    }

    /**
     * Set manufactureC
     *
     * @param string $manufactureC
     *
     * @return Pattern
     */
    public function setManufactureC($manufactureC)
    {
        $this->manufactureC = $manufactureC;

        return $this;
    }

    /**
     * Get manufactureC
     *
     * @return string
     */
    public function getManufactureC()
    {
        return $this->manufactureC;
    }

    /**
     * Set background
     *
     * @param string $background
     *
     * @return Pattern
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
     * Set price
     *
     * @param string $price
     *
     * @return Pattern
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return round($this->price);
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Pattern
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
     * Set cite
     *
     * @param string $bcite
     *
     * @return Pattern
     */
    public function setCite($cite)
    {
        $this->cite = $cite;

        return $this;
    }

    /**
     * Get cite
     *
     * @return string
     */
    public function getCite()
    {
        return $this->cite;
    }

    /**
     * Set alphaImage
     *
     * @param string $alphaImage
     *
     * @return Pattern
     */
    public function setAlphaImage($alphaImage)
    {
        $this->alphaImage = $alphaImage;

        return $this;
    }

    /**
     * Get alphaImage
     *
     * @return string
     */
    public function getAlphaImage()
    {
        return $this->alphaImage;
    }

    /**
     * Set semiTransparentImage
     *
     * @param string $semiTransparentImage
     *
     * @return Pattern
     */
    public function setSemiTransparentImage($semiTransparentImage)
    {
        $this->semiTransparentImage = $semiTransparentImage;

        return $this;
    }

    /**
     * Get semiTransparentImage
     *
     * @return string
     */
    public function getSemiTransparentImage()
    {
        return $this->semiTransparentImage;
    }
    /**
     * Set video
     *
     * @param string $video
     *
     * @return Pattern
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
     * Add tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     *
     * @return PatternTags
     */
    public function addTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $tag->addPattern($this);
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $tag->removePattern($this);
        return $this->tags->removeElement($tag);
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
     * Set covers collection
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $covers
     * @return Pattern
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
     * @return Pattern
     */
    public function addCover(\ApiBundle\Entity\Cover $cover)
    {
        $cover->setPattern($this);
        $this->covers[] = $cover;

        return $this;
    }

    /**
     * Remove cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     */
    public function removeCover(\ApiBundle\Entity\Cover $cover)
    {
        $this->covers->removeElement($cover);
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
     * Set title
     *
     * @param string $title
     *
     * @return Pattern
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
     * Set description
     *
     * @param string $description
     *
     * @return Pattern
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
     * Set color
     *
     * @param string $color
     *
     * @return Pattern
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add patternGalleryImage
     *
     * @param \ApiBundle\Entity\PatternGalleryImage $patternGalleryImage
     *
     * @return Pattern
     */
    public function addPatternGalleryImage(\ApiBundle\Entity\PatternGalleryImage $patternGalleryImage)
    {
        $patternGalleryImage->setPattern($this);
        $this->patternGalleryImages[] = $patternGalleryImage;

        return $this;
    }

    /**
     * Remove patternGalleryImage
     *
     * @param \ApiBundle\Entity\PatternGalleryImage $patternGalleryImage
     */
    public function removePatternGalleryImage(\ApiBundle\Entity\PatternGalleryImage $patternGalleryImage)
    {
        $this->patternGalleryImages->removeElement($patternGalleryImage);
    }

    /**
     * Get patternGalleryImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatternGalleryImages()
    {
        return $this->patternGalleryImages;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->covers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patternGalleryImages = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add material
     *
     * @param \ApiBundle\Entity\FilterMaterial $material
     *
     * @return Pattern
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
     * @return Pattern
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
     * @return Pattern
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
     * Set notAvailable
     *
     * @param boolean $notAvailable
     *
     * @return Pattern
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
     * @return Pattern
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
     * @return Pattern
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
     * @return bool
     */
    public function getIsForBlackCover()
    {
        return $this->isForBlackCover;
    }

    /**
     * @param bool $isForBlackCover
     */
    public function setIsForBlackCover($isForBlackCover)
    {
        $this->isForBlackCover = $isForBlackCover;
    }
}
