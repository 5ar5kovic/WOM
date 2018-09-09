<?php

class  Application_Form_RadniNalogUpdate extends Zend_Form
{
    protected $_opis;
    protected $_status;
    
    public function init($status) {
        
        $this->setName('frmKorisnickaPodrskaUnos');
        
        $opis = new Zend_Form_Element_Text('opis');
        $opis->setRequired(true)
        ->setLabel('opis')
        ->setAttrib('id', 'opis')
        ->setAttrib('name', 'opis')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        
        $status = new Zend_Form_Element_Select('status');
        $status->setRequired(true)
        ->setLabel('status')
        ->setAttrib('id', 'status')
        ->setAttrib('name', 'status')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        $status->addMultiOptions(array(
            '1' => 'Ceka',
            '2' => 'U radu',
            '3' => 'Zavrsen',
            '4' => 'Odbacen'
        ));
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sacuvaj')
        ->setAttrib('class', 'btn btn-sucess')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($opis,$status,$submit));
        $this -> setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('opis')->setValue($data['opis_kvara']);
        $this->getElement('status')->setValue($data['id_status']);
    }
}

