<?php
// http://hounddog.github.io/blog/getting-started-with-rest-and-zend-framework-2/

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class CampaignRestController extends AbstractRestfulController
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


    public function getList()
    {
        $data = array();

        $campaigns =  $this->getEntityManager()->getRepository("Core\Entity\Campaign")->findAll();

        if(!empty($campaigns) ) {
            foreach ($campaigns as $key => $campaign) {
                $data[$key]['id']   = $campaign->getId();
                $data[$key]['name'] = $campaign->getName();
            }
        }

        return new JsonModel(array(
            'data' => $data,
        ));
    }


    public function get($id)
    {
        $campaign = $this->getEntityManager()->find('Core\Entity\Campaign', $id);
        $data = array(
            'id' => $campaign->getId(),
            'name' => $campaign->getName(),
            'started' => $campaign->getStartedAt()

        );

        return new JsonModel(array(
            'data' => $data
        ));
    }


    public function create($data)
    {
        $campaign = new \Core\Entity\Campaign;

        return new JsonModel(array(
            'id' => $id,
        ));
    }


    public function update($id, $data)
    {
        $data['id'] = $id;
        $campaign = $this->getEntityManager()->find('Core\Entity\Campaign', $id);

        $form  = new \Core\Form\CampaignForm($this->getEntityManager());
        $form->bind($campaign);
        $form->setInputFilter($campaign->getInputFilter());
        $form->setData($data);

        if ($form->isValid()) {
            $this->getEntityManager()->persist($campaign);
            $this->getEntityManager()->flush();
        } 

        return new JsonModel(array(
            'id' => $campaign->getId(),
            'data' => $data,
            'messages' => $form->getMessages()
        ));
    }


    public function delete($id)
    {
        return new JsonModel(array(
            'id' => $id,
        ));
    }
}