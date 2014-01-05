<?php
/**
 * A mapped superclass cannot be an entity, it is not query-able and persistent relationships defined by a 
 * mapped superclass must be unidirectional (with an owning side only). This means that One-To-Many 
 * assocations are not possible on a mapped superclass at all. Furthermore Many-To-Many associations are 
 * only possible if the mapped superclass is only used in exactly one entity at the moment. For further support of 
 * inheritance, the single or joined table inheritance features have to be used.
 */

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="role_id", type="integer")
 * @ORM\DiscriminatorMap({"affiliate" = "Affiliate", "manager" = "Manager"})
 */
class User
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
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;




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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * @return User
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
     * @return User
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
     * @param \DateTime $created_at
     * @return User
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
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
     * @return User
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
     * Set role
     *
     * @param \Core\Entity\Role $role
     * @return User
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
