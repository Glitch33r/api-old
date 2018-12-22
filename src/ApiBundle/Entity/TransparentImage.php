<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 *
 * @ORM\Table(name="transparent_image_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\TransparentImageRepository")
 */
class TransparentImage
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
     * @var \Cover
     *
     * @ORM\ManyToOne(targetEntity="Cover", inversedBy="transparentImages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     * })
     */
    private $cover;
    /**
     * @var \Cover
     *
     * @ORM\ManyToOne(targetEntity="PhoneBackground", inversedBy="transparentImages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_background_id", referencedColumnName="id")
     * })
     */
    private $phoneBackground;
    /**
     * @var phoneBackground title
     */
    private $title;

    /**
     * @param phoneBackground $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function getTitle()
    {
        return $this->getPhoneBackground()->getTitle();
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
     * Set image
     *
     * @param string $image
     *
     * @return TransparentImage
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
     * Set cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return TransparentImage
     */
    public function setCover(\ApiBundle\Entity\Cover $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \ApiBundle\Entity\Cover
     */
    public function getCover()
    {
        return $this->cover;
    }


    /**
     * Set phoneBackground
     *
     * @param \ApiBundle\Entity\PhoneBackground $phoneBackground
     *
     * @return TransparentImage
     */
    public function setPhoneBackground(\ApiBundle\Entity\PhoneBackground $phoneBackground = null)
    {
        $this->phoneBackground = $phoneBackground;

        return $this;
    }

    /**
     * Get phoneBackground
     *
     * @return \ApiBundle\Entity\PhoneBackground
     */
    public function getPhoneBackground()
    {
        return $this->phoneBackground;
    }
}
