<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AffiliatePreference
 */
class AffiliatePreference
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Core\Entity\Affiliate
     */
    private $affiliate;


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
     * Set affiliate
     *
     * @param \Core\Entity\Affiliate $affiliate
     * @return AffiliatePreference
     */
    public function setAffiliate(\Core\Entity\Affiliate $affiliate = null)
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    /**
     * Get affiliate
     *
     * @return \Core\Entity\Affiliate 
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }
}
