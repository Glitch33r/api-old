<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2016
 * Time: 05:18 PM
 */
namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderPayType
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="order_pay_type_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\OrderPayTypeRepository")
 */
class OrderPayType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     * @var string - contact person name
     *
     * @ORM\Column(name="linkname", type="string", length=128, nullable=true)
     */
    protected $linkname;
    /**
     * @var string - contact person name
     *
     * @ORM\Column(name="title", type="string", length=128, nullable=true)
     */
    protected $title;
    /**
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    protected $text;
    /**
     * @var \Order
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="payType",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    protected $orders;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString()
    {
        return $this->title ? $this->title : 'new';
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
     * Set linkname
     *
     * @param string $linkname
     *
     * @return OrderPayType
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;

        return $this;
    }

    /**
     * Get linkname
     *
     * @return string
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return OrderPayType
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
     * @return OrderPayType
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
     * Add order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return OrderPayType
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
