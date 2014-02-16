<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Campaign
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Core\Repository\CampaignRepository") 
 * @ORM\Table(name="campaign")
 */
class Campaign implements InputFilterAwareInterface
{

    protected $inputFilter;

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
     * @var \Core\Entity\Operator
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Operator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operator_id", referencedColumnName="id")
     * })
     */
    private $operator;



    public function __construct() 
    {
        $this->created_at = new \DateTime(); 
    }

    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }


    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }


    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        $this->id       = $data['id'];
        $this->name     = $data['name'];
        $this->operator = $data['operator'];
        
    }


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter() 
    {
        if (!$this->inputFilter) {

            $inputFilter = new InputFilter();

            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 100,
                        ),
                    ),
                ),
            )));

            // @TODO: Add input filters for the other field


            $this->inputFilter = $inputFilter;  
        }

        return $this->inputFilter;
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
     * Set name
     *
     * @param string $name
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }



    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return Campaign
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        //return $this->created_at;
        return $this->created_at->format('Y-m-d');
    }


    /**
     * Set started_at
     *
     * @param \DateTime $started_at
     * @return Campaign
     */
    public function setStartedAt($started_at)
    {
        $this->started_at = $started_at;

        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        //return $this->created_at;
        return $this->started_at->format('Y-m-d');
    }


    /**
     * Set ended_at
     *
     * @param \DateTime $ended_at
     * @return Campaign
     */
    public function setEndedAt($ended_at)
    {
        $this->ended_at = $ended_at;

        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getEndedAt()
    {
        return $this->ended_at->format('Y-m-d');
    }


    /**
     * Set operator
     *
     * @param \Core\Entity\Operator $operator
     * @return Campaign
     */
    public function setOperator(\Core\Entity\Operator $operator = null)
    {
        $this->operator = $operator;
        
        return $this;
    }


    /**
     * Get operator
     *
     * @return \Core\Entity\Operator 
     */
    public function getOperator()
    {
        return $this->operator;
    }


}