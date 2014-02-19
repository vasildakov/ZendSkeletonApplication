<?php
// ./module/Core/src/Core/View/Helper/TestHelper.php

/**
 * TestHelper
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\View\Helper;

use Doctrine\ORM\EntityManager;
use Zend\Http\Request;
use Zend\View\Helper\AbstractHelper;
 
class TestHelper extends AbstractHelper
{
    protected $entityManager;
 
 	/**
 	 * @param  object $entityManager  Doctrine EntityManager
 	 */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * Returns the total number of records
     * 
     * @param string $entity  Doctrine entity class name
     * @return int  $count  The total number of records
     */
    public function __invoke($entity = null, $status = null)
    {
    	if( !empty($entity) and class_exists("Core\\Entity\\$entity", true) ) {
	    	$qb = $this->entityManager->createQueryBuilder();
	    	$qb->select('count(e.id)');
	    	$qb->from("Core\\Entity\\$entity", 'e');

	    	$count = $qb->getQuery()->getSingleScalarResult();
	    	return $count;
	    	
    	}

    	// if the entity is not exist
    	return -1; 
    }

}