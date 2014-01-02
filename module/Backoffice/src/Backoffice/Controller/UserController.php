<?php
/**
 * User Controller
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

class UserController extends AbstractActionController
{

    public function indexAction()
    {
 


    	$form = new \Core\Form\UserSearchForm();
    	$request = $this->getRequest();

		
		$qb = $em->createQueryBuilder();
		$qb->from('Core\Entity\Affiliate', 'u');
		$qb->select("u");

		if($request->isPost()) {

    		$form->setData($request->getPost());

		    if($this->params()->fromPost('username')) {
	            $qb->where('u.username = :username');
	            $qb->setParameter('username', $this->params()->fromPost('username'));
		    } 

        	$qb->orderBy('u.id', 'desc');
    	} 

        $query = $qb->getQuery();

    	$adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));
        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(10);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page); 


	    return new ViewModel(array(
	    	'form' => $form,
	    	'paginator' => $paginator,
	    ));
    }
}
