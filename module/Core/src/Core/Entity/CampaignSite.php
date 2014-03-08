<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignSite
 * @ORM\Entity(repositoryClass="Core\Repository\CampaignSiteRepository") 
 * @ORM\Table(name="campaign_site")
 * @ORM\Entity
 */
class CampaignSite
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
     * @var \Core\Entity\Campaign
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Campaign")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     * })
     */
    private $campaign;


    /**
     * @var \Core\Entity\Site
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Site")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     * })
     */
    private $site;


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
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;



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


    /**
     * Set Campaign
     *
     * @param \Core\Entity\Campaign $campaign
     * @return CampaignSite
     */
    public function setCampaign(\Core\Entity\Campaign $campaign = null)
    {
        $this->campaign = $campaign;
        
        return $this;
    }


    /**
     * Get campaign
     *
     * @return \Core\Entity\Campaign 
     */
    public function getCampaign()
    {
        return $this->campaign;
    }


    /**
     * Set site
     *
     * @param \Core\Entity\Site $site
     * @return CampaignSite
     */
    public function setSite(\Core\Entity\Site $site = null)
    {
        $this->site = $site;
        
        return $this;
    }


    /**
     * Get site
     *
     * @return \Core\Entity\Site 
     */
    public function getSite()
    {
        return $this->site;
    }


    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return CampaignSite
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
     * Set started_at
     *
     * @param \DateTime $startedAt
     * @return CampaignSite
     */
    public function setStartedAt($startedAt)
    {
        $this->started_at = $startedAt;

        return $this;
    }

    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        return $this->started_at;
    }

    /**
     * Set ended_at
     *
     * @param \DateTime $endedAt
     * @return CampaignSite
     */
    public function setEndedAt($endedAt)
    {
        $this->ended_at = $endedAt;

        return $this;
    }

    /**
     * Get ended_at
     *
     * @return \DateTime 
     */
    public function getEndedAt()
    {
        return $this->ended_at;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CampaignSite
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
}
