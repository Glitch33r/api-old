<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BonusMoneyRebate
 *
 * @ORM\Table(name="bonus_money_rebate")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\BonusMoneyRebateRepository")
 */
class BonusMoneyRebate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_price", type="integer", nullable=false)
     */
    private $orderPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="discount", type="integer", nullable=false)
     */
    private $discount;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getOrderPrice()
    {
        return $this->orderPrice;
    }

    /**
     * @param int $orderPrice
     */
    public function setOrderPrice($orderPrice)
    {
        $this->orderPrice = $orderPrice;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function __toString()
    {
        return (string)$this->orderPrice ? (string)$this->orderPrice : 'new';
    }
}
