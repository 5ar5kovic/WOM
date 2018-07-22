<?php 

class Application_Form_ProcesorUnos extends Zend_Form {
    
    protected $_id;
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function init() {
        
        $this->setName('frmProcesorUnos');
        
        //id operativnog sistema
        $id = new Zend_Form_Element_Hidden('id');
        $id->setAttrib('id', 'id');
        
        $naziv = new Zend_Form_Element_Text('naziv');
        $naziv->setLabel('Naziv: ')
        ->setAttrib('id', 'naziv')
        ->setAttrib('name', 'naziv')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sačuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($id, $naziv, $submit));
        $this -> setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);        
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('id')->setValue($data['id']);
        $this->getElement('naziv')->setValue($data['naziv']);       
    }
    
    
}


