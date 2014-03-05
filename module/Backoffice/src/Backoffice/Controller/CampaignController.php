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
        $form = new \Core\Form\CampaignForm($this->getEntityManager());

        $request = $this->getRequest();

        if($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                $operatorId  = $this->getRequest()->getPost('operator');
                $languageIds = $this->getRequest()->getPost('language');
                $started_at  = $this->getRequest()->getPost('started_at');
                $ended_at    = $this->getRequest()->getPost('ended_at');

                $operator    = $this->getEntityManager()->find('Core\Entity\Operator', $operatorId);
                $user        = $this->getEntityManager()->find('Core\Entity\User', 1);

                $campaign    = new \Core\Entity\Campaign;

                $campaign->populate($form->getData());
                $campaign->setOperator($operator);

                
                $campaign->setCreatedBy($user);
                $campaign->setStartedAt( new \DateTime($started_at) );
                $campaign->setEndedAt( new \DateTime($ended_at) );

                foreach ($languageIds as $languageId) {
                    $language = $this->getEntityManager()->find('Core\Entity\Language', $languageId);
                    $campaign->addLanguage($language);
                }

                $this->getEntityManager()->persist($campaign);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('backoffice/campaign'); 

                #$campaign = new \Core\Entity\Campaign;
                #$campaign->setName($request->getPost('name'));
                #$campaign->setStartedAt($request->getPost('started_at'));
                #$campaign->setEndedAt($request->getPost('ended_at'));
                // var_dump($campaign);
                // var_dump( array($request->getPost()));  
                
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
        $campaign = $this->getEntityManager()->find('Core\Entity\Campaign', $id);

        $english = $this->getEntityManager()->find('Core\Entity\Language', 40); // english language
        $bulgarian = $this->getEntityManager()->find('Core\Entity\Language', 24); // bulgarian language

        var_dump($campaign->hasLanguages()); 
        var_dump($campaign->hasLanguage($english)); 
        var_dump($campaign->hasLanguage($bulgarian)); 

        var_dump($campaign->getLanguages()); 

        exit();


        $form = new CampaignForm($this->getEntityManager());
        #$form->setBindOnValidate(false);
        $form->bind($campaign);
        $form->get('submit')->setAttribute('value', 'Save');

        $request = $this->getRequest();

        if ($request->isPost()) {
            
            $form->setInputFilter($campaign->getInputFilter());
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