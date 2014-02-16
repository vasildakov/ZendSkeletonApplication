<?php
// Core/Repository/CampaignRepository.php
namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class CampaignRepository extends EntityRepository {

    /**
     * Returns Doctrine Query Object
     * 
     * @param Zend\Stdlib\Parameters $params 
     * @return  Doctrine Query object
     */
    public function getSearchQuery(\Zend\Stdlib\Parameters $params) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('c');
        $qb->from('Core\Entity\Campaign', 'c');

        if(!empty($params->id) ) {
            $qb->andWhere('c.id = :id');
            $qb->setParameter('id', $params->id);
        }

        if(!empty($params->name) ) {
            $qb->andWhere('c.name = :name');
            $qb->setParameter('name', $params->name);
        }

        
        if(!empty($params->operator) ) {
            $qb->andWhere('c.operator = :operator');
            $qb->setParameter('operator', $params->operator);
        }

        if(!empty($params->language) ) {
        	// http://stackoverflow.com/questions/15087933/how-to-do-left-join-in-doctrine
        	$qb->leftJoin('c.language', 'l');
            $qb->andWhere('l.id = :language');
            $qb->setParameter('language', $params->language);
        }

        /*
        if(!empty($params->role) ) {
            $qb->andWhere('c.role = :role');
            $qb->setParameter('role', $params->role);
        }
        */

        $qb->orderBy('c.id', 'DESC');

        return $qb->getQuery();

    }
}