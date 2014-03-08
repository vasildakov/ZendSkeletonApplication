<?php
/**
 * Conversion table have to be  
 */

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversion
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Core\Repository\ConversionRepository") 
 * @ORM\Table(name="conversion")
 */
class Conversion
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
     * YYYY-MM-TYPE-CAMPAIGN-SITE eg. 2014-01-1-99-123456
     * 
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;



    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $user_id;


    /**
     * @var integer
     *
     * @ORM\Column(name="campaign_id", type="integer", nullable=true)
     */
    private $campaign_id;


    /**
     * @var integer
     *
     * @ORM\Column(name="site_id", type="integer", nullable=true)
     */
    private $site_id;


    /**
     * @var integer
     *
     * @ORM\Column(name="rate_id", type="integer", nullable=true)
     */
    private $rate_id;


    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;


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



    public function setSiteId($site_id) 
    {
        $this->site_id = $site_id;
        return $this;
    }


    public function setCampaignId($campaign_id) 
    {
        $this->campaign_id = $campaign_id;
        return $this;
    }



    /**
     * Set reference
     *
     * @param string $reference
     * @return Conversion
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }


    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return Conversion
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get campaign_id
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Get site_id
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set rate_id
     *
     * @param integer $rateId
     * @return Conversion
     */
    public function setRateId($rateId)
    {
        $this->rate_id = $rateId;

        return $this;
    }

    /**
     * Get rate_id
     *
     * @return integer 
     */
    public function getRateId()
    {
        return $this->rate_id;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Conversion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Conversion
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
