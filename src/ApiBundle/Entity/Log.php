<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Log
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\LogRepository")
 */
class Log
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
     * @ORM\Column(name="event", type="string", length=45, nullable=true)
     */
    private $event;
    /**
     * @var string
     *
     * @ORM\Column(name="entity", type="string", length=128, nullable=true)
     */
    private $entity;
    /**
     * @var string
     *
     * @ORM\Column(name="entity_id", type="string", length=128, nullable=true)
     */
    private $entityId;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="username", type="string", nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="user_ip", type="string", length=45, nullable=true)
     */
    private $userIp;
    /**
     * @var string
     *
     * @ORM\Column(name="changed_fields", type="text", nullable=true)
     */
    private $fields;
    /**
     * @var string
     *
     * @ORM\Column(name="parent_entity", type="string", length=45 , nullable=true)
     */
    private $parentEntity;
    /**
     * @var string
     *
     * @ORM\Column(name="parent_entity_id", type="string",length=45 , nullable=true)
     */
    private $parentEntityId;

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
     * Set event
     *
     * @param string $event
     *
     * @return Log
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return Log
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entityId
     *
     * @param string $entityId
     *
     * @return Log
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Log
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
     * Set username
     *
     * @param integer $username
     *
     * @return Log
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return integer
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set userIp
     *
     * @param string $userIp
     *
     * @return Log
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;

        return $this;
    }

    /**
     * Get userIp
     *
     * @return string
     */
    public function getUserIp()
    {
        return $this->userIp;
    }

    /**
     * Set fields
     *
     * @param string $fields
     *
     * @return Log
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Get fields
     *
     * @return string
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set parentEntity
     *
     * @param string $parentEntity
     *
     * @return Log
     */
    public function setParentEntity($parentEntity)
    {
        $this->parentEntity = $parentEntity;

        return $this;
    }

    /**
     * Get parentEntity
     *
     * @return string
     */
    public function getParentEntity()
    {
        return $this->parentEntity;
    }

    /**
     * Set parentEntityId
     *
     * @param string $parentEntityId
     *
     * @return Log
     */
    public function setParentEntityId($parentEntityId)
    {
        $this->parentEntityId = $parentEntityId;

        return $this;
    }

    /**
     * Get parentEntityId
     *
     * @return string
     */
    public function getParentEntityId()
    {
        return $this->parentEntityId;
    }
}
