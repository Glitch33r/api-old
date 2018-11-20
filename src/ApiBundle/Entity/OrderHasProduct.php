<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderHasProduct
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="order_has_product_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\OrderHasProductRepository")
 */
class OrderHasProduct
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
     * @ORM\ManyToOne(targetEntity="Order",inversedBy="orderHasProducts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;
    /**
     *
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product",inversedBy="productHasOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     * })
     */
    private $product;
    /**
     *
     * @var \Phone
     *
     * @ORM\ManyToOne(targetEntity="Phone",inversedBy="phoneHasProductOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $phone;
    private $filterPrice;

    /**
     * @return mixed
     */
    public function getFilterPrice()
    {
        return ($this->getProduct())?$this->getProduct()->getFilterPrice():0;
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
     * @return OrderHasProduct
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
     * @return OrderHasProduct
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
     * Set product
     *
     * @param \ApiBundle\Entity\Product $product
     *
     * @return OrderHasProduct
     */
    public function setProduct(\ApiBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \ApiBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set phone
     *
     * @param \ApiBundle\Entity\Phone $phone
     *
     * @return OrderHasProduct
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
