<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteLanguage
 * @ORM\Entity(repositoryClass="Core\Repository\SiteLanguageRepository") 
 * @ORM\Table(name="site_language")
 * @ORM\Entity
 */
class SiteLanguage
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
     * @var \Core\Entity\Site
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Site")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     * })
     */
    private $site;


    /**
     * @var \Core\Entity\Language
     *
     * @ORM\OneToOne(targetEntity="Core\Entity\Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     * })
     */
    private $language;


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
     * Set site
     *
     * @param \Core\Entity\Site $site
     * @return SiteLanguage
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
     * Set language
     *
     * @param \Core\Entity\Language $language
     * @return SiteLanguage
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
