<?php
// Core/Repository/UserRepository.php
namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class UserRepository extends EntityRepository {
    


    public function getPaginated($params) 
    {
        $db = $this->select('u');
        $db = $this->from('Core\Entity\User', 'u')

        return $db->getQuery();
            
            
    }


    public function findAll() 
    {
        //$dql = "SELECT s FROM Core\Entity\User u";
        //$query = $this->_em->createQuery($dql);

        return $this->select('u')
            ->from('Core\Entity\User', 'u')
            ->getQuery()
            ->getResult();
    }


    public function findById($id) 
    {
        return $this->_em->findOneBy(array('id' => $id));
    }


    

    public function getPaginator($offset, $limit)
    {
    	$dql = "SELECT s FROM Core\Entity\User u";
    	$query = $this->_em->createQuery($dql)
            ->setFirstResult($offset)->setMaxResults($limit);

    	$paginator = new Paginator($query);
    	return $paginator;
    }    
}