<?php
/**
 * User Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form;

#use DoctrineModule\Persistence\ObjectManagerAwareInterface;
#use Doctrine\Common\Persistence\ObjectManager;
#use Zend\StdLib\Hydrator\ClassMethods;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class UserForm extends Form
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('user');

        //https://github.com/doctrine/DoctrineModule/blob/master/docs/hydrator.md
        $this->setHydrator(new DoctrineHydrator($entityManager));

        $this->setAttributes( array(
            'role' => 'form', 
            'method' => 'post', 
            'class' => '') 
        );
        
        // id
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
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
                    'class'  => 'form-label'
                ),
            ),
        ));

        // surname
        $this->add(array(
            'name' => 'surname',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Surname',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Surname',
                'label_attributes' => array(
                    'for' => 'Surname',
                    'class'  => 'form-label'
                ),
            ),
        ));

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
                    'class'  => 'form-label'
                ),
            ),
        ));


        // role
        $this->add(array(
            'name' => 'role',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'select2'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Role',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Role',
                    'class'  => 'form-label'
                ),
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Role',
                'property' => 'name',
            )
        ));

        // email
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Email',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Email',
                'label_attributes' => array(
                    'for' => 'Email',
                    'class'  => 'form-label'
                ),
            ),
        ));
        
        // password
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Password',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Password',
                'label_attributes' => array(
                    'class'  => 'form-label'
                ),
            ),
        ));
               
        // submit
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Submit',
                'id' => 'submitbutton',
                'class' => 'btn btn-default'
            ),
        ));
    }


    /* 
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        return $this;
    }
 
    public function getObjectManager()
    {
        return $this->objectManager;
    } 
    */
}