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
 * OrderDeliveryType
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="nova_poshta_data_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\NovaPoshtaDataRepository")
 */
class NovaPoshtaData
{
    public $payerType = array(
        'Recipient' => 'Получатель',
        'Sender' => 'Отправитель'
    );
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     *
     * @ORM\Column(name="payer", type="text", nullable=true)
     */
    protected $payer;
    /**
     *
     * @ORM\Column(name="invoice_date", type="datetime", nullable=true)
     */
    protected $invoiceDate;
    /**
     *
     * @ORM\Column(name="region_href", type="text", nullable=true)
     */
    protected $regionHref;
    /**
     *
     * @ORM\Column(name="city_href", type="text", nullable=true)
     */
    protected $cityHref;
    /**
     *
     * @ORM\Column(name="warehouse_href", type="text", nullable=true)
     */
    protected $warehouseHref;
    /**
     *
     * @ORM\Column(name="invoice_ref", type="text", nullable=true)
     */
    protected $invoiceRef;
    /**
     *
     * @ORM\Column(name="new_post_state", type="text", nullable=true)
     */
    protected $newPostState;
    /**
     *
     * @ORM\Column(name="new_post_state_id", type="text", nullable=true)
     */
    protected $newPostStateId;
    /**
     *
     * @ORM\Column(name="c_o_d_state", type="text", nullable=true)
     */
    protected $codState;
    /**
     *
     * @ORM\Column(name="c_o_d_transaction_date", type="text", nullable=true)
     */
    protected $codTransactionDate;

    /**
     *
     * @ORM\Column(name="recipient_date_time", type="text", nullable=true)
     */
    protected $recipientDateTime;

    /**
     *
     * @ORM\Column(name="invoice_id", type="text", nullable=true)
     */
    protected $invoiceId;
    /**
     * @var \Order
     *
     * @ORM\OneToOne(targetEntity="Order", inversedBy="novaPoshtaData")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

    /**
     *
     * @ORM\Column(name="delivery_date", type="datetime", nullable=true)
     */
    protected $deliveryDate;

    /**
     * @return mixed
     */
    public function getRecipientDateTime()
    {
        return $this->recipientDateTime;
    }

    /**
     * @param mixed $recipientDateTime
     */
    public function setRecipientDateTime($recipientDateTime)
    {
        $this->recipientDateTime = $recipientDateTime;
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

    /**
     * Set order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return NovaPoshtaData
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set regionHref
     *
     * @param string $regionHref
     *
     * @return NovaPoshtaData
     */
    public function setRegionHref($regionHref)
    {
        $this->regionHref = $regionHref;

        return $this;
    }

    /**
     * Get regionHref
     *
     * @return string
     */
    public function getRegionHref()
    {
        return $this->regionHref;
    }

    /**
     * Set cityHref
     *
     * @param string $cityHref
     *
     * @return NovaPoshtaData
     */
    public function setCityHref($cityHref)
    {
        $this->cityHref = $cityHref;

        return $this;
    }

    /**
     * Get cityHref
     *
     * @return string
     */
    public function getCityHref()
    {
        return $this->cityHref;
    }

    /**
     * Set warehouseHref
     *
     * @param string $warehouseHref
     *
     * @return NovaPoshtaData
     */
    public function setWarehouseHref($warehouseHref)
    {
        $this->warehouseHref = $warehouseHref;

        return $this;
    }

    /**
     * Get warehouseHref
     *
     * @return string
     */
    public function getWarehouseHref()
    {
        return $this->warehouseHref;
    }

    /**
     * Set invoiceRef
     *
     * @param string $invoiceRef
     *
     * @return NovaPoshtaData
     */
    public function setInvoiceRef($invoiceRef)
    {
        $this->invoiceRef = $invoiceRef;

        return $this;
    }

    /**
     * Get invoiceRef
     *
     * @return string
     */
    public function getInvoiceRef()
    {
        return $this->invoiceRef;
    }

    /**
     * Set invoiceId
     *
     * @param string $invoiceId
     *
     * @return NovaPoshtaData
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get invoiceId
     *
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * Set payer
     *
     * @param string $payer
     *
     * @return NovaPoshtaData
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payer
     *
     * @return string
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set newPostState
     *
     * @param string $newPostState
     *
     * @return NovaPoshtaData
     */
    public function setNewPostState($newPostState)
    {
        $this->newPostState = $newPostState;

        return $this;
    }

    /**
     * Get newPostState
     *
     * @return string
     */
    public function getNewPostState()
    {
        return $this->newPostState;
    }

    /**
     * Set codState
     *
     * @param string $codState
     *
     * @return NovaPoshtaData
     */
    public function setCodState($codState)
    {
        $this->codState = $codState;

        return $this;
    }

    /**
     * Get codState
     *
     * @return string
     */
    public function getCodState()
    {
        return $this->codState;
    }

    /**
     * Set newPostStateId
     *
     * @param string $newPostStateId
     *
     * @return NovaPoshtaData
     */
    public function setNewPostStateId($newPostStateId)
    {
        $this->newPostStateId = $newPostStateId;

        return $this;
    }

    /**
     * Get newPostStateId
     *
     * @return string
     */
    public function getNewPostStateId()
    {
        return $this->newPostStateId;
    }

    /**
     * Set codTransactionDate
     *
     * @param string $codTransactionDate
     *
     * @return NovaPoshtaData
     */
    public function setCodTransactionDate($codTransactionDate)
    {
        $this->codTransactionDate = $codTransactionDate;

        return $this;
    }

    /**
     * Get codTransactionDate
     *
     * @return string
     */
    public function getCodTransactionDate()
    {
        return $this->codTransactionDate;
    }

    /**
     * Set invoiceDate
     *
     * @param \DateTime $invoiceDate
     *
     * @return NovaPoshtaData
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate= \DateTime::createFromFormat('d.m.Y', $invoiceDate);
        return $this;
    }

    /**
     * Get invoiceDate
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        if (is_null($this->invoiceDate))
            return $this->invoiceDate;
        return $this->invoiceDate->format( "d.m.Y" );
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="is_track_new_post_state", type="integer", nullable=false)
     */
    private $isTrackNewPostState = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_track_error", type="integer", nullable=false)
     */
    private $isTrackError = 0;

    /**
     * @return int
     */
    public function getIsTrackError()
    {
        return $this->isTrackError;
    }

    /**
     * @param int $isTrackError
     */
    public function setIsTrackError($isTrackError)
    {
        $this->isTrackError = $isTrackError;
    }

    public function getIsTrackNewPostState()
    {
        return $this->isTrackNewPostState;
    }

    public function setIsTrackNewPostState($isTrackNewPostState)
    {
        $this->isTrackNewPostState = $isTrackNewPostState;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param mixed $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }
}
