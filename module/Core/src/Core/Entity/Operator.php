<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operator
 * @ORM\Entity(repositoryClass="Core\Repository\OperatorRepository") 
 * @ORM\Table(name="operator")
 * @ORM\Entity
 */
class Operator
{
    /**
     * @var Operator
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;  

}