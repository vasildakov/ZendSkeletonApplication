<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPreference
 * 
 * @ORM\Entity
 * @ORM\Table(name="user_preference")
 */

class UserPreference
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
     * @var \Core\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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
     * Set user
     *
     * @param \Core\Entity\User $user
     * @return User
     */
    public function setUser(\Core\Entity\Affiliate $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get affiliate
     *
     * @return \Core\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
