<?php 

class Application_Form_KorisnikUnos extends Zend_Form {
    
    protected $_id;
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function init() {
        
        $this->setName('frmKorisnikUnos');
        
        //id operativnog sistema
        $id = new Zend_Form_Element_Hidden('id');
        $id->setAttrib('id', 'id');
        
        $ime = new Zend_Form_Element_Text('ime');
        $ime->setLabel('Ime: ')
        ->setAttrib('id', 'ime')
        ->setAttrib('name', 'ime')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        $prezime = new Zend_Form_Element_Text('prezime');
        $prezime->setLabel('Prezime: ')
        ->setAttrib('id', 'prezime')
        ->setAttrib('name', 'prezime')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 2)
        ->setRequired(true);
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('e-mail: ')
        ->setAttrib('id', 'email')
        ->setAttrib('name', 'email')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 3)
        ->setRequired(true);
        
        $tel = new Zend_Form_Element_Text('tel');
        $tel->setLabel('Telefon: ')
        ->setAttrib('id', 'tel')
        ->setAttrib('name', 'tel')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 4)
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sačuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 5);
        
        $this->addElements(array($id, $ime, $prezime, $email, $tel, $submit));
        $this -> setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);        
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('id')->setValue($data['id']);
        $this->getElement('ime')->setValue($data['ime']); 
        $this->getElement('prezime')->setValue($data['prezime']);
        $this->getElement('email')->setValue($data['email']);
        $this->getElement('tel')->setValue($data['tel']);
    }
    
    
}


