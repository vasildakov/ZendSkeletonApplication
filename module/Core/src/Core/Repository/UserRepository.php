<?php // Core/Repository/UserRepository.php
/**
 * http://mackstar.com/blog/2010/10/04/using-repositories-doctrine-2
 * http://stackoverflow.com/questions/9214471/count-rows-in-doctrine-querybuilder
 * http://www.wjgilmore.com/blog/entry/the_power_of_doctrine_2s_custom_repositories_and_native_queries
 * http://weavora.com/blog/2013/08/23/how-we-organize-doctrine2-repositories/
 */

namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class UserRepository extends EntityRepository {
    

    public function getTest() 
    {

        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');
        $qb->orderBy('u.id');
        $qb->setFirstResult( $offset );
        $qb->setMaxResults( $limit );
        
        return $qb->getQuery()->getResult();
    }


    /**
     * Returns Doctrine Query Object
     * 
     * @param Zend\Stdlib\Parameters $params 
     * @return  Doctrine Query object
     */
    public function getSearchQuery(\Zend\Stdlib\Parameters $params) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        if(!empty($params->username) ) {
            $qb->andWhere('u.username = :username');
            $qb->setParameter('username', $params->username);
        }

        if(!empty($params->name) ) {
            $qb->andWhere('u.name = :name');
            $qb->setParameter('name', $params->name);
        }

        if(!empty($params->role) ) {
            $qb->andWhere('u.role = :role');
            $qb->setParameter('role', $params->role);
        }

        $qb->orderBy('u.id', 'DESC');

        #$qb->setFirstResult( $offset );
        #$qb->setMaxResults( $limit );

        return $qb->getQuery();
        //return $qb->getQuery()->getResult();
    }


    /**
     * Just a test
     */
    public function findAll() 
    {
        //$dql = "SELECT s FROM Core\Entity\User u";
        //$query = $this->_em->createQuery($dql);

        return $this->select('u')
            ->from('Core\Entity\User', 'u')
            ->getQuery()
            ->getResult();
    }
    

    /**
     * Just a test
     */
    public function findById($id) 
    {
        return $this->_em->findOneBy(array('id' => $id));
    }


    
    /**
     * Just a test
     */
    public function getPaginator($offset, $limit)
    {
    	$dql = "SELECT s FROM Core\Entity\User u";
    	$query = $this->_em->createQuery($dql)
            ->setFirstResult($offset)->setMaxResults($limit);

    	$paginator = new Paginator($query);
    	return $paginator;
    }   

}