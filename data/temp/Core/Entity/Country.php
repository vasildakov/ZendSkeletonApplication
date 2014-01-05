<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 */
class Country
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $alpha2;

    /**
     * @var string
     */
    private $alpha3;

    /**
     * @var string
     */
    private $country_code;

    /**
     * @var string
     */
    private $iso_3166_2;

    /**
     * @var string
     */
    private $region_code;

    /**
     * @var string
     */
    private $sub_region_code;


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

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Country
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Country
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
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
