<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomCoverGalleryText
 *
 * @ORM\Table(name="custom_cover_gallery_text_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CustomCoverGalleryTextRepository")
 */
class CustomCoverGalleryText
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
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="font_family", type="string", length=255, nullable=true)
     */
    private $fontFamily;
    /**
     * @var int
     *
     * @ORM\Column(name="font_size", type="integer", nullable=true)
     */
    private $fontSize;
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;
    /**
     * @var string
     *
     * @ORM\Column(name="coordinates", type="string", length=255, nullable=true)
     */
    private $coordinates;
    /**
     * @var int
     *
     * @ORM\Column(name="angle", type="integer", nullable=true)
     */
    private $angle;
    /**
     * @var string
     *
     * @ORM\Column(name="font_weight", type="string", length=255, nullable=true)
     */
    private $fontWeight;
    /**
     * @var string
     *
     * @ORM\Column(name="font_style", type="string", length=255, nullable=true)
     */
    private $fontStyle;
    /**
     * @var string
     *
     * @ORM\Column(name="underline", type="boolean", nullable=true)
     */
    private $underline;
    /**
     * @var string
     *
     * @ORM\Column(name="overline", type="boolean", nullable=true)
     */
    private $overline;
    /**
     * @var string
     *
     * @ORM\Column(name="linethrough", type="boolean", nullable=true)
     */
    private $linethrough;
    /**
     * @var string
     *
     * @ORM\Column(name="lineheight", type="float", nullable=true)
     */
    private $lineHeight;
    /**
     * @var string
     *
     * @ORM\Column(name="width", type="float", nullable=true)
     */
    private $width;
    /**
     * @var string
     *
     * @ORM\Column(name="height", type="float", nullable=true)
     */
    private $height;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;
    /**
     * @var string
     *
     * @ORM\Column(name="scale", type="text", nullable=true)
     */
    private $scale;
    /**
     * @var string
     *
     * @ORM\Column(name="position", type="integer",length = 3)
     */
    private $position;
    /**
     * @var \CustomCover
     *
     * @ORM\ManyToOne(targetEntity="CustomCover", inversedBy="customCoverGalleryTexts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_cover_id", referencedColumnName="id")
     * })
     */
    private $customCover;

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
     * Set text
     *
     * @param string $text
     *
     * @return CustomCoverGalleryText
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
     * Set fontSize
     *
     * @param int $fontSize
     * @return CustomCoverGalleryText
     */
    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * Get fontSize
     *
     * @return int
     */
    public function getFontSize()
    {
        return $this->fontSize;
    }

    /**
     * Set fontFamily
     *
     * @param string $fontFamily
     *
     * @return CustomCoverGalleryText
     */
    public function setFontFamily($fontFamily)
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    /**
     * Get fontFamily
     *
     * @return string
     */
    public function getFontFamily()
    {
        return $this->fontFamily;
    }

    /**
     * Set angle
     *
     * @param int $angle
     * @return CustomCoverGalleryText
     */
    public function setAngle($angle)
    {
        $this->angle = $angle;

        return $this;
    }

    /**
     * Get angle
     *
     * @return int
     */
    public function getAngle()
    {
        return $this->angle;
    }
    /**
     * Set color
     *
     * @param string $color
     *
     * @return CustomCoverGalleryText
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
     * Set coordinates
     *
     * @param string $coordinates
     *
     * @return CustomCoverGalleryText
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return string
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return CustomCoverGalleryText
     */
    public function setCustomCover(\ApiBundle\Entity\CustomCover $customCover = null)
    {
        $this->customCover = $customCover;

        return $this;
    }

    /**
     * Get customCover
     *
     * @return \ApiBundle\Entity\CustomCover
     */
    public function getCustomCover()
    {
        return $this->customCover;
    }

    /**
     * Set fontWeight
     *
     * @param string $fontWeight
     *
     * @return CustomCoverGalleryText
     */
    public function setFontWeight($fontWeight)
    {
        $this->fontWeight = $fontWeight;

        return $this;
    }

    /**
     * Get fontWeight
     *
     * @return string
     */
    public function getFontWeight()
    {
        return $this->fontWeight;
    }

    /**
     * Set fontStyle
     *
     * @param string $fontStyle
     *
     * @return CustomCoverGalleryText
     */
    public function setFontStyle($fontStyle)
    {
        $this->fontStyle = $fontStyle;

        return $this;
    }

    /**
     * Get fontStyle
     *
     * @return string
     */
    public function getFontStyle()
    {
        return $this->fontStyle;
    }

    /**
     * Set underline
     *
     * @param boolean $underline
     *
     * @return CustomCoverGalleryText
     */
    public function setUnderline($underline)
    {
        $this->underline = $underline;

        return $this;
    }

    /**
     * Get underline
     *
     * @return boolean
     */
    public function getUnderline()
    {
        return $this->underline;
    }

    /**
     * Set overline
     *
     * @param boolean $overline
     *
     * @return CustomCoverGalleryText
     */
    public function setOverline($overline)
    {
        $this->overline = $overline;

        return $this;
    }

    /**
     * Get overline
     *
     * @return boolean
     */
    public function getOverline()
    {
        return $this->overline;
    }

    /**
     * Set linethrough
     *
     * @param boolean $linethrough
     *
     * @return CustomCoverGalleryText
     */
    public function setLinethrough($linethrough)
    {
        $this->linethrough = $linethrough;

        return $this;
    }

    /**
     * Get linethrough
     *
     * @return boolean
     */
    public function getLinethrough()
    {
        return $this->linethrough;
    }

    /**
     * Set lineHeight
     *
     * @param float $lineHeight
     *
     * @return CustomCoverGalleryText
     */
    public function setLineHeight($lineHeight)
    {
        $this->lineHeight = $lineHeight;

        return $this;
    }

    /**
     * Get lineHeight
     *
     * @return float
     */
    public function getLineHeight()
    {
        return $this->lineHeight;
    }

    /**
     * Set width
     *
     * @param float $width
     *
     * @return CustomCoverGalleryText
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return CustomCoverGalleryText
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return CustomCoverGalleryText
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
     * Set position
     *
     * @param integer $position
     *
     * @return CustomCoverGalleryText
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set scale
     *
     * @param string $scale
     *
     * @return CustomCoverGalleryText
     */
    public function setScale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return string
     */
    public function getScale()
    {
        return $this->scale;
    }
}
