<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoverType
 *
 * @ORM\Table(name="cover_type_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CoverTypeRepository")
 */
class CoverType
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
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    private $title;
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var \Covers
     *
     * @ORM\OneToMany(targetEntity="Cover", mappedBy="coverType",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $covers;
    /**
     * @var string
     *
     * @ORM\Column(name="linkname", type="text", nullable=false)
     */
    private $linkName;
    /**
     * @var \PhoneCoverTypeDescriptions
     *
     * @ORM\OneToMany(targetEntity="PhoneCoverTypeDescription", mappedBy="coverType", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $phoneCoverTypeDescriptions;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public  function __toString()
    {
        return $this->title ? $this->title : 'new';
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return CoverType
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
     * @param int $price
     * @return CoverType
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
        return round($this->price);
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return CoverType
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
     * Add cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return CoverType
     */
    public function addCover(\ApiBundle\Entity\Cover $cover)
    {
        $cover->setCoverType($this);
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
     * Set linkName
     *
     * @param string $linkName
     *
     * @return CoverType
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * Get linkName
     *
     * @return string
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

    /**
     * Add phoneCoverTypeDescription
     *
     * @param \ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription
     *
     * @return CoverType
     */
    public function addPhoneCoverTypeDescription(\ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription)
    {
        $phoneCoverTypeDescription->setCoverType($this);
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
        $this->covers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phoneCoverTypeDescriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
