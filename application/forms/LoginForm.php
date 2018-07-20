<?php
class Application_Form_LoginForm extends Zend_Form {
    
    public function __construct($option = null) {
        
        parent::__construct($option);
        
        $this->setName('login');
        
        $username = new Zend_Form_Element_Text('username');
        
        $username->setLabel('Korisnicko ime: ')
                 ->setAttrib('class', 'form-control')  
                 ->setRequired();
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Lozinka: ')
                 ->setAttrib('class', 'form-control')  
                 ->setRequired();
        
        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('Pristupi')
              ->setAttrib('class', 'btn btn-primary btn-block btn-flat');

        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');
        
    }
    
}