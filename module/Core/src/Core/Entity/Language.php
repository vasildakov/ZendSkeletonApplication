<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 * @ORM\Entity(repositoryClass="Core\Repository\LanguageRepository") 
 * @ORM\Table(name="language")
 * @ORM\Entity
 */
class Language
{
    const STATUS_ACTIVE     = 1;
    const STATUS_PENDING    = 2;

    public $statusOptions = array(
                    self::STATUS_PENDING    => "Pending",
                    self::STATUS_ACTIVE  => "Active"
                );

    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=true)
     */
    private $code;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="native_name", type="string", length=255, nullable=true)
     */
    private $native_name;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;



    public function __construct()
    {
        $this->created_at = new \DateTime(); 
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
     * Set code
     *
     * @param string $code
     * @return Language
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Language
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
        return $this->name;
    }


    /**
     * Set native_name
     *
     * @param string $name
     * @return Language
     */
    public function setNativeName($native_name)
    {
        $this->native_name = $native_name;
        return $this;
    }


    /**
     * Get native_name
     *
     * @return string 
     */
    public function getNativeName()
    {
        return $this->native_name;
    }


    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return Language
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
        return $this->created_at->format("Y-m-d");
    }


    /**
     * Set status
     *
     * @param integer $status
     * @return Language
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }


    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

}
