<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 * @ORM\Entity(repositoryClass="Core\Repository\RateRepository") 
 * @ORM\Table(name="rate")
 * @ORM\Entity
 */
class Rate
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;  


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;

    
    /**
     * @var \Core\Entity\Campaign
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Campaign")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     * })
     */
    private $campaign;


    /**
     * @var \Core\Entity\Currency
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     * })
     */
    private $currency;


    public function __construct() 
    {
        
    }

}