<?php
// ./module/Tracker/src/Tracker/Controller/IndexController.php

/**
 * Index Controller
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Tracker\Controller;

use Zend\Mvc\Controller\AbstractActionController;


class IndexController extends AbstractActionController
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
    	$request = $this->getRequest();

		$response = $this->getResponse();
		$response->setStatusCode(200);

    	if($request->isGet()) {

    		$site_id = $request->getQuery()->site;
    		$campaign_id = $request->getQuery()->campaign;

    		if( !empty($site_id) and !empty($campaign_id) ) {

                $click = new \Core\Entity\Click;
                $this->getEntityManager()->persist($click);
                $this->getEntityManager()->flush();
                
    			// $campaignsite = $this->getEntityManager()->getRepository('Core\Entity\CampaignSite')->findOneBy(array('campaign_id' => $campaign_id, 'site_id' => $site_id));

		    	var_dump($request->getUriString());
		    	var_dump($request->getQuery());

		    	var_dump($request->getQuery()->site);
		    	var_dump($request->getQuery()->campaign);

				$content = 'Tracker success response';
			}
			else {

				$content = 'Tracker error response';
			}
    	}

    	$response->setContent($content);
    	return $response;
    }



}
