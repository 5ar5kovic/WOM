<?php 

class Application_Form_RacunarUnos extends Zend_Form {
    
    protected $_id;
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function init() {
        
        $this->setName('frmRacunarUnos');
        
        //id racunara
        $id = new Zend_Form_Element_Hidden('id');
        $id->setAttrib('id', 'id');
        
        
        //naziv racunara
        $naziv = new Zend_Form_Element_Text('naziv');
        $naziv->setLabel('Naziv: ')
        ->setAttrib('id', 'naziv')
        ->setAttrib('name', 'naziv')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        //tip racunara - select
        $tipMapper = new Application_Model_Mymapper_TipRacunara();
        $tipOpcije = array();
        foreach ($tipMapper->tipRacunaraSelect() as $i => $tipRow) {
            $tipOpcije[$tipRow['id']] = $tipRow['naziv']; 
        }
        
        $tip = new Zend_Form_Element_Select('tip');
        $tip->setLabel('Tip: ')
        ->setAttrib('id', 'tip')
        ->setAttrib('name', 'tip')
        ->setAttrib('class', 'form-control')
        ->setAttrib('tabindex', 2)
        ->addMultiOptions($tipOpcije);
        
        //operativni sistem - select
        $osMapper = new Application_Model_Mymapper_OperativniSistem();
        $osOpcije = array();
        foreach ($osMapper->operativniSistemSelect() as $i => $osRow) {
            $osOpcije[$osRow['id']] = $osRow['naziv'];
        }
        
        $os = new Zend_Form_Element_Select('os');
        $os->setLabel('Operativni sistem: ')
        ->setAttrib('id', 'os')
        ->setAttrib('name', 'os')
        ->setAttrib('class', 'form-control')
        ->setAttrib('tabindex', 3)
        ->addMultiOptions($osOpcije);
        
        //maticna ploca - select
        $mbMapper = new Application_Model_Mymapper_MaticnaPloca();
        $mbOpcije = array();
        foreach ($mbMapper->maticnaPlocaSelect() as $i => $mbRow) {
            $mbOpcije[$mbRow['id']] = $mbRow['naziv'];
        }
        
        $mb = new Zend_Form_Element_Select('mb');
        $mb->setLabel('Matična ploča: ')
        ->setAttrib('id', 'mb')
        ->setAttrib('name', 'mb')
        ->setAttrib('class', 'form-control')
        ->setAttrib('tabindex', 4)
        ->addMultiOptions($mbOpcije);
        
        //procesor - select
        $cpuMapper = new Application_Model_Mymapper_Procesor();
        $cpuOpcije = array();
        foreach ($cpuMapper->procesorSelect() as $i => $cpuRow) {
            $cpuOpcije[$cpuRow['id']] = $cpuRow['naziv'];
        }
        
        $cpu = new Zend_Form_Element_Select('cpu');
        $cpu->setLabel('Procesor: ')
        ->setAttrib('id', 'cpu')
        ->setAttrib('name', 'cpu')
        ->setAttrib('class', 'form-control')
        ->setAttrib('tabindex', 5)
        ->addMultiOptions($cpuOpcije);
        
        //korisnik - select
        $korisnikMapper = new Application_Model_Mymapper_Korisnik();
        $korisnikOpcije = array();
        foreach ($korisnikMapper->korisnikSelect() as $i => $korisnikRow) {
            $korisnikOpcije[$korisnikRow['id']] = $korisnikRow['ime'] . ' ' . $korisnikRow['prezime'];
        }
        
        $korisnik = new Zend_Form_Element_Select('korisnik');
        $korisnik->setLabel('Korisnik: ')
        ->setAttrib('id', 'korisnik')
        ->setAttrib('name', 'korisnik')
        ->setAttrib('class', 'form-control')
        ->setAttrib('tabindex', 6)
        ->addMultiOptions($korisnikOpcije);
        
        
        
        
        
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sačuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 2);
        
        $this->addElements(array($id, $naziv, $tip, $os, $mb, $cpu, $korisnik, $submit));
        $this -> setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);        
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('id')->setValue($data['id']);
        $this->getElement('naziv')->setValue($data['naziv']);
        $this->getElement('tip')->setValue($data['id_tip']);
        $this->getElement('os')->setValue($data['id_os']);
        $this->getElement('mb')->setValue($data['id_mb']);
        $this->getElement('cpu')->setValue($data['id_cpu']);
        $this->getElement('korisnik')->setValue($data['id_korisnik']);
        
        
    }
    
    
}


