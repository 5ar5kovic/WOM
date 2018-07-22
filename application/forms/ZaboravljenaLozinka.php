<?php
class Application_Form_ZaboravljenaLozinka extends Zend_Form {
    
    public function init($option = null) {
        
        $this->setName('frmZaboravljenaLozinka');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email: ')
        ->setAttrib('id', 'email')
        ->setAttrib('name', 'email')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sacuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($email, $submit));
        $this->setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
        
    }
    
}