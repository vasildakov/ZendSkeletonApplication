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

        $today = new \DateTime();
        $tomorrow = clone $today;
        $tomorrow->modify('+1 day');

        $this->setHydrator(new DoctrineHydrator($entityManager, 'Core\Entity\Campaign'));
        
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
                'placeholder' => 'Campaign Name',
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


        // Bar
        $this->add(array(
            'name' => 'bar',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Bar',
                'label_attributes' => array(
                    'for' => 'Name',
                    'class'  => 'form-label'
                ),
            ),
        ));

        // Foo depends on Bar
        $this->add(array(
            'name' => 'foo',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => '',
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Foo',
                'label_attributes' => array(
                    'for' => 'Name',
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


        // category
        $this->add(array(
            'name' => 'category',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'select2'
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Category',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Category',
                    'class'  => 'form-label'
                ),
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Category',
                'property' => 'name',
            )
        ));

        // language
        $this->add(array(
            'name' => 'language',
            'attributes' => array(
                'type'  => 'select',
                'class' => 'select2',
                'multiple' => 'multiple',
            ),
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Language',
                'empty_option'    => '',
                'label_attributes' => array(
                    'for' => 'Language',
                    'class'  => 'form-label'
                ),
                'object_manager' => $entityManager,
                'target_class' => 'Core\Entity\Language',
                'property' => 'name',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array('status' => \Core\Entity\Language::STATUS_ACTIVE),
                        'orderBy' => array('name' => "ASC"),
                    ),
                )
            )
        ));


        // started at
        $this->add(array(
            'name' => 'started_at',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Started',
                'class' => 'datetime',
                'id' => 'started_at',
                // 'value' => date("Y-m-d H:i"),
                'value' => $today->format("Y-m-d"),
                'data-format' => "YYYY-MM-DD",
                'data-template' => "D MMM YYYY",
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Started',
                'label_attributes' => array(
                    'for' => 'Started',
                    'class'  => 'form-label'
                ),
            ),
        ));


        // ended at
        $this->add(array(
            'name' => 'ended_at',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Ended',
                'class' => 'datetime',
                'id' => 'ended_at',
                'value' => $tomorrow->format("Y-m-d"),
                'data-format' => "YYYY-MM-DD",
                'data-template' => "D MMM YYYY",
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Ended',
                'label_attributes' => array(
                    'for' => 'Ended',
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
}