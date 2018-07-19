<?php

class Application_Model_WomAcl extends Zend_Acl {
    
    public function __construct() {
        
             
        
        /*
        $this->addResource(new Zend_Acl_Resource('index'));
        $this->addResource(new Zend_Acl_Resource('error'));
        
        $this->addResource(new Zend_Acl_Resource('administracija'));
        */
        
        //$this->addResource(new Zend_Acl_Resource('dbupdate'));
        //$this->addResource(new Zend_Acl_Resource('authentication'));
        //$this->addResource(new Zend_Acl_Resource('administracija'));
        //$this->addResource(new Zend_Acl_Resource('index'), 'administracija');
        //$this->addResource(new Zend_Acl_Resource('operativni-sistem-prikaz'), 'administracija');
        
        
        //$this->addRole(new Zend_Acl_Role('3')); //inzenjer - kao user
        //$this->addRole(new Zend_Acl_Role('2'), '3'); //sef - kao power user
        //$this->addRole(new Zend_Acl_Role('1'), '2'); //administrator
        
        //$this->allow('1', 'dbupdate');
        //$this->allow('1', 'administracija');
        //$this->allow('1', 'authentication');
        
        

        
    }
    
}