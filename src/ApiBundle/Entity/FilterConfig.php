<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="filter_config_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\FilterConfigRepository")
 */
class FilterConfig
{
    public $static = [
        'совместимость'=>'phones',
        'рекомендованные'=>'best_offer',
        'акционные'=>'promo',
        'диапазон цены'=>'price_range',
    ];
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
     * @ORM\Column(name="page_field", type="string", length=255, nullable=false)
     */
    private $page;
    /**
     * price,promo_items,recommended_items,phones
     *
     * @var array
     *
     * @ORM\Column(name="stable_state_features_field", type="array", nullable=true)
     */
    private $stableStateFeatures;
    /**
     * @var string
     *
     * @ORM\Column(name="min_field", type="integer", length=10, nullable=false)
     */
    private $priceMin=0;
    /**
     * @var string
     *
     * @ORM\Column(name="max_field", type="integer", length=10, nullable=false)
     */
    private $priceMax=1000;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterColor", inversedBy="configs")
     * @ORM\JoinTable(name="filter_config_has_color",
     *   joinColumns={
     *     @ORM\JoinColumn(name="config_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     *   }
     * )
     */
    private $colors;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterItemType", inversedBy="filterConfigs")
     * @ORM\JoinTable(name="filter_config_has_type",
     *   joinColumns={
     *     @ORM\JoinColumn(name="config_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="item_type_id", referencedColumnName="id")
     *   }
     * )
     */
    private $itemTypes;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\FilterMaterial", inversedBy="filterConfigs")
     * @ORM\JoinTable(name="filter_config_has_material",
     *   joinColumns={
     *     @ORM\JoinColumn(name="config_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     *   }
     * )
     */
    private $materials;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     *
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\PatternTags", inversedBy="filterConfigs")
     * @ORM\JoinTable(name="filter_config_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="config_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;
    public function __toString()
    {
        return ($this->page)?"Конфиг Фильтра страницы ".$this->getPage():"новый конфиг";
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->itemTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->materials = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set page
     *
     * @param string $page
     *
     * @return FilterConfig
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set stableStateFeatures
     *
     * @param array $stableStateFeatures
     *
     * @return FilterConfig
     */
    public function setStableStateFeatures($stableStateFeatures)
    {
        $this->stableStateFeatures = $stableStateFeatures;

        return $this;
    }

    /**
     * Get stableStateFeatures
     *
     * @return array
     */
    public function getStableStateFeatures()
    {
        return $this->stableStateFeatures;
    }

    /**
     * Set priceMin
     *
     * @param integer $priceMin
     *
     * @return FilterConfig
     */
    public function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    /**
     * Get priceMin
     *
     * @return integer
     */
    public function getPriceMin()
    {
        return $this->priceMin;
    }

    /**
     * Set priceMax
     *
     * @param integer $priceMax
     *
     * @return FilterConfig
     */
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    /**
     * Get priceMax
     *
     * @return integer
     */
    public function getPriceMax()
    {
        return $this->priceMax;
    }

    /**
     * Add color
     *
     * @param \ApiBundle\Entity\FilterColor $color
     *
     * @return FilterConfig
     */
    public function addColor(\ApiBundle\Entity\FilterColor $color)
    {
        $color->addFilterConfig($this);
        $this->colors[] = $color;

        return $this;
    }

    /**
     * Remove color
     *
     * @param \ApiBundle\Entity\FilterColor $color
     */
    public function removeColor(\ApiBundle\Entity\FilterColor $color)
    {
        $this->colors->removeElement($color);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Add itemType
     *
     * @param \ApiBundle\Entity\FilterItemType $itemType
     *
     * @return FilterConfig
     */
    public function addItemType(\ApiBundle\Entity\FilterItemType $itemType)
    {
        $itemType->addFilterConfig($this);
        $this->itemTypes[] = $itemType;

        return $this;
    }

    /**
     * Remove itemType
     *
     * @param \ApiBundle\Entity\FilterItemType $itemType
     */
    public function removeItemType(\ApiBundle\Entity\FilterItemType $itemType)
    {
        $this->itemTypes->removeElement($itemType);
    }

    /**
     * Get itemTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItemTypes()
    {
        return $this->itemTypes;
    }

    /**
     * Add material
     *
     * @param \ApiBundle\Entity\FilterMaterial $material
     *
     * @return FilterConfig
     */
    public function addMaterial(\ApiBundle\Entity\FilterMaterial $material)
    {
        $material->addFilterConfig($this);
        $this->materials[] = $material;

        return $this;
    }

    /**
     * Remove material
     *
     * @param \ApiBundle\Entity\FilterMaterial $material
     */
    public function removeMaterial(\ApiBundle\Entity\FilterMaterial $material)
    {
        $this->materials->removeElement($material);
    }

    /**
     * Get materials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * Add tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     *
     * @return FilterConfig
     */
    public function addTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \ApiBundle\Entity\PatternTags $tag
     */
    public function removeTag(\ApiBundle\Entity\PatternTags $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
