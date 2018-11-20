<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/19/2016
 * Time: 05:07 PM
 */
namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * StaticContent
 *
 * @ORM\Table(name="recall_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\RecallRepository")
 */
class Recall
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
     *
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User",inversedBy="recalls")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string - status
     *
     * avaliable statuses: new , answered
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum('new', 'answered')" ,nullable=false)
     */
    private $status = "new";

    /**
     * @var string - text
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;
    /**
     * @var string - text
     *
     * @ORM\Column(name="answer", type="text", nullable=true)
     */
    private $answer;
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="updated_at",type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="respondent_name", type="string", length=255, nullable=true)
     */
    private $respondentName;

    // *
    //  * @Recaptcha\IsTrue
     
    // public $recaptcha;

    /**
     * @return string
     */
    public function getRespondentName()
    {
        return $this->respondentName;
    }

    /**
     * @param string $respondentName
     */
    public function setRespondentName($respondentName)
    {
        $this->respondentName = $respondentName;
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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function __toString()
    {
        return $this->id ? (string)$this->id : 'new';
    }
    /**
     * Set status
     *
     * @param string $status
     *
     * @return Recall
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
     * Set text
     *
     * @param string $text
     *
     * @return Recall
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
     * Set answer
     *
     * @param string $answer
     *
     * @return Recall
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return Recall
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Recall
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt= \DateTime::createFromFormat('d-m-Y H:i', $updatedAt);

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        if (is_null($this->updatedAt))
            return $this->updatedAt;
        return $this->updatedAt->format( "d-m-Y H:i" );
    }

    /**
     * Set user
     *
     * @param \ApiBundle\Entity\User $user
     *
     * @return Recall
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
     * Set fio
     *
     * @param string $fio
     *
     * @return Recall
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
     * @return Recall
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
     * @return Recall
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

    /**
     * @return mixed
     */
    public function getRecaptcha()
    {
        return $this->recaptcha;
    }

    /**
     * @param mixed $recaptcha
     */
    public function setRecaptcha($recaptcha)
    {
        $this->recaptcha = $recaptcha;
    }
}
