<?php

class Application_Model_WomAcl extends Zend_Acl {
    
    public function __construct() {
        
        /*resursi*/
        $this->addResource(new Zend_Acl_Resource('authentication'));
        $this->addResource(new Zend_Acl_Resource('login'), 'authentication');
        $this->addResource(new Zend_Acl_Resource('logaut'), 'authentication');
        
        $this->addResource(new Zend_Acl_Resource('error'));
        $this->addResource(new Zend_Acl_Resource('error'). 'error');
        
        $this->addResource(new Zend_Acl_Resource('dbupdate'));
        $this->addResource(new Zend_Acl_Resource('execute'), 'dbupdate');
        
        $this->addResource(new Zend_Acl_Resource('administracija'));
        $this->addResource(new Zend_Acl_Resource('index'), 'administracija');
        $this->addResource(new Zend_Acl_Resource('operativni-sistem-prikaz'), 'administracija');
        $this->addResource(new Zend_Acl_Resource('operativni-sistem-unos'), 'administracija');
        $this->addResource(new Zend_Acl_Resource('operativni-sistem-brisanje'), 'administracija');
        
        
        /*role*/
        $this->addRole(new Zend_Acl_Role('1')); //gost
        $this->addRole(new Zend_Acl_Role('2'), '1'); //korisnik
        $this->addRole(new Zend_Acl_Role('4'), '2'); //supervizor
        $this->addRole(new Zend_Acl_Role('8'), '4'); //administrator
        
        /*permisije*/
        $this->allow('1', 'authentication');
        $this->allow('8', 'dbupdate');
        $this->allow('8', 'error');
        $this->allow('8', 'administracija');
        
      
    }
    
}