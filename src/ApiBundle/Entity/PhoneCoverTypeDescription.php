<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhoneCoverTypeDescription
 *
 * @ORM\Table(name="phone_cover_type_description_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PhoneCoverTypeDescriptionRepository")
 */
class PhoneCoverTypeDescription
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone",inversedBy="phoneCoverTypeDescriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * })
     */
    private $phone;
    /**
     * @var \CoverType
     *
     * @ORM\ManyToOne(targetEntity="CoverType",inversedBy="phoneCoverTypeDescriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_type_id", referencedColumnName="id")
     * })
     */
    private $coverType;

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
        return $this->id ? (string)$this->id : 'new';
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return PhoneCoverTypeDescription
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
     * Set phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return PhoneCoverTypeDescription
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
     * Set coverType
     *
     * @param \ApiBundle\Entity\CoverType $coverType
     *
     * @return PhoneCoverTypeDescription
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
}
