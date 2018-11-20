<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * HotSeller
 *
 * @ORM\Table(name="hot_seller_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\HotSellerRepository")
 */
class HotSeller
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
     * @ORM\Column(name="linkname_field", type="string", length=255, nullable=true)
     */
    private $linkname;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="Cover", mappedBy="hotSellers")
     */
    private $covers;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="NonStandartCover", mappedBy="hotSellers",indexBy="id")
     */
    private $nonStandartCovers;
    public $patternFilter;
    public $phonesFilter;
    public $typeFilter;
    public function __toString()
    {
        return ($this->title)?'Чехлы : '.$this->title:"Процесс создания";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->covers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nonStandartCovers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return HotSeller
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
     * Set linkname
     *
     * @param string $linkname
     *
     * @return HotSeller
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;

        return $this;
    }

    /**
     * Get linkname
     *
     * @return string
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * Add cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return HotSeller
     */
    public function addCover(\ApiBundle\Entity\Cover $cover)
    {
        $cover->addHotSeller($this);
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
        $cover->removeHotSeller($this);
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
     * Add nonStandartCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nonStandartCover
     *
     * @return HotSeller
     */
    public function addNonStandartCover(\ApiBundle\Entity\NonStandartCover $nonStandartCover)
    {
        $nonStandartCover->addHotSeller($this);
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
        $nonStandartCover->removeHotSeller($this);
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
    public function setCovers($covers){
        $this->covers = $covers;
        return $this;
    }
    public function setNonStandartCovers($covers){
        $this->nonStandartCovers = $covers;
        return $this;
    }
}
