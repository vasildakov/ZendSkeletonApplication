<?php
/**
 * Campaign Form
 * 
 * @author Vasil Dakov <vasildakov@gmail.com>
 */

namespace Core\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class CampaignForm extends Form
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('campaign');

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
                    'for' => 'Url',
                    'class'  => 'form-label'
                ),
            ),
        ));

        // operator
        $this->add(array(
            'name' => 'operator',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'select2'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Operator',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Operator',
                    'class'  => 'form-label'
                ),
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Operator',
                'property' => 'name',
            )
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