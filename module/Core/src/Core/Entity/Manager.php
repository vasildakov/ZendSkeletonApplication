<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manager
 * 
 * @ORM\Entity
 * @ORM\Table(name="manager")
 */

class Manager extends User
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
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;


    /**
     * @var string
     *
     * @ORM\Column(name="manager_field", type="string", length=255, nullable=true)
     */
    private $manager_field;

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    
    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Manager
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set manager_field
     *
     * @param string $managerField
     * @return Manager
     */
    public function setManagerField($managerField)
    {
        $this->manager_field = $managerField;
        return $this;
    }

    /**
     * Get manager_field
     *
     * @return string 
     */
    public function getManagerField()
    {
        return $this->manager_field;
    }
}
