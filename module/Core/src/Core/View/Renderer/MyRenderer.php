<?php
// http://zf2.readthedocs.org/en/latest/modules/zend.view.helpers.head-style.html

namespace Core\View\Renderer;

// Since we just want to implement the getEncoding() method, we can extend the Zend native renderer
use Zend\View\Renderer\PhpRenderer;

class MyRenderer extends PhpRenderer
{
   /**
    * @var string
    */
   protected $encoding;

   /**
    * Constructor
    *
    * @param  string $encoding The encoding to be used
    */
   public function __construct($encoding)
   {
      parent::__construct();
      $this->encoding = $encoding;
   }

   /**
    * Sets the encoding
    *
    * @param string $encoding The encoding to be used
    */
   public function setEncoding($encoding)
   {
      $this->encoding = $encoding;
   }

   /**
    * Gets the encoding
    *
    * @return string The encoding being used
    */
   public function getEncoding()
   {
      return $this->encoding;
   }
}