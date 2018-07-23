<?php
class Application_Form_NovaLozinka extends Zend_Form {
    
    public function init($option = null) {
        
        $this->setName('frmPromenaLozinke');
        
        $pass1 = new Zend_Form_Element_Password('pass1');
        $pass1->setLabel('Lozinka: ')
        ->setAttrib('id', 'pass1')
        ->setAttrib('name', 'pass1')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $pass2 = new Zend_Form_Element_Password('pass2');
        $pass2->setLabel('Ponovi lozinku: ')
        ->setAttrib('id', 'pass2')
        ->setAttrib('name', 'pass2')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sacuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($pass1, $pass2, $submit));
        $this->setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
        
    }
    
}