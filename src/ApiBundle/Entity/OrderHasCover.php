<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderHasCover
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="order_has_covers_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\OrderHasCoverRepository")
 */
class OrderHasCover
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
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     *
     */
    private $number =1;
    /**
     *
     * @var \Order
     *
     * @ORM\ManyToOne(targetEntity="Order",inversedBy="orderHasCovers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;
    /**
     *
     * @var \Cover
     *
     * @ORM\ManyToOne(targetEntity="Cover",inversedBy="coverHasOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     * })
     */
    private $cover;
    /**
     * @var int
     *
     * @ORM\Column(name="consumption", type="integer", nullable=true)
     *
     */
    private $consumption =1;
    /**
     *
     * @var \CustomCover
     *
     * @ORM\ManyToOne(targetEntity="CustomCover",inversedBy="customCoverHasOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_cover_id", referencedColumnName="id")
     * })
     */
    private $customCover;


    private $coverPrice;
    private $previewImage;
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
     * Set number
     *
     * @param integer $number
     *
     * @return OrderHasCover
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }


    public function setCoverPrice($coverPrice)
    {
        $this->coverPrice = $coverPrice;

        return $this;
    }
    /**
     * Get number
     *
     * @return integer
     */
    public function getCoverPrice()
    {
        if($this->cover){
            return round(($this->getCover()->getCoverType()->getPrice()+
                $this->getCover()->getPhone()->getPrice()+
                $this->getCover()->getPattern()->getPrice())*
            $this->getCover()->getPattern()->getPromoCoef());
        }
        if($this->customCover){
            return round($this->getCustomCover()->getCustomCoverType()->getPrice());
        }
        return 0;
    }

    /**
     * Set order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return OrderHasCover
     */
    public function setOrder(\ApiBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \ApiBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set cover
     *
     * @param \ApiBundle\Entity\Cover $cover
     *
     * @return OrderHasCover
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
     * Set customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return OrderHasCover
     */
    public function setCustomCover(\ApiBundle\Entity\CustomCover $customCover = null)
    {
        $this->customCover = $customCover;
        return $this;
    }

    /**
     * Get customCover
     *
     * @return \ApiBundle\Entity\CustomCover
     */
    public function getCustomCover()
    {
        return $this->customCover;
    }
//    /**
//     * return parent(Order-entity) translator for OrderHasCoverType
//     *
//     * @return bool
//     */
//    public function getTranslator()
//    {
//        if($this->order){
//            return $this->order->getTranslator();
//        }
//        return false;
//    }
    public function __toString(){
        return "covers";
    }
    public function setPreviewImage(){}
    public function getPreviewImage(){
        if($this->cover){
            $img = json_decode($this->getCover()->getImage(),1);
            return $img['small'];
        }
        if($this->customCover){
            $img = json_decode($this->getCustomCover()->getPreviewImage(),1);
            return $img['default_file'];
        }
    }

    /**
     * Set consumption
     *
     * @param integer $consumption
     *
     * @return OrderHasCover
     */
    public function setConsumption($consumption)
    {
        if(!$consumption){
            $consumption=1*$this->number;
        }
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Get consumption
     *
     * @return integer
     */
    public function getConsumption()
    {
        if($this->consumption){
            return $this->consumption;
        }
        return 1*$this->number;
    }
}
