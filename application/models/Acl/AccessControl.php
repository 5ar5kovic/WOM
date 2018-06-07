<?php

class Default_Model_Acl_AccessControl extends Zend_Acl {
    
    public function __construct() {
        
        $this->addResource(new Zend_Acl_Resource('index'));
        $this->addResource(new Zend_Acl_Resource('error'));
        $this->addResource(new Zend_Acl_Resource('dbupdate'));
        $this->addResource(new Zend_Acl_Resource('administracija'));
        
    }
    
}