<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 * @ORM\Entity(repositoryClass="Core\Repository\PaymentRepository") 
 * @ORM\Table(name="payment")
 * @ORM\Entity
 */
class Payment
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