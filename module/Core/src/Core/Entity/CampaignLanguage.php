<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignLanguage
 * @ORM\Entity(repositoryClass="Core\Repository\CampaignLanguageRepository") 
 * @ORM\Table(name="campaign_language")
 * @ORM\Entity
 */
class CampaignLanguage
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
     * @var \Core\Entity\Language
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     * })
     */
    private $language;


    public function __construct() 
    {
        
    }


    /**
     * Set campaign
     *
     * @param \Core\Entity\Campaign $campaign
     * @return CampaignLanguage
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
     * Set language
     *
     * @param \Core\Entity\Language $language
     * @return CampaignLanguage
     */
    public function setLanguage(\Core\Entity\Language $language = null)
    {
        $this->language = $language;
        
        return $this;
    }


    /**
     * Get language
     *
     * @return \Core\Entity\Language 
     */
    public function getLanguage()
    {
        return $this->language;
    }


}