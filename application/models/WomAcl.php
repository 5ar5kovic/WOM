<?php

include APPLICATION_PATH . "/configs/Constants.php";

class Application_Model_WomAcl extends Zend_Acl {
    
    public function __construct() {
        
        /*resursi*/
        $this->addResource(new Zend_Acl_Resource(Constants::$authentication));
        $this->addResource(new Zend_Acl_Resource(Constants::$login), Constants::$authentication);
        $this->addResource(new Zend_Acl_Resource(Constants::$logout), Constants::$authentication);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$error));
        $this->addResource(new Zend_Acl_Resource(Constants::$error). Constants::$error);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$dbupdate));
        $this->addResource(new Zend_Acl_Resource(Constants::$execute), Constants::$dbupdate);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija));
        $this->addResource(new Zend_Acl_Resource(Constants::$index), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$operativni_sistem_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$operativni_sistem_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$operativni_sistem_brisanje), Constants::$administracija);
        
        
        /*role*/
        $this->addRole(new Zend_Acl_Role('1')); //gost
        $this->addRole(new Zend_Acl_Role('2'), '1'); //korisnik
        $this->addRole(new Zend_Acl_Role('4'), '2'); //supervizor
        $this->addRole(new Zend_Acl_Role('8'), '4'); //administrator
        
        /*permisije*/
        $this->allow('1', Constants::$authentication);
        $this->allow('8', Constants::$dbupdate);
        $this->allow('8', Constants::$error);
        $this->allow('8', Constants::$administracija);
        
      
    }
    
}