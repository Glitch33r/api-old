<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vendor
 *
 * @ORM\Table(name="vendor_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\VendorRepository")
 */
class Vendor
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
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Phone", mappedBy="vendor")
     * @ORM\OrderBy({"priority" = "DESC"})
     */
    private $phones;

//    /**
//     * @var string - condition show in html sitemap
//     *
//     * @ORM\Column(name="show_in_html_sitemap", type="boolean", options={"default": true})
//     */
//    private $showInHTMLSitemap = 1;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString()
    {
        return ($this->title)?$this->title:"Vendors";
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
     * @return Vendor
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
     * Add phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return Vendor
     */
    public function addPhone(\ApiBundle\Entity\Phone $phone)
    {
        $phone->setVendor($this);
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePhone(\ApiBundle\Entity\Phone $phone)
    {
        return $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

//    /**
//     * @return string
//     */
//    public function getShowInHTMLSitemap()
//    {
//        return $this->showInHTMLSitemap;
//    }
//
//    /**
//     * @param string $showInHTMLSitemap
//     */
//    public function setShowInHTMLSitemap($showInHTMLSitemap)
//    {
//        $this->showInHTMLSitemap = $showInHTMLSitemap;
//    }
}
