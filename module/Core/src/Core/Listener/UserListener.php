<?php
/**
 * UserListener
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs as Event;
use Core\Entity\User as User;

class UserListener {


	public function __construct() 
	{

	} 


    public function prePersist(User $user, Event $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

    }


    public function postPersist(User $user, Event $args) 
    {

    }


}