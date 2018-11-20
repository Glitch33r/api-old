<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Phone
 *
 * @ORM\Table(name="pattern_tags_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PatternTagsRepository")
 */
class PatternTags
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\NonStandartCover", mappedBy="tags")
     */
    private $nsCovers;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Product", mappedBy="tags")
     */
    private $products;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterConfig", mappedBy="tags")
     */
    private $filterConfigs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pattern", mappedBy="tags")
     */
    private $patterns;

    public  function __toString()
    {
        return $this->getTitle();
    }
    public function getSlug()
    {
        return $this->slug;
    }


    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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
     * Set title
     *
     * @param string $title
     *
     * @return Phone
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
     * Add Pattern
     *
     * @param \ApiBundle\Entity\Pattern $pattern
     *
     * @return Pattern
     */
    public function addPattern(\ApiBundle\Entity\Pattern $pattern)
    {
        $this->patterns[] = $pattern;

        return $this;
    }

    /**
     * Remove Pattern
     *
     * @param \ApiBundle\Entity\Pattern $pattern
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePattern(\ApiBundle\Entity\Pattern $pattern)
    {
        return $this->patterns->removeElement($pattern);
    }

    /**
     * Get Patterns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatterns()
    {
        return $this->patterns;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patterns = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add nsCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nsCover
     *
     * @return PatternTags
     */
    public function addNsCover(\ApiBundle\Entity\NonStandartCover $nsCover)
    {
        $this->nsCovers[] = $nsCover;

        return $this;
    }

    /**
     * Remove nsCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nsCover
     */
    public function removeNsCover(\ApiBundle\Entity\NonStandartCover $nsCover)
    {
        $this->nsCovers->removeElement($nsCover);
    }

    /**
     * Get nsCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNsCovers()
    {
        return $this->nsCovers;
    }

    /**
     * Add product
     *
     * @param \ApiBundle\Entity\Product $product
     *
     * @return PatternTags
     */
    public function addProduct(\ApiBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \ApiBundle\Entity\Product $product
     */
    public function removeProduct(\ApiBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add filterConfig
     *
     * @param \ApiBundle\Entity\FilterConfig $filterConfig
     *
     * @return PatternTags
     */
    public function addFilterConfig(\ApiBundle\Entity\FilterConfig $filterConfig)
    {
        $this->filterConfigs[] = $filterConfig;

        return $this;
    }

    /**
     * Remove filterConfig
     *
     * @param \ApiBundle\Entity\FilterConfig $filterConfig
     */
    public function removeFilterConfig(\ApiBundle\Entity\FilterConfig $filterConfig)
    {
        $this->filterConfigs->removeElement($filterConfig);
    }

    /**
     * Get filterConfigs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilterConfigs()
    {
        return $this->filterConfigs;
    }
}
