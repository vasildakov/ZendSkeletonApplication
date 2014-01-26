<?php
// ./module/Core/src/Core/View/Helper/RenderForm.php

namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\Form;
use Zend\Http\Request;

class RenderForm extends AbstractHelper {

    protected $form;
 
    public function __construct(Form $form, Request $request)
    {
        $this->form = $form;
        $this->request = $request;
    }

	public function __invoke()
	{
		$out = "";

		if($this->request->isPost()) {
    		$this->form->setData($this->request->getPost());
    	}

    	$this->form->prepare();
    	$out .= '<div class="col-lg-12">';
		$out .= '<div class="grid simple">';
		$out .= '<div class="grid-body no-border">';
		$out .= '<h4>Advanced<span class="semi-bold">Search</span></h4>';
		$out .= '<div class="row form-row">';
		$out .= $this->view->form()->openTag($this->form);

		$elements = $this->form->getElements();
		foreach ($elements as $element) {
			# $out .= $this->view->formRow($element);
			$out .= '<div class="col-md-2">';
			$out .= $this->view->formInput($element);
			$out .= '</div>';
		}
		$out .= $this->view->form()->closeTag($this->form);
		$out .= '</div>';
		$out .= '</div>';
		$out .= '</div>';
		$out .= '</div>';

		return $out;
	}
}
    