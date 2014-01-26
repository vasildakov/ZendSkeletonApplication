<?php
// Core/Repository/LanguageRepository.php
namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class LanguageRepository extends EntityRepository 
{
	public function fetchByStatus() 
	{
        $qb = $this->_em->createQueryBuilder();
        $qb->select('l');
        $qb->from('Core\Entity\Language', 'l');	
        $qb->andWhere('l.status = :status');
        $qb->setParameter('status', 2);
        return $qb->getQuery()->getResult();
    }
}