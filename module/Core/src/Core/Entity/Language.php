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
                    self::STATUS_ACTIVE     => "Active"
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
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;



    public function __construct()
    {
        $this->created = new \DateTime(); 
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
     * Set created
     *
     * @param \DateTime $created
     * @return Language
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }


    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created->format("Y-m-d");
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
