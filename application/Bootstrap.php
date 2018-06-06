<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function __initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');        
    }
}

