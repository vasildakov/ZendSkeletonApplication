<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impression
 * @ORM\Entity(repositoryClass="Core\Repository\RevenueRepository") 
 * @ORM\Table(name="revenue", options={"engine" = "MyISAM" })
 * @ORM\Entity
 */
class Revenue
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
