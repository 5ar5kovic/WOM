<?php
class Application_Form_PromenaLozinke extends Zend_Form {
    
    public function init($option = null) {        
        $this->setName('frmPromenaLozinke');
        
        $stari = new Zend_Form_Element_Password('stari');
        $stari->setLabel('Lozinka: ')
        ->setAttrib('id', 'stari')
        ->setAttrib('name', 'stari')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $pass1 = new Zend_Form_Element_Password('pass1');
        $pass1->setLabel('Lozinka: ')
        ->setAttrib('id', 'pass1')
        ->setAttrib('name', 'pass1')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setAttrib('onKeyUp', 'checkPasswordMatch();')
        ->setRequired(true);
        
        $pass2 = new Zend_Form_Element_Password('pass2');
        $pass2->setLabel('Ponovi lozinku: ')
        ->setAttrib('id', 'pass2')
        ->setAttrib('name', 'pass2')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setAttrib('onKeyUp', 'checkPasswordMatch();')
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setAttrib('onClick', 'matching()')
        ->setAttrib('id', 'sbm')
        ->setLabel('Sacuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 2);
       
            $this->addElements(array($stari, $pass1, $pass2, $submit));
            $this->setMethod('post');
            $this->setElementDecorators(array("ViewHelper"),null, false);          
    }
    
   
}