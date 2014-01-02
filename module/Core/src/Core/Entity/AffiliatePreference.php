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
}