<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Click
 * @ORM\Entity(repositoryClass="Core\Repository\ClickRepository") 
 * @ORM\Table(name="click", options={"engine" = "MyISAM" })
 * @ORM\Entity
 */
class Click
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