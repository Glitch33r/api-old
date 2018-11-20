<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Share
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="share_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\ShareRepository")
 */
class Share
{
    private $statesArray=array(
        0=>'not-active',
        1=>'active'
    );
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
     * @ORM\Column(name="title_field", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @var string - state
     *
     * available states: 'not-active', 'active'
     *
     * @ORM\Column(name="state_field", type="string", columnDefinition="enum('not-active', 'active')" ,nullable=false)
     */
    private $state = "not-active";

    /**
     * @var \DateTime deadLine
     *
     * @ORM\Column(name="dead_line",type="datetime", nullable=true)
     */
    private $deadLine;
    /**
     * @ORM\Column(name="number_field", type="integer", nullable=false)
     */
    private $number=1;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Order", inversedBy="shares")
     * @ORM\JoinTable(name="order_has_share",
     *   joinColumns={
     *     @ORM\JoinColumn(name="share_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     *   }
     * )
     */
    private $orders;
    public function __toString()
    {
        return ($this->title)?$this->title:"Новая акция";
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Share
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
     * Set state
     *
     * @param string $state
     *
     * @return Share
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set deadLine
     *
     * @param \DateTime $deadLine
     *
     * @return Share
     */
    public function setDeadLine($deadLine)
    {
        $this->deadLine= \DateTime::createFromFormat('d-m-Y H:i', $deadLine);
        return $this;
    }

    /**
     * Get deadLine
     *
     * @return \DateTime
     */
    public function getDeadLine()
    {
        return ($this->deadLine)?$this->deadLine->format( "d-m-Y H:i" ):$this->deadLine;
    }

    /**
     * Add order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return Share
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

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Share
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
}
