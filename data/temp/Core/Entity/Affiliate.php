<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliate
 */
class Affiliate
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
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $affiliate_field;

    /**
     * @var \Core\Entity\Role
     */
    private $role;


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
     * @return Affiliate
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
     * @return Affiliate
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
     * Set surname
     *
     * @param string $surname
     * @return Affiliate
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Affiliate
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Affiliate
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Affiliate
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set affiliate_field
     *
     * @param string $affiliateField
     * @return Affiliate
     */
    public function setAffiliateField($affiliateField)
    {
        $this->affiliate_field = $affiliateField;

        return $this;
    }

    /**
     * Get affiliate_field
     *
     * @return string 
     */
    public function getAffiliateField()
    {
        return $this->affiliate_field;
    }

    /**
     * Set role
     *
     * @param \Core\Entity\Role $role
     * @return Affiliate
     */
    public function setRole(\Core\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Core\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
}
