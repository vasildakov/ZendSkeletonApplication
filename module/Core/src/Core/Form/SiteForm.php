<?php
/**
 * Site Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class SiteForm extends Form
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('site');

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
            'name' => 'url',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Url',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Url',
                'label_attributes' => array(
                    'for' => 'Url',
                    'class'  => 'form-label'
                ),
            ),
        ));

        // status
        $this->add(array(
            'name' => 'status',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'select2',
                // 'value' => '1' 
            ),

            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Status',
                'label_attributes' => array(
                    'for' => 'Status',
                    'class'  => 'form-label'
                ),
                'value_options' => \Core\Entity\Site::$statusOptions,
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
}