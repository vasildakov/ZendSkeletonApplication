<?php
// ./module/Backoffice/src/Backoffice/Controller/CampaignController.php
namespace Backoffice\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use DoctrineModule\Validator\NoObjectExists as NoObjectExists;
use Zend\Paginator\Paginator as ZendPaginator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Core\Entity\Campaign;
use Core\Form\CampaignForm;

class CampaignController extends AbstractActionController
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
        $entityManager = $this->getEntityManager();

        $request = $this->getRequest();
        $post    = $request->getPost();
        $get     = $request->getQuery();

        $query = $this->getEntityManager()->getRepository('Core\Entity\Campaign')->getSearchQuery($get);
        $adapter = new DoctrinePaginatorAdapter(new DoctrinePaginator($query));
        $paginator = new ZendPaginator($adapter);
        $paginator->setDefaultItemCountPerPage(12);

        $page = (int)$this->params()->fromQuery('page');
        $role = (int)$this->params()->fromQuery('role');

        if($page) $paginator->setCurrentPageNumber($page); 

        return new ViewModel(array(
            'paginator'   => $paginator,
        ));
    }


    public function createAction()
    {
        #$form = new \Core\Form\Campaign\TestForm();
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TestForm');

        $request = $this->getRequest();

        if($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                $campaign = new \Core\Entity\Campaign;
                $campaign->setName($request->getPost('name'));
                $campaign->setStartedAt($request->getPost('started_at'));
                $campaign->setEndedAt($request->getPost('ended_at'));
                // var_dump($campaign);

                var_dump( array($request->getPost()));  
                
            }else {
                $messages = $form->getMessages();
                #var_dump($messages);
            }

        }


        return new ViewModel(array(
            "form" => $form,
            #"campaign" => $campaign
        ));
    }    


    public function editAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        $site = $this->getEntityManager()->find('Core\Entity\Campaign', $id);

        $form = new CampaignForm($this->getEntityManager());
        #$form->setBindOnValidate(false);
        $form->bind($site);
        $form->get('submit')->setAttribute('value', 'Save');

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            $form->setInputFilter($site->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                #return $this->redirect()->toUrl('/backoffice/user/edit/'.$id);
                return $this->redirect()->toRoute('backoffice/campaign');
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