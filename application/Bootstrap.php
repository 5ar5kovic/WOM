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
        
        
        /*$autoLoader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH));
        
        $acl = new Application_Model_Acl_AccessControl();
        $auth = Zend_auth::getInstance();
        
        
        
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($acl, $auth));
        
        
        return $autoLoader;*/
        
        
    }
    
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');        
    }
}

