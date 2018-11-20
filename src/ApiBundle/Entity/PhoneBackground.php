<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 *
 * @ORM\Table(name="phone_backgrounds")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PhoneBackgroundRepository")
 */
class PhoneBackground
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
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;
    /**
     * @var string - mask image path
     *
     * @ORM\Column(name="image", type="text", nullable=false)
     */
    private $image;
    /**
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone" , inversedBy = "phoneBackgrounds")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * })
     */
    private $phone;
    /**
     * @var \TransparentImages
     *
     * @ORM\OneToMany(targetEntity="TransparentImage", mappedBy="phoneBackground", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $transparentImages;

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
     * @return PhoneBackground
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
     * Set image
     *
     * @param string $image
     *
     * @return PhoneBackground
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
     * Set phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return PhoneBackground
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
     * Constructor
     */
    public function __construct()
    {
        $this->transparentImages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transparentImage
     *
     * @param \ApiBundle\Entity\TransparentImage $transparentImage
     *
     * @return PhoneBackground
     */
    public function addTransparentImage(\ApiBundle\Entity\TransparentImage $transparentImage)
    {
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
     * Set color
     *
     * @param string $color
     *
     * @return PhoneBackground
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
}
