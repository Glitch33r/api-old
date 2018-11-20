<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OfferNews
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="contact_message_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\ContactMessageRepository")
 */
class ContactMessage
{
    public $types =[
        'mail' => 'письмо',
        'money' => 'сообщение об оплате',
        'order' => 'проблемы с заказом',
        'boss' => 'письмо руководителю',
        'error' => 'сообщить об ошибке'
    ];
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
    private $fio;
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string - news text
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @var string - type
     *
     * avaliable types: mail , money, order
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('mail', 'money', 'order', 'boss', 'call','error')" ,nullable=false)
     */
    private $type = "mail";


    /**
     * Constructor
     */
    public function __construct()
    {
    }
    public function __toString()
    {
        return $this->id ? (string)$this->id : 'new';
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
     * Set text
     *
     * @param string $text
     *
     * @return ContactMessage
     */
    public function setText($text)
    {
        $this->text= $text;

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
     * Set type
     *
     * @param string $type
     *
     * @return ContactMessage
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return ContactMessage
     */
    public function setCreatedAt($createdAt)
    {

        $this->createdAt= \DateTime::createFromFormat('d-m-Y', $createdAt);
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
        return $this->createdAt->format( "d-m-Y" );
    }

    /**
     * Set fio
     *
     * @param string $fio
     *
     * @return ContactMessage
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio
     *
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return ContactMessage
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContactMessage
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
