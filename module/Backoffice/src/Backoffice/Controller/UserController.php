<?php
// ./module/Backoffice/src/Backoffice/Controller/UserController.php

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

    public function getEntityManager() 
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }


    public function indexAction()
    {
 
        $entityManager = $this->getEntityManager();

        $request = $this->getRequest();
        $post    = $request->getPost();
        $get     = $request->getQuery();

        $query = $this->getEntityManager()->getRepository('Core\Entity\User')->getSearchQuery($get);



        // get the search form via factory
        // $form = $this->getServiceLocator()->get('Core\Form\User\Search');

    	$form = new \Core\Form\User\Search($entityManager);
        #$form->setData($request->getPost());
        $form->setData($request->getQuery()); // set form data from query

    	$adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));
        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(12);

        

        $page = (int)$this->params()->fromQuery('page');
        $role = (int)$this->params()->fromQuery('role');

        if($page) $paginator->setCurrentPageNumber($page); 

        // set variable to layout
        $this->layout()->setVariable('title', 'Users');


	    return new ViewModel(array(
	    	'form'        => $form,
	    	'paginator'   => $paginator,
            'pageAction'  => 'backoffice/user',
            'page'        => $page,
            'role'        => $role,
	    ));
    }



    public function test() 
    {
        /*
        $qb = $entityManager->createQueryBuilder();
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
        */
    }



}
