<?php

namespace Core\Form\View\Helper;

use Zend\Form\View\Helper\FormElementErrors as OriginalFormElementErrors;

class FormElementErrors extends OriginalFormElementErrors  
{
    #protected $messageCloseString     = '</p>';
    #protected $messageOpenFormat      = '<p>';
    #protected $messageSeparatorString = '';

    protected $messageCloseString     = '</li></ul>';
    protected $messageOpenFormat      = '<ul%s><li class="some-class">';
    protected $messageSeparatorString = '</li><li class="some-class">';
}