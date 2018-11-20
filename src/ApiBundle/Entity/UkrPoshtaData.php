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
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="ukr_poshta_data_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\UkrPoshtaDataRepository")
 */
class UkrPoshtaData
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
     *
     * @ORM\Column(name="region_id", type="text", nullable=true)
     */
    protected $regionId;
    /**
     *
     * @ORM\Column(name="region_ua", type="text", nullable=true)
     */
    protected $regionUa;
    /**
     *
     * @ORM\Column(name="district_id", type="text", nullable=true)
     */
    protected $districtId;
    /**
     *
     * @ORM\Column(name="district_ua", type="text", nullable=true)
     */
    protected $districtUa;
    /**
     *
     * @ORM\Column(name="city_id", type="text", nullable=true)
     */
    protected $cityId;
    /**
     *
     * @ORM\Column(name="city_ua", type="text", nullable=true)
     */
    protected $cityUa;
    /**
     *
     * @ORM\Column(name="street_id", type="text", nullable=true)
     */
    protected $streetId;
    /**
     *
     * @ORM\Column(name="street_ua", type="text", nullable=true)
     */
    protected $streetUa;
    /**
     *
     * @ORM\Column(name="post_cod", type="text", nullable=true)
     */
    protected $postCod;
    /**
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    protected $address;
    /**
     *
     * @ORM\Column(name="invoice", type="text", nullable=true)
     */
    protected $invoice;
    /**
     *
     * @ORM\Column(name="state", type="text", nullable=true)
     */
    protected $state;
    /**
     *
     * @ORM\Column(name="delivery_date", type="text", nullable=true)
     */
    protected $deliveryDate;
    /**
     *
     * @ORM\Column(name="invoice_id", type="text", nullable=true)
     */
    protected $invoiceId;
    /**
     * @var \Order
     *
     * @ORM\OneToOne(targetEntity="Order", inversedBy="ukrPoshtaData")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

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
     * Set regionId
     *
     * @param string $regionId
     *
     * @return UkrPoshtaData
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return string
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set regionUa
     *
     * @param string $regionUa
     *
     * @return UkrPoshtaData
     */
    public function setRegionUa($regionUa)
    {
        $this->regionUa = $regionUa;

        return $this;
    }

    /**
     * Get regionUa
     *
     * @return string
     */
    public function getRegionUa()
    {
        return $this->regionUa;
    }

    /**
     * Set districtId
     *
     * @param string $districtId
     *
     * @return UkrPoshtaData
     */
    public function setDistrictId($districtId)
    {
        $this->districtId = $districtId;

        return $this;
    }

    /**
     * Get districtId
     *
     * @return string
     */
    public function getDistrictId()
    {
        return $this->districtId;
    }

    /**
     * Set districtUa
     *
     * @param string $districtUa
     *
     * @return UkrPoshtaData
     */
    public function setDistrictUa($districtUa)
    {
        $this->districtUa = $districtUa;

        return $this;
    }

    /**
     * Get districtUa
     *
     * @return string
     */
    public function getDistrictUa()
    {
        return $this->districtUa;
    }

    /**
     * Set cityId
     *
     * @param string $cityId
     *
     * @return UkrPoshtaData
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId
     *
     * @return string
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set cityUa
     *
     * @param string $cityUa
     *
     * @return UkrPoshtaData
     */
    public function setCityUa($cityUa)
    {
        $this->cityUa = $cityUa;

        return $this;
    }

    /**
     * Get cityUa
     *
     * @return string
     */
    public function getCityUa()
    {
        return $this->cityUa;
    }

    /**
     * Set streetId
     *
     * @param string $streetId
     *
     * @return UkrPoshtaData
     */
    public function setStreetId($streetId)
    {
        $this->streetId = $streetId;

        return $this;
    }

    /**
     * Get streetId
     *
     * @return string
     */
    public function getStreetId()
    {
        return $this->streetId;
    }

    /**
     * Set streetUa
     *
     * @param string $streetUa
     *
     * @return UkrPoshtaData
     */
    public function setStreetUa($streetUa)
    {
        $this->streetUa = $streetUa;

        return $this;
    }

    /**
     * Get streetUa
     *
     * @return string
     */
    public function getStreetUa()
    {
        return $this->streetUa;
    }

    /**
     * Set postCod
     *
     * @param string $postCod
     *
     * @return UkrPoshtaData
     */
    public function setPostCod($postCod)
    {
        $this->postCod = $postCod;

        return $this;
    }

    /**
     * Get postCod
     *
     * @return string
     */
    public function getPostCod()
    {
        return $this->postCod;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return UkrPoshtaData
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set invoice
     *
     * @param string $invoice
     *
     * @return UkrPoshtaData
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set invoiceId
     *
     * @param string $invoiceId
     *
     * @return UkrPoshtaData
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
     * Set order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return UkrPoshtaData
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
    public function clear(){
        $this->regionId = null;
        $this->regionUa = null;
        $this->districtId = null;
        $this->districtUa = null;
        $this->cityId = null;
        $this->cityUa = null;
        $this->streetId = null;
        $this->streetUa = null;
        $this->postCod = null;
        $this->address = null;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return UkrPoshtaData
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
     * Set deliveryDate
     *
     * @param string $deliveryDate
     *
     * @return UkrPoshtaData
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
}
