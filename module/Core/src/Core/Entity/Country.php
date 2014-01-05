<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * @ORM\Entity(repositoryClass="Core\Repository\CountryRepository") 
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
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
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2, nullable=true)
     */
    private $alpha2;


   /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3, nullable=true)
     */
    private $alpha3;


   /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=3, nullable=true)
     */
    private $country_code;    


   /**
     * @var string
     *
     * @ORM\Column(name="iso_3166_2", type="string", length=13, nullable=true)
     */
    private $iso_3166_2;  


   /**
     * @var string
     *
     * @ORM\Column(name="region_code", type="string", length=3, nullable=true)
     */
    private $region_code;  

   /**
     * @var string
     *
     * @ORM\Column(name="sub_region_code", type="string", length=3, nullable=true)
     */
    private $sub_region_code;  



    /**
     * Set name
     *
     * @param string $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    public function setAlpha2($alpha2) 
    {
        $this->alpha2 = $alpha2;
        return $this;
    }


    public function getAlpha2() 
    {
        return $this->alpha2;
    }



    public function setAlpha3($alpha3) 
    {
        $this->alpha3 = $alpha3;
        return $this;
    }


    public function getAlpha3() 
    {
        return $this->alpha3;
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
     * Set country_code
     *
     * @param string $countryCode
     * @return Country
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }

    /**
     * Get country_code
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set iso_3166_2
     *
     * @param string $iso31662
     * @return Country
     */
    public function setIso31662($iso31662)
    {
        $this->iso_3166_2 = $iso31662;

        return $this;
    }

    /**
     * Get iso_3166_2
     *
     * @return string 
     */
    public function getIso31662()
    {
        return $this->iso_3166_2;
    }

    /**
     * Set region_code
     *
     * @param string $regionCode
     * @return Country
     */
    public function setRegionCode($regionCode)
    {
        $this->region_code = $regionCode;

        return $this;
    }

    /**
     * Get region_code
     *
     * @return string 
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }

    /**
     * Set sub_region_code
     *
     * @param string $subRegionCode
     * @return Country
     */
    public function setSubRegionCode($subRegionCode)
    {
        $this->sub_region_code = $subRegionCode;

        return $this;
    }

    /**
     * Get sub_region_code
     *
     * @return string 
     */
    public function getSubRegionCode()
    {
        return $this->sub_region_code;
    }
}
