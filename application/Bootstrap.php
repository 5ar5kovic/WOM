<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    
    protected function _initAutoload() {
        
        $modelLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH));
        
        $acl = new Application_Model_WomAcl();
        $auth = Zend_auth::getInstance();       
        
        
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($acl, $auth));
        
        
        return $modelLoader;
   
    }
    
    function _initViewHelpers() {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();     
        $view->doctype('HTML5');
        $view->headTitle('SpecNazTeam 9815 - WOM');
    }
    

}

