<?php
//module/Core/src/Core/Storage/AuthStorage.php
namespace Authentication\Model;
 
use Zend\Authentication\Storage;

use Zend\Session\Storage\SessionStorage;
use Zend\Session\SessionManager;

class AuthStorage extends Storage\Session
{
    public function setRememberMe($rememberMe = 0, $time = 1209600)
    {
         if ($rememberMe == 1) {
             $this->session->getManager()->rememberMe($time);
         }
    }
     
    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
    
    
    public function getSession() 
    {
        return $this->session;
    }
    
}