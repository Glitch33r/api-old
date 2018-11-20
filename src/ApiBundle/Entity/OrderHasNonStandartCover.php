<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderHasNonStandartCover
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="order_has_non_standart_cover_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\OrderHasNonStandartCoverRepository")
 */
class OrderHasNonStandartCover
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
     * @ORM\ManyToOne(targetEntity="Order",inversedBy="orderHasNonStandartCovers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;
    /**
     *
     * @var \Cover
     *
     * @ORM\ManyToOne(targetEntity="NonStandartCover",inversedBy="nonStandartCoverHasOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     * })
     */
    private $cover;
    /**
     *
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone",inversedBy="phoneHasNsOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     * })
     */
    private $phone;
    private $filterPrice;

    /**
     * @return mixed
     */
    public function getFilterPrice()
    {
        return ($this->getCover())?$this->getCover()->getFilterPrice():0;
    }

    /**
     * @param mixed $filterPrice
     */
    public function setFilterPrice($filterPrice)
    {
        $this->filterPrice = $filterPrice;
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
     * Set number
     *
     * @param integer $number
     *
     * @return OrderHasNonStandartCover
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

    /**
     * Set order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return OrderHasNonStandartCover
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
     * @param \ApiBundle\Entity\NonStandartCover $cover
     *
     * @return OrderHasNonStandartCover
     */
    public function setCover(\ApiBundle\Entity\NonStandartCover $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \ApiBundle\Entity\NonStandartCover
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return OrderHasNonStandartCover
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
}
