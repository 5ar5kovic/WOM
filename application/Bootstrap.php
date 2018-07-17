<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function __initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');        
    }
    
    protected function __initAutoload() {
        
        $modelLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH));
        return $modelLoader;
        
    }
}

