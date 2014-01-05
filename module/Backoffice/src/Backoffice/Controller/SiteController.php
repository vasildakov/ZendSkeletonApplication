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

class SiteController extends AbstractActionController
{

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
}
