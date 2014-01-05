<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AffiliatePreference
 * 
 * @ORM\Entity
 * @ORM\Table(name="affiliate_preference")
 */

class AffiliatePreference
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
     * @var \Core\Entity\Affiliate
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Affiliate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="affiliate_id", referencedColumnName="id")
     * })
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
