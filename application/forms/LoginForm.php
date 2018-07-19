<?php
class Application_Form_LoginForm extends Zend_Form {
    
    public function __construct($option = null) {
        
        parent::__construct($option);
        
        $this->setName('login');
        
        $username = new Zend_Form_Element_Text('username');
        
        $username->setLabel('Korisnicko ime: ')
                 ->setRequired();
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Lozinka: ')
                 ->setRequired();
        
        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('Pristupi');

        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');
        
    }
    
}