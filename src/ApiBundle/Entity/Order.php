<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Order
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="order_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\OrderRepository")
 */
class Order
{
    /**
     * property - contains all available order states with human-read rus meaning
     *
     * @var array
     */
    public $states = array(
        'un-confirmed' => 'Неподтвержден',
        'confirmed' => 'Новый заказ',
        'processing' => 'Обрабатывается менеждером',
        'verified' => 'Подтвержден',
        'unverified' => 'Перезвонить позже',
        'delete' => 'На удаление',
        'payment-confirm' => 'Ожидание оплаты',
        'fabricated' => 'Выполнен',
        'on-delivery' => 'Отправлен',
        'refused' => 'Возврат',
        'accomplished' => 'Завершен',

        'success' => 'Успешный платеж ( liqPay )',
        'failure' => 'Неуспешный платеж ( liqPay )'
    );

    public $deliveryProviders = array(
        'nova-poshta' => 'Новая почта',
        'ukrposhta-W2D' => 'Укрпочта(домой)',
        'ukrposhta-W2W' => 'Укрпочта(отделение)',
        'pickup' => 'Самовывоз'
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
     *
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User",inversedBy="orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    /**
     * @var \OrderHasCovers
     *
     * @ORM\OneToMany(targetEntity="OrderHasCover", mappedBy="order",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $orderHasCovers;
    /**
     * @var \OrderHasNonStandartCover
     *
     * @ORM\OneToMany(targetEntity="OrderHasNonStandartCover", mappedBy="order",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $orderHasNonStandartCovers;
    /**
     * @var \OrderHasNonStandartCover
     *
     * @ORM\OneToMany(targetEntity="OrderHasProduct", mappedBy="order",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $orderHasProducts;
    /**
     *
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User",inversedBy="inProgress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     * })
     */
    private $manager;
    /**
     *
     * @var \OrderPayType
     *
     * @ORM\ManyToOne(targetEntity="OrderPayType",inversedBy="orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pay_type_id", referencedColumnName="id")
     * })
     */
    private $payType;
    /**
     *
     *
     * @ORM\Column(name="deliveryType", type="string", columnDefinition="enum('pickup','nova-poshta','ukrposhta-W2D','ukrposhta-W2W')" ,nullable=false)
     *
     */
    private $deliveryType;
    /**
     *
     * @var \NovaPoshtaData
     *
     * @ORM\OneToOne(targetEntity="NovaPoshtaData", mappedBy="order", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $novaPoshtaData;
    /**
     *
     * @var \UkrPoshtaData
     *
     * @ORM\OneToOne(targetEntity="UkrPoshtaData", mappedBy="order", cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $ukrPoshtaData;
    /**
     * @var string - contact person name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @var string - contact person phone
     *
     * @ORM\Column(name="telephone", type="string", length=30, nullable=true)
     */
    private $telephone;
    /**
     * @var string - contact person email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string - client comment to an order
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var string - client comment to an order
     *
     * @ORM\Column(name="user_comment", type="text", nullable=true)
     */
    private $userComment;

    /**
     * @var string - contact person phone
     *
     * @ORM\Column(name="promo_code", type="string", length=100, nullable=true)
     */
    private $promoCode;
    /**
     * @var string - contact person phone
     *
     * @ORM\Column(name="summ", type="string", length=50, nullable=true)
     */
    private $summ;
    /**
     * @var string - contact person phone
     *
     * @ORM\Column(name="discount", type="string", length=50, nullable=true)
     */
    private $discount;
    /**
     * @var string - contact person phone
     *
     * @ORM\Column(name="manager_discount", type="string", length=50, nullable=true)
     */
    private $managerDiscount;
    /**
     * @var string - status
     *
     * available states
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum(
    'un-confirmed',
    'confirmed',
    'processing',
    'verified',
    'unverified',
    'delete',
    'payment-confirm',
    'fabricated',
    'on-delivery',
    'refused',
    'accomplished',
    'success',
    'failure',
    'error',
    'subscribed',
    'unsubscribed',
    'reversed',
    'sandbox'
    )" ,nullable=false)
     */
    private $status = "un-confirmed";
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @var \DateTime deadLine
     *
     * @ORM\Column(name="dead_line",type="datetime", nullable=true)
     */
    private $deadLine;
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at",type="datetime")
     */
    private $updatedAt;
    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="verified_at",type="datetime", nullable=true)
     */
    private $verifiedAt;

    /**
     *
     * @var \Promo
     *
     * @ORM\ManyToOne(targetEntity="Promo",inversedBy="orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
     * })
     */
    private $promo;

    /**
     * @var string - used to sort covers
     *
     * @ORM\Column(name="bonus_money", type="integer", nullable=true)
     */
    private $bonusMoney;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Share", mappedBy="orders")
     */
    private $shares;
    public function getCabinetState(){
        $state = '';
        switch($this->status){
            case "verified":
                $state = "подтвержден";
                break;
            case "fabricated":
                $state = "выполнен";
                break;
            case "on-delivery":
                $state = "отправлен";
                break;
            case "accomplished":
                $state = "завершен";
                break;
            case "refused":
                $state = "завершен";
                break;
            default:
                $state = "новый";
                break;
        }
        return $state;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderHasCovers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getBonusMoney()
    {
        return $this->bonusMoney;
    }

    /**
     * @param string $bonusMoney
     */
    public function setBonusMoney($bonusMoney)
    {
        $this->bonusMoney = $bonusMoney;
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
     * Set name
     *
     * @param string $name
     *
     * @return Order
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        if (!$this->name && $this->getUser()) {
            $this->name = $this->getUser()->getUsername();
        }
        return $this->name;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Order
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @var \DateTime $deadLine
     *
     * @ORM\Column(name="order_at",type="datetime", nullable=true)
     */
    private $orderAt;

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        if (!$this->email && $this->getUser()) {
            $this->email = $this->getUser()->getEmail();
        }
        return $this->email;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set promoCode
     *
     * @param string $promoCode
     *
     * @return Order
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
     * Set summ
     *
     *
     * @return Order
     */
    public function setSumm($param = null)
    {
        $summ = null;
        if (count($this->getOrderHasCovers()) > 0) {
            foreach ($this->getOrderHasCovers() as $item) {
                if ($item->getCover()) {
                    $summ += $item->getCover()->getFilterPrice() * $item->getNumber();
                } else {
                    $summ += $item->getCustomCover()->getPrice() * $item->getNumber();
                }
            }
        }
        if (count($nsCovers = $this->getOrderHasNonStandartCovers()) > 0) {
            foreach ($nsCovers as $item) {
                $summ += $item->getCover()->getFilterPrice() * $item->getNumber();
            }
        }
        if (count($product = $this->getOrderHasProducts()) > 0) {
            foreach ($product as $item) {
                $summ += $item->getProduct()->getFilterPrice() * $item->getNumber();
            }
        }
        $this->summ = (int)$summ;
        return $this;
    }
    public function getRawSumm()
    {
        return (string)round(((float)$this->summ));
    }
    /**
     * Get summ
     *
     * @return string
     */
    public function getSumm()
    {
        return (string)round(((float)$this->summ - (float)$this->getDiscount()));
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Order
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \ApiBundle\Entity\User $user
     *
     * @return Order
     */
    public function setUser(\ApiBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ApiBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add orderHasCover
     *
     * @param \ApiBundle\Entity\OrderHasCover $orderHasCover
     *
     * @return Order
     */
    public function addOrderHasCover(\ApiBundle\Entity\OrderHasCover $orderHasCover)
    {
        $orderHasCover->setOrder($this);
        $this->orderHasCovers[] = $orderHasCover;
        return $this;
    }

    /**
     * Remove orderHasCover
     *
     * @param \ApiBundle\Entity\OrderHasCover $orderHasCover
     */
    public function removeOrderHasCover(\ApiBundle\Entity\OrderHasCover $orderHasCover)
    {
        $this->orderHasCovers->removeElement($orderHasCover);
    }

    /**
     * Get orderHasCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderHasCovers()
    {
        return $this->orderHasCovers;
    }

    /**
     * Checks whether orderHasCovers collection contains given cover
     *
     * @param Cover $cover
     * @return bool
     * true - cover present in collection, false otherwise
     */
    public function orderHasCoversContainsCover(\ApiBundle\Entity\Cover $cover)
    {
        if (count($this->getOrderHasCovers()) > 0) {
            foreach ($this->getOrderHasCovers() as $link) {
                if (($link->getCover()) && ($link->getCover()->getId() == $cover->getId())) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Checks whether orderHasCustomCovers collection contains given custom cover
     *
     * @param CustomCover $customCover
     * @return bool
     * true - customCover present in collection, false otherwise
     */
    public function orderHasCoversContainsCustomCover(\ApiBundle\Entity\CustomCover $cover)
    {
        if (count($this->getOrderHasCovers()) > 0) {
            foreach ($this->getOrderHasCovers() as $link) {
                if (($link->getCustomCover()) && ($link->getCustomCover()->getId() == $cover->getId())) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Set manager
     *
     * @param \ApiBundle\Entity\User $manager
     *
     * @return Order
     */
    public function setManager(\ApiBundle\Entity\User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \ApiBundle\Entity\User
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Order
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

    public function getAvaliableStatuses()
    {
        return array(
            'un-confirmed',
            'confirmed'
        );
    }

    /**
     * Set payType
     *
     * @param \ApiBundle\Entity\OrderPayType $payType
     *
     * @return Order
     */
    public function setPayType(\ApiBundle\Entity\OrderPayType $payType = null)
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * Get payType
     *
     * @return \ApiBundle\Entity\OrderPayType
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Set deliveryType
     *
     * @param string $deliveryType
     *
     * @return Order
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    /**
     * Get deliveryType
     *
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * Set novaPoshtaData
     *
     * @param \ApiBundle\Entity\NovaPoshtaData $novaPoshtaData
     *
     * @return Order
     */
    public function setNovaPoshtaData(\ApiBundle\Entity\NovaPoshtaData $novaPoshtaData = null)
    {
        $this->novaPoshtaData = $novaPoshtaData;
        if ($novaPoshtaData) {
            $novaPoshtaData->setOrder($this);
        }
        return $this;
    }

    /**
     * Get novaPoshtaData
     *
     * @return \ApiBundle\Entity\NovaPoshtaData
     */
    public function getNovaPoshtaData()
    {
        return $this->novaPoshtaData;
    }

    public function __toString()
    {
        $str = "0000000";
        $id = (string)$this->getId();
        return "N-" . substr($str, 0, 7 - strlen($id)) . $id;
    }

    /**
     * Set discount
     *
     * @param string $discount
     *
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    public function getIsLocked()
    {
        if ($this->getManager()) {
            return $this->getManager();
        }
    }

    public function getInvoice()
    {
        if (
            ($this->getDeliveryType() == 'nova-poshta') &&
            ($this->getNovaPoshtaData()) &&
            ($id = $this->getNovaPoshtaData()->getInvoiceId())
        ) {
            return "Нова-пошта :  " . $id;
        }
        return null;
    }
    public function getUkrPostInvoice()
    {
        if (
            ($this->getDeliveryType() == ('ukrposhta-W2D'||'ukrposhta-W2W')) &&
            ($this->getUkrPoshtaData()) &&
            ($id = $this->getUkrPoshtaData()->getInvoice())
        ) {
            return "УкрПошта :  " . $id;
        }
        return null;
    }

    public function getNewPostState()
    {
        $np = $this->getNovaPoshtaData();
        if ($np) {
            return $np->getNewPostState();
        }
        return null;
    }
    public function getUkrPostState()
    {
        $up = $this->getUkrPoshtaData();
        if ($up) {
            return $up->getState();
        }
        return null;
    }
    public function getUkrPostDeliveryDate()
    {
        $up = $this->getUkrPoshtaData();
        if ($up) {
            return $up->getDeliveryDate();
        }
        return null;
    }

    public function getCodState()
    {
        if ($np = $this->getNovaPoshtaData()) {
            return $np->getCodState();
        }
        return null;
    }

    public function getCodTransactionDate()
    {
        if ($np = $this->getNovaPoshtaData()) {
            return $np->getCodTransactionDate();
        }
        return null;
    }

    /**
     * Set deadLine
     *
     * @param \DateTime $deadLine
     *
     * @return Order
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

    public function getPhone()
    {
        $phone = '';
        foreach ($this->getOrderHasCovers() as $key => $cover) {
            if ($key != 0) {
                $phone .= ' ';
            }
            if ($cover->getCover()) {

                $phone .= $cover->getCover()->getPhone()->getVendor()->getTitle() . ' '
                    . $cover->getCover()->getPhone()->getTitle();
            } elseif ($cover->getCustomCover()) {
                $phone .= ' ' . $cover->getCustomCover()->getPhone()->getVendor()->getTitle() . ' '
                    . $cover->getCustomCover()->getPhone()->getTitle();
            }

            if ($key != (count($this->getOrderHasCovers()) - 1)) {
                $phone .= ' ';
            }
        }
        return $phone;
    }

    public function getCover()
    {
        $coverStr = '';

        foreach ($this->getOrderHasCovers() as $key => $cover) {
            if ($cover->getCover()) {
                if ($key != 0) {
                    $coverStr .= ' ';
                }
                $coverStr .= $cover->getCover()->getPattern()->getTitle();

                if ($key != (count($this->getOrderHasCovers()) - 1)) {
                    $coverStr .= ' ';
                }
            }

        }

        return $coverStr;
    }

    /**
     * @return \DateTime
     */
    public function getOrderAt()
    {
        return $this->orderAt;
    }

    /**
     * @param \DateTime $orderAt
     */
    public function setOrderAt($orderAt)
    {
        $this->orderAt = $orderAt;
    }

    /**
     * Set promo
     *
     * @param \ApiBundle\Entity\Promo $promo
     *
     * @return Order
     */
    public function setPromo(\ApiBundle\Entity\Promo $promo = null)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return \ApiBundle\Entity\Promo
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Add share
     *
     * @param \ApiBundle\Entity\Share $share
     *
     * @return Order
     */
    public function addShare(\ApiBundle\Entity\Share $share)
    {
        $share->addOrder($this);
        $this->shares[] = $share;

        return $this;
    }

    /**
     * Remove share
     *
     * @param \ApiBundle\Entity\Share $share
     */
    public function removeShare(\ApiBundle\Entity\Share $share)
    {
        $share->removeOrder($this);
        if(!is_null($this->shares)){
            $this->shares->removeElement($share);
        }
    }

    /**
     * Get shares
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShares()
    {
        return $this->shares;
    }
    /**
     * @return string
     */
    public function getUserComment()
    {
        return $this->userComment;
    }

    /**
     * @param string $userComment
     */
    public function setUserComment($userComment)
    {
        $this->userComment = $userComment;
    }

    /**
     * Add orderHasNonStandartCover
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $orderHasNonStandartCover
     *
     * @return Order
     */
    public function addOrderHasNonStandartCover(\ApiBundle\Entity\OrderHasNonStandartCover $orderHasNonStandartCover)
    {
        $orderHasNonStandartCover->setOrder($this);
        $this->orderHasNonStandartCovers[] = $orderHasNonStandartCover;

        return $this;
    }

    /**
     * Remove orderHasNonStandartCover
     *
     * @param \ApiBundle\Entity\OrderHasNonStandartCover $orderHasNonStandartCover
     */
    public function removeOrderHasNonStandartCover(\ApiBundle\Entity\OrderHasNonStandartCover $orderHasNonStandartCover)
    {
        $this->orderHasNonStandartCovers->removeElement($orderHasNonStandartCover);
    }

    /**
     * Get orderHasNonStandartCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderHasNonStandartCovers()
    {
        return $this->orderHasNonStandartCovers;
    }

    /**
     * Add orderHasProduct
     *
     * @param \ApiBundle\Entity\OrderHasProduct $orderHasProduct
     *
     * @return Order
     */
    public function addOrderHasProduct(\ApiBundle\Entity\OrderHasProduct $orderHasProduct)
    {
        $orderHasProduct->setOrder($this);
        $this->orderHasProducts[] = $orderHasProduct;

        return $this;
    }

    /**
     * Remove orderHasProduct
     *
     * @param \ApiBundle\Entity\OrderHasProduct $orderHasProduct
     */
    public function removeOrderHasProduct(\ApiBundle\Entity\OrderHasProduct $orderHasProduct)
    {
        $this->orderHasProducts->removeElement($orderHasProduct);
    }

    /**
     * Get orderHasProducts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderHasProducts()
    {
        return $this->orderHasProducts;
    }

    /**
     * Set verifiedAt
     *
     * @param \DateTime $verifiedAt
     *
     * @return Order
     */
    public function setVerifiedAt($verifiedAt)
    {
        $this->verifiedAt = $verifiedAt;

        return $this;
    }

    /**
     * Get verifiedAt
     *
     * @return \DateTime
     */
    public function getVerifiedAt()
    {
        return $this->verifiedAt;
    }

    /**
     * Set managerDiscount
     *
     * @param string $managerDiscount
     *
     * @return Order
     */
    public function setManagerDiscount($managerDiscount)
    {
        $this->managerDiscount = $managerDiscount;

        return $this;
    }

    /**
     * Get managerDiscount
     *
     * @return string
     */
    public function getManagerDiscount()
    {
        return $this->managerDiscount;
    }

    /**
     * Set ukrPoshtaData
     *
     * @param \ApiBundle\Entity\UkrPoshtaData $ukrPoshtaData
     *
     * @return Order
     */
    public function setUkrPoshtaData(\ApiBundle\Entity\UkrPoshtaData $ukrPoshtaData = null)
    {
        $this->ukrPoshtaData = $ukrPoshtaData;
        if ($ukrPoshtaData) {
            $ukrPoshtaData->setOrder($this);
        }
        return $this;
    }

    /**
     * Get ukrPoshtaData
     *
     * @return \ApiBundle\Entity\UkrPoshtaData
     */
    public function getUkrPoshtaData()
    {
        return $this->ukrPoshtaData;
    }
}
