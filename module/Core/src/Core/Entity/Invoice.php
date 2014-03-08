<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 * @ORM\Entity(repositoryClass="Core\Repository\InvoiceRepository") 
 * @ORM\Table(name="invoice")
 * @ORM\Entity
 */
class Invoice
{
    const STATUS_PAID       = 1;
    const STATUS_PENDING    = 2;

    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var \Core\Entity\Operator
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Operator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operator", referencedColumnName="id")
     * })
     */
    private $operator;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;
    
    


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
     * Set created
     *
     * @param \DateTime $created
     * @return Invoice
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set operator
     *
     * @param \Core\Entity\Operator $operator
     * @return Invoice
     */
    public function setOperator(\Core\Entity\Operator $operator = null)
    {
        $this->operator = $operator;

        return $this;
    }


    /**
     * Get operator
     *
     * @return \Core\Entity\Operator 
     */
    public function getOperator()
    {
        return $this->operator;
    }
}
