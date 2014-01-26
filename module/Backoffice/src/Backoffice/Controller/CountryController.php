<?php
// ./module/Backoffice/src/Backoffice/Controller/CountryController.php
namespace Backoffice\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use DoctrineModule\Validator\NoObjectExists as NoObjectExists;
use Zend\Paginator\Paginator as ZendPaginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class CountryController extends AbstractActionController
{

    public function indexAction()
    {
    	 #$repository = $entityManager->getRepository('Core\Entity\Country')->findAll();
		#var_dump($repository);

    	$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

		$qb = $entityManager->createQueryBuilder();
		$qb->from('Core\Entity\Country', 'c');
		$qb->select("c");
        $query = $qb->getQuery();

    	$adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));
        
        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(15);
        
        $page = (int)$this->params()->fromQuery('page');
        if($page) $paginator->setCurrentPageNumber($page); 


        return new ViewModel(array(
        	'paginator' => $paginator,
        ));
    }


}