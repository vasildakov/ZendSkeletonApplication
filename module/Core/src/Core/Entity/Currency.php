<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 * 
 * @ORM\Entity(repositoryClass="Core\Repository\CurrencyRepository") 
 * @ORM\Table(name="currency")
 * @ORM\Entity
 */
class Currency
{
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
     * @ORM\Column(name="cc", type="string", length=255, nullable=true)
     */
    private $cc;      


    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=255, nullable=true)
     */
    private $symbol;      


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name; 


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;


    public function __construct() 
    {
        
    }

    
    public function getId() 
    {
    	$this->id;
    }


    /**
     * Set cc
     *
     * @param string $cc
     * @return Currency
     */
    public function setCc($cc) 
    {
        $this->cc = $cc;
        return $this;
    }


    public function getCc() {
    	$this->cc;
    }


    /**
     * Set symbol
     *
     * @param string $cc
     * @return Currency
     */
    public function setSymbol($symbol) 
    {
        $this->symbol = $symbol;
        return $this;
    }


    public function getSymbol() 
    {
    	$this->symbol;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Currency
     */
    public function setName($name) 
    {
        $this->name = $name;
        return $this;
    }


    public function getName() 
    {
    	$this->name;
    }

}

