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

}