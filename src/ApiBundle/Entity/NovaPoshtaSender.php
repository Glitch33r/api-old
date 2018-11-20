<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDeliveryType
 *
 * @ORM\Table(name="nova_poshta_sender")
 * @ORM\Entity
 */
class NovaPoshtaSender
{
    /* YES / NO */
    const YES = 1;
    const NO = 0;

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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer", nullable=false)
     */
    private $isActive = 0;

    /**
     * @return int
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param int $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static function yesOrNo()
    {
        return
            [
                self::YES => 'YES',
                self::NO => 'NO',
            ];
    }

    public static function yesOrNoForm()
    {
        return
            [
                'YES' => self::YES,
                'NO' => self::NO,
            ];
    }

    /**
     * @return string
     */
    public function getNKey()
    {
        return $this->nKey;
    }

    /**
     * @param string $nKey
     */
    public function setNKey($nKey)
    {
        $this->nKey = $nKey;
    }
}
