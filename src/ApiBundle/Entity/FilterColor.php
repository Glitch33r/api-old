<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="filter_config_colors_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\FilterColorRepository")
 */
class FilterColor
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
     * @ORM\Column(name="title_field", type="string", length=255, nullable=false)
     */
    private $title;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterConfig", mappedBy="colors")
     */
    private $configs;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\NonStandartCover", mappedBy="colors")
     */
    private $nsCovers;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Product", mappedBy="colors")
     */
    private $products;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Pattern", mappedBy="colors")
     */
    private $patterns;

    public function __toString()
    {
        return ($this->title)?$this->title:' ';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return FilterColor
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
     * Add config
     *
     * @param \ApiBundle\Entity\FilterConfig $config
     *
     * @return FilterColor
     */
    public function addConfig(\ApiBundle\Entity\FilterConfig $config)
    {
        $this->configs[] = $config;

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

    /**
     * Remove config
     *
     * @param \ApiBundle\Entity\FilterConfig $config
     */
    public function removeConfig(\ApiBundle\Entity\FilterConfig $config)
    {
        $this->configs->removeElement($config);
    }

    /**
     * Get configs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConfigs()
    {
        return $this->configs;
    }

    /**
     * Add nsCover
     *
     * @param \ApiBundle\Entity\NonStandartCover $nsCover
     *
     * @return FilterColor
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
     * @return FilterColor
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
     * Add pattern
     *
     * @param \ApiBundle\Entity\Pattern $pattern
     *
     * @return FilterColor
     */
    public function addPattern(\ApiBundle\Entity\Pattern $pattern)
    {
        $this->patterns[] = $pattern;

        return $this;
    }

    /**
     * Remove pattern
     *
     * @param \ApiBundle\Entity\Pattern $pattern
     */
    public function removePattern(\ApiBundle\Entity\Pattern $pattern)
    {
        $this->patterns->removeElement($pattern);
    }

    /**
     * Get patterns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatterns()
    {
        return $this->patterns;
    }
}
