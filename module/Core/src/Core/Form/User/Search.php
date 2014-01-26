<?php
/**
 * UserSearchForm
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form\User;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\StdLib\Hydrator\ClassMethods;
use Zend\Form\Form;

class Search extends Form implements ObjectManagerAwareInterface
{

    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {

        parent::__construct('search');
        $this->setObjectManager($objectManager);
        $this->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods(false));

        // form atributes
        $this->setAttributes( array(
            'role' => 'form', 
            'method' => 'get', 
            'class' => 'form-inline') 
        );
        
        // username
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Username',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Username',
                'label_attributes' => array(
                    'for' => 'Username',
                    'class'  => 'sr-only'
                ),
            ),
        ));

        // name
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Name',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'sr-only'
                ),
            ),
        ));


        // role
        $this->add(array(
            'name' => 'role',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'form-control select2'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Role',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Role',
                    'class'  => 'control-label col-sm-2'
                ),
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Core\Entity\Role',
                'property' => 'name',
            )
        ));

        // submit
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Search',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));

    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        return $this;
    }
 

    public function getObjectManager()
    {
        return $this->objectManager;
    }
    
}