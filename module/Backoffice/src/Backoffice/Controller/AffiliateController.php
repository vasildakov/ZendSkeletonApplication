<?php
// ./module/Backoffice/src/Backoffice/Controller/AffiliateController.php

/**
 * Affiliate Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Backoffice\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use DoctrineModule\Validator\NoObjectExists as NoObjectExists;
use Zend\Paginator\Paginator as ZendPaginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AffiliateController extends AbstractActionController
{

    public function indexAction()
    {

    	$form = new \Core\Form\UserSearchForm();
    	$request = $this->getRequest();

		$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        // see http://doctrine-orm.readthedocs.org/en/2.0.x/reference/query-builder.html
        // the search query must be moved in the entity repository
		$qb = $entityManager->createQueryBuilder();
		$qb->from('Core\Entity\Affiliate', 'a');
		$qb->select("a");

		if($request->isPost()) {

    		$form->setData($request->getPost());

            // search by username
		    if($this->params()->fromPost('username')) {
	            $qb->andWhere('a.username = :username');
	            $qb->setParameter('username', $this->params()->fromPost('username'));
		    } 

            // search by name
            if($this->params()->fromPost('name')) {
                $qb->andWhere('a.name = :name');
                $qb->setParameter('name', $this->params()->fromPost('name'));
            } 

            // order by 
        	$qb->orderBy('a.id', 'desc');
    	}

        $query = $qb->getQuery();

    	$adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));
        
        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(15);
        
        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page); 


	    return new ViewModel(array(
	    	'form' => $form,
	    	'paginator' => $paginator,
	    ));
    }
}