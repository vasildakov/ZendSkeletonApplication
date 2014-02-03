<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * @ORM\Entity(repositoryClass="Core\Repository\CampaignRepository") 
 * @ORM\Table(name="campaign")
 * @ORM\Entity
 */
class Campaign
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=true)
     */
    private $started_at;    


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ended_at", type="datetime", nullable=true)
     */
    private $ended_at;  



    /**
     * Set name
     *
     * @param string $name
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function getName()
    {
        return $this->name;

    }



    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return Campaign
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
        //return $this->created_at;
        return $this->created_at->format('Y-m-d');
    }

    /**
     * Set started_at
     *
     * @param \DateTime $started_at
     * @return Campaign
     */
    public function setStartedAt($started_at)
    {
        $this->started_at = $started_at;
        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        //return $this->created_at;
        return $this->started_at->format('Y-m-d');
    }


    /**
     * Set ended_at
     *
     * @param \DateTime $ended_at
     * @return Campaign
     */
    public function setEndedAt($ended_at)
    {
        $this->ended_at = $ended_at;
        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getEndedAt()
    {
        return $this->ended_at->format('Y-m-d');
    }

}