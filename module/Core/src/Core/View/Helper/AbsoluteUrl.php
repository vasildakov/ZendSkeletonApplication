<?php
// ./module/Core/src/Core/View/Helper/AbsoluteUrl.php
// see http://blog.evan.pro/creating-a-simple-view-helper-in-zend-framework-2

namespace Core\View\Helper;
 
use Zend\Http\Request;
use Zend\View\Helper\AbstractHelper;
 
class AbsoluteUrl extends AbstractHelper
{
    protected $request;
 
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
 
    public function __invoke()
    {
        return $this->request->getUri()->normalize();
    }
}