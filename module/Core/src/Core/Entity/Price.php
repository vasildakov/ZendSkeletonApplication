<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 * @ORM\Entity(repositoryClass="Core\Repository\PriceRepository") 
 * @ORM\Table(name="price")
 * @ORM\Entity
 */
class Price
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