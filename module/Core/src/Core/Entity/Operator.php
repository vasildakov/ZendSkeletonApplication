<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Operator
 * @ORM\Entity(repositoryClass="Core\Repository\OperatorRepository") 
 * @ORM\Table(name="operator")
 * @ORM\Entity
 */
class Operator
{
    /**
     * @var Operator
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;  


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    public function __construct() 
    {
        $this->invoices = new ArrayCollection();
        
        $this->created_at = new \DateTime();
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Operator
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Operator
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return User
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        //return $this->created_at;
        return $this->created_at->format('Y-m-d');
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
}
