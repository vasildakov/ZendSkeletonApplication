<?php

namespace Core\Entity;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;


/**
 * Click
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\EntityListeners({"Core\Listener\ClickListener"})
 * @ORM\Entity(repositoryClass="Core\Repository\ClickRepository") 
 * @ORM\Table(name="click", options={"engine" = "MyISAM" })
 */
class Click
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
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;


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
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Set comment
     *
     * @param string $comment
     * @return Click
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
}
