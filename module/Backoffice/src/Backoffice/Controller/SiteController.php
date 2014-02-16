<?php
// ./module/Backoffice/src/Backoffice/Controller/SiteController.php

/**
 * Site Controller
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

use Core\Entity\Site;
use Core\Form\SiteForm;

class SiteController extends AbstractActionController
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
    }


    public function indexAction()
    {
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $qb = $entityManager->createQueryBuilder()
              ->from('Core\Entity\Site', 's')
              ->select("s")
              ->orderBy('s.id', 'desc');
        
        $query = $qb->getQuery();

        $adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));

        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(15);

        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page); 

        // var_dump($paginator);

        return new ViewModel(array(
                    //'form' => $form,
                    'paginator' => $paginator,
                    //'systemPlugin' => $systemPlugin,
                    // 'decorator' => $decorator
                ));
    }

    public function editAction()
    {

        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        $site = $this->getEntityManager()->find('Core\Entity\Site', $id);

        $form = new SiteForm($this->getEntityManager());
        #$form->setBindOnValidate(false);
        $form->bind($site);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            $form->setInputFilter($site->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                #return $this->redirect()->toUrl('/backoffice/user/edit/'.$id);
                return $this->redirect()->toRoute('backoffice/site');
            }else {
                exit("here");
            }
        }

        return new ViewModel(array(
            'id' => $id,
            'form' => $form,
        ));
    }

}
