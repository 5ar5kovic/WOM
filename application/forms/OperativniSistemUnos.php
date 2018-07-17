<?php 

class Form_OperativniSistemUnos extends Zend_Form {
    
    protected $_id;
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function init() {
        
        $this->setName('frmUnosOperativnogSistema');
        
        $operativniSistemId = new Zend_Form_Element_Hidden('operativniSistemId');
        $operativniSistemId->setAttrib('id', 'operativniSistemId');
        
        $naziv = new Zend_Form_Element_Text('naziv');
        $naziv->setRequired(true)
        ->setAttrib('id', 'naziv')
        ->setAttribs('name', 'naziv')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setErrorMessages(array("Unesite naziv operativnog sistema."));
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sačuvaj')
        ->setAttrib('class', 'btn btn-sucess');
        
        $this->addElements(array($operativniSistemId, $naziv, $submit));
        $this->setElementDecorators(array("ViewHelper"),null, false);        
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('operativniSistemId')->setValue($data['id']);
        $this->getElement('naziv')->setValue($data['naziv']);       
    }
    
    
}


