<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Promo
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="promo_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\PromoRepository")
 */
class Promo
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
     * @ORM\Column(name="fio", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string - promo text
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var string - promo_code
     *
     * @ORM\Column(name="promo_code", type="string", length=100, nullable=true)
     */
    private $promoCode;

    /**
     * @var string - grn of promo
     *
     * @ORM\Column(name="money", type="float", nullable=true)
     */
    private $money;

    /**
     * @var string - procent promo
     *
     * @ORM\Column(name="procent", type="float", nullable=true)
     */
    private $procent;

    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;

    /**
     * @var string - status
     *
     * avaliable statuses: 'not-active', 'active'
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum('not-active', 'active')" ,nullable=false)
     */
    private $status = "not-active";

    /**
     * @var \DateTime $deadLine
     *
     * @ORM\Column(name="dead_line",type="datetime", nullable=true)
     */
    private $deadLine;
    /**
     * @var \Orders
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="promo",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
    }
    public function __toString()
    {
        return $this->title ? (string)$this->title : 'new';
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
     * @return Promo
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
     * Set text
     *
     * @param string $text
     *
     * @return Promo
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set promoCode
     *
     * @param string $promoCode
     *
     * @return Promo
     */
    public function setPromoCode($promoCode)
    {
        $this->promoCode = $promoCode;
    
        return $this;
    }

    /**
     * Get promoCode
     *
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }

    /**
     * Set money
     *
     * @param float $money
     *
     * @return Promo
     */
    public function setMoney($money)
    {
        $this->money = $money;
    
        return $this;
    }

    /**
     * Get money
     *
     * @return float
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set procent
     *
     * @param float $procent
     *
     * @return Promo
     */
    public function setProcent($procent)
    {
        $this->procent = $procent;
    
        return $this;
    }

    /**
     * Get procent
     *
     * @return float
     */
    public function getProcent()
    {
        return $this->procent;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Promo
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt= \DateTime::createFromFormat('d-m-Y H:i', $createdAt);
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        if (is_null($this->createdAt))
            return $this->createdAt;
        return $this->createdAt->format( "d-m-Y H:i" );
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Promo
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set deadLine
     *
     * @param \DateTime $deadLine
     *
     * @return Promo
     */
    public function setDeadLine($deadLine)
    {
        $str = explode('-', $deadLine);
        if (count($str) < 4) {
            $deadLine .= " 00:00:00";
        }
        $this->deadLine = \DateTime::createFromFormat('d-m-Y H:i:s', $deadLine);
        return $this;
    }

    /**
     * Get deadLine
     *
     * @return \DateTime
     */
    public function getDeadLine()
    {
        if (is_null($this->deadLine))
            return $this->deadLine;
        if ($this->deadLine instanceof \DateTime) {
            return $this->deadLine->format("d-m-Y");
        }
        return $this->deadLine;
    }

    /**
     * Add order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return Promo
     */
    public function addOrder(\ApiBundle\Entity\Order $order)
    {
        $this->orders[] = $order;
    
        return $this;
    }

    /**
     * Remove order
     *
     * @param \ApiBundle\Entity\Order $order
     */
    public function removeOrder(\ApiBundle\Entity\Order $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
