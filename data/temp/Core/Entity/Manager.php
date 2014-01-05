<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manager
 */
class Manager
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
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
     * @return Manager
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
