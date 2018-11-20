<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/13/2016
 * Time: 04:44 PM
 */
namespace ApiBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * UkrPoshtaRegion
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="ukr_poshta_region_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\UkrPoshtaRegionRepository")
 */
class UkrPoshtaRegion{
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
     * @ORM\Column(name="region_id", type="integer", nullable=false)
     */
    private $regId;
    /**
     * @var string
     *
     * @ORM\Column(name="region_ua", type="text", nullable=false)
     */
    private $regUa;
    /**
     * @var string
     *
     * @ORM\Column(name="region_ru", type="text", nullable=false)
     */
    private $regRu;
    /**
     * @var string
     *
     * @ORM\Column(name="region_en", type="text", nullable=false)
     */
    private $regEn;

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
     * Set regId
     *
     * @param integer $regId
     *
     * @return UkrPoshtaRegion
     */
    public function setRegId($regId)
    {
        $this->regId = $regId;

        return $this;
    }

    /**
     * Get regId
     *
     * @return integer
     */
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * Set regUa
     *
     * @param string $regUa
     *
     * @return UkrPoshtaRegion
     */
    public function setRegUa($regUa)
    {
        $this->regUa = $regUa;

        return $this;
    }

    /**
     * Get regUa
     *
     * @return string
     */
    public function getRegUa()
    {
        return $this->regUa;
    }

    /**
     * Set regRu
     *
     * @param string $regRu
     *
     * @return UkrPoshtaRegion
     */
    public function setRegRu($regRu)
    {
        $this->regRu = $regRu;

        return $this;
    }

    /**
     * Get regRu
     *
     * @return string
     */
    public function getRegRu()
    {
        return $this->regRu;
    }

    /**
     * Set regEn
     *
     * @param string $regEn
     *
     * @return UkrPoshtaRegion
     */
    public function setRegEn($regEn)
    {
        $this->regEn = $regEn;

        return $this;
    }

    /**
     * Get regEn
     *
     * @return string
     */
    public function getRegEn()
    {
        return $this->regEn;
    }
}
