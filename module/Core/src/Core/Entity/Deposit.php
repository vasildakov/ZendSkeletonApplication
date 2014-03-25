<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deposit
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Core\Repository\DepositRepository") 
 * @ORM\Table(name="deposit", options={"engine" = "MyISAM" })
 */
class Deposit
{
    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    public function __construct() 
    {
        
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
