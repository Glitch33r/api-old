<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomCoverType
 *
 * @ORM\Table(name="custom_cover_type_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CustomCoverTypeRepository")
 */
class CustomCoverType
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
     * @var \CustomCovers
     *
     * @ORM\OneToMany(targetEntity="CustomCover", mappedBy="customCoverType",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $customCovers;
    /**
     * @var string
     *
     * @ORM\Column(name="linkname", type="text", nullable=false)
     */
    private $linkName;
//    /**
//     * @var \PhoneCoverTypeDescriptions
//     *
//     * @ORM\OneToMany(targetEntity="PhoneCoverTypeDescription", mappedBy="coverType", cascade={"persist","remove"}, orphanRemoval=true)
//     *
//     */
//    private $phoneCoverTypeDescriptions;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customCovers = new \Doctrine\Common\Collections\ArrayCollection();
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
    public  function __toString()
    {
        return $this->getTitle();
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return CustomCoverType
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
     * @return CustomCoverType
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
     * @return CustomCoverType
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
     * Add customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return CustomCoverType
     */
    public function addCustomCover(\ApiBundle\Entity\CustomCover $customCover)
    {
        $customCover->setCustomCoverType($this);
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
     * Set linkName
     *
     * @param string $linkName
     *
     * @return CustomCoverType
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

//    /**
//     * Add phoneCoverTypeDescription
//     *
//     * @param \ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription
//     *
//     * @return CoverType
//     */
//    public function addPhoneCoverTypeDescription(\ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription)
//    {
//        $phoneCoverTypeDescription->setCoverType($this);
//        $this->phoneCoverTypeDescriptions[] = $phoneCoverTypeDescription;
//
//        return $this;
//    }
//
//    /**
//     * Remove phoneCoverTypeDescription
//     *
//     * @param \ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription
//     */
//    public function removePhoneCoverTypeDescription(\ApiBundle\Entity\PhoneCoverTypeDescription $phoneCoverTypeDescription)
//    {
//        $this->phoneCoverTypeDescriptions->removeElement($phoneCoverTypeDescription);
//    }
//
//    /**
//     * Get phoneCoverTypeDescriptions
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getPhoneCoverTypeDescriptions()
//    {
//        return $this->phoneCoverTypeDescriptions;
//    }
}
