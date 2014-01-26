<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PricingModel
 * @ORM\Entity(repositoryClass="Core\Repository\PricingModelRepository") 
 * @ORM\Table(name="pricing_model")
 * @ORM\Entity
 */
class PricingModel
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

    

}