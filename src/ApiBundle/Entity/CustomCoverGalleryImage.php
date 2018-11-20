<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomCoverGalleryImage
 *
 * @ORM\Table(name="custom_cover_gallery_image_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CustomCoverGalleryImageRepository")
 */
class CustomCoverGalleryImage
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
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;
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
     * @var int
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width;
    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;
    /**
     * @var string
     *
     * @ORM\Column(name="scale", type="string", length=255, nullable=true)
     */
    private $scale;
    /**
     * @var string
     *
     * @ORM\Column(name="filters", type="string", length=255, nullable=true)
     */
    private $filters;
    /**
     *
     * @ORM\Column(name="position", type="integer", length=3, nullable=true)
     */
    private $position;
    /**
     * @var \CustomCover
     *
     * @ORM\ManyToOne(targetEntity="CustomCover", inversedBy="customCoverGalleryImages")
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
     * Set image
     *
     * @param string $image
     *
     * @return CustomCoverGalleryImage
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
     * Set angle
     *
     * @param int $angle
     * @return CustomCoverGalleryImage
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
     * Set width
     *
     * @param int $width
     * @return CustomCoverGalleryImage
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param int $height
     * @return CustomCoverGalleryImage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
    /**
     * Set coordinates
     *
     * @param string $coordinates
     *
     * @return CustomCoverGalleryImage
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
     * @return CustomCoverGalleryImage
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
     * Set scale
     *
     * @param string $scale
     *
     * @return CustomCoverGalleryImage
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

    /**
     * Set filters
     *
     * @param string $filters
     *
     * @return CustomCoverGalleryImage
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * Get filters
     *
     * @return string
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return CustomCoverGalleryImage
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
}
