<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * NsCategory
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="ns_category_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\NsCategoryRepository")
 */
class NsCategory
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
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @var \NonStandartCovers
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\NonStandartCover", mappedBy="category", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $covers;
    /**
     * @Gedmo\Slug(fields={"title"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    /**
     * @var string - h1 content
     *
     * @ORM\Column(name="seo_title", type="text", nullable=true)
     */
    private $seoTitle;
    /**
     * @var string - text description in list
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string - long text description
     *
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    private $longDescription;
    /**
     * @var string - bottom seo text
     *
     * @ORM\Column(name="seo", type="text", nullable=true)
     */
    private $seoText;
    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=255, nullable=true)
     */
    private $metaTitle;

    /**
     * @var string - text meta description
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->covers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return NsCategory
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
     * Set slug
     *
     * @param string $slug
     *
     * @return NsCategory
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add cover
     *
     * @param \ApiBundle\Entity\NonStandartCover $cover
     *
     * @return NsCategory
     */
    public function addCover(\ApiBundle\Entity\NonStandartCover $cover)
    {
        $this->covers[] = $cover;

        return $this;
    }

    /**
     * Remove cover
     *
     * @param \ApiBundle\Entity\NonStandartCover $cover
     */
    public function removeCover(\ApiBundle\Entity\NonStandartCover $cover)
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
    public function setCovers($covers){
        $this->Covers = $covers;
        return $this;
    }

    /**
     * Set seoTitle
     *
     * @param string $seoTitle
     *
     * @return NsCategory
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
     * Set description
     *
     * @param string $description
     *
     * @return NsCategory
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
     * @return NsCategory
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
     * Set seoText
     *
     * @param string $seoText
     *
     * @return NsCategory
     */
    public function setSeoText($seoText)
    {
        $this->seoText = $seoText;

        return $this;
    }

    /**
     * Get seoText
     *
     * @return string
     */
    public function getSeoText()
    {
        return $this->seoText;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return NsCategory
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
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return NsCategory
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
}
