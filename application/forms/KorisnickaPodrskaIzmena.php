<?php

class Application_Form_KorisnickaPodrskaIzmena extends Zend_Form
{
    protected $_username;
    protected $_ime;
    protected $_prezime;
    protected $_email;
    protected $_tel;
    protected $_id_rola;
    
    public function init() {
        
        $this->setName('frmKorisnickaPodrskaIzmena');
        
        $username = new Zend_Form_Element_Text('username');
        $username->setRequired(true)
        ->setLabel('username')
        ->setAttrib('id', 'username')
        ->setAttrib('name', 'username')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        
        $ime = new Zend_Form_Element_Text('ime');
        $ime->setRequired(true)
        ->setLabel('ime')
        ->setAttrib('id', 'ime')
        ->setAttrib('name', 'ime')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        $prezime = new Zend_Form_Element_Text('prezime');
        $prezime->setRequired(true)
        ->setLabel('prezime')
        ->setAttrib('id', 'prezime')
        ->setAttrib('name', 'prezime')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setRequired(true)
        ->setLabel('email')
        ->setAttrib('id', 'email')
        ->setAttrib('name', 'email')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        $tel = new Zend_Form_Element_Text('telefon');
        $tel->setRequired(true)
        ->setLabel('telefon')
        ->setAttrib('id', 'telefon')
        ->setAttrib('name', 'telefon')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        $rola = new Zend_Form_Element_Select('rola');
        $rola->setRequired(true)
        ->setLabel('rola')
        ->setAttrib('id', 'rola')
        ->setAttrib('name', 'rola')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        $rola->addMultiOptions(array(
            '2' => 'Korisnik',
            '4' => 'Supervizor'
        ));
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sacuvaj')
        ->setAttrib('class', 'btn btn-sucess')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($username,$ime,$prezime,$email,$tel,$rola, $submit));
        $this -> setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('username')->setValue($data['username']);
        $this->getElement('ime')->setValue($data['ime']);
        $this->getElement('prezime')->setValue($data['prezime']);
        $this->getElement('email')->setValue($data['email']);
        $this->getElement('telefon')->setValue($data['tel']);
        $this->getElement('rola')->setValue($data['id_rola']);
    }
}

