<?php
/**
 * ClickListener
 * https://doctrine-orm.readthedocs.org/en/latest/reference/events.html
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs as Event;
use Core\Entity\Click as Click;

class ClickListener {

    public function prePersist(Click $click, Event $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof Click) {
        	$entity->setComment("ClickListener PrePersist");
        }
    }

}