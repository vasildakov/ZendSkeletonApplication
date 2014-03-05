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

use Core\Entity\User;
use Core\Form\UserForm;

class UserController extends AbstractActionController
{

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getEntityManager() 
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;

        // return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
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


    // http://www.jasongrimes.org/2012/01/using-doctrine-2-in-zend-framework-2/
    public function editAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        $user = $this->getEntityManager()->find('Core\Entity\User', $id);

        $form = new UserForm($this->getEntityManager());
        #$form->setBindOnValidate(false);
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                #return $this->redirect()->toUrl('/backoffice/user/edit/'.$id);
                return $this->redirect()->toRoute('backoffice/user');
            }else {
                exit("here");
            }
        }

        return new ViewModel(array(
            'id' => $id,
            'form' => $form,
        ));
    }



    public function deleteAction() 
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        if (!$id) {
            return $this->redirect()->toRoute('backoffice/user');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $user = $this->getEntityManager()->find('Core\Entity\User', $id);

                if ($user) {
                    $this->getEntityManager()->remove($user);
                    $this->getEntityManager()->flush();
                }
            }

             // Redirect to list of users
            return $this->redirect()->toRoute('backoffice/user');
        }

        return array(
            'id' => $id,
            'user' => $this->getEntityManager()->find('Core\Entity\User', $id)
        );
        
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
