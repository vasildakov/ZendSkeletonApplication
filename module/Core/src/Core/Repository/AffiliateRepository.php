<?php
// Core/Repository/AffiliateRepository.php
// http://docs.doctrine-project.org/en/latest/reference/query-builder.html

namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class AffiliateRepository extends EntityRepository {
    

	/**
	 * Returns Doctrine Query Object
	 * 
	 * @param Zend\Stdlib\Parameters $params 
	 * @return 	Doctrine Query object
	 */
    public function getSearchQuery(\Zend\Stdlib\Parameters $params) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('a');
        $qb->from('Core\Entity\Affiliate', 'a');

        if(!empty($params->username) ) {
        	$qb->andWhere('a.username = :username');
        	$qb->setParameter('username', $params->username);
        }

        if(!empty($params->name) ) {
        	$qb->andWhere('a.name = :name');
        	$qb->setParameter('name', $params->name);
        }

        $qb->orderBy('a.id', 'DESC');

        #$qb->setFirstResult( $offset );
        #$qb->setMaxResults( $limit );

        return $qb->getQuery();
        //return $qb->getQuery()->getResult();
    }

}