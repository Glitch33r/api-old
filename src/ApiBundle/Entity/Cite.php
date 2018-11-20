<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cite
 *
 * @ORM\Table(name="cite_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\CiteRepository")
 */
class Cite
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public  function __toString()
    {
        return $this->id ? (string)$this->id : 'new';
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cite
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}
