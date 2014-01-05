<?php
// ./module/Backoffice/src/Backoffice/Controller/CountryController.php
namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class CountryController extends AbstractActionController
{

    public function indexAction()
    {
    	$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

    	$repository = $entityManager->getRepository('Core\Entity\Country')->findAll();

    	var_dump($repository);

        return new ViewModel(array(
        	"languages" => $repository
        ));
    }


}