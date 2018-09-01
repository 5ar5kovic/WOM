<?php
class Application_Form_RacunarUnos extends Zend_Form {
    
    protected $_id;
    
    public function setId($id) {
        $this->_id = $id;
    }
    
    public function init() {
        
        $this->setName('frmRacunarUnos');
        
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->setAttrib('id', 'id');
        
        $naziv = new Zend_Form_Element_Text('naziv');
        $naziv->setLabel('Naziv: ')
        ->setAttrib('id', 'naziv')
        ->setAttrib('name', 'naziv')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1)
        ->setRequired(true);
        
        
        
        $tipMymapper = new Application_Model_Mymapper_TipRacunara();
        $tipovi = $tipMymapper->tipRacunaraSelect();
        $opcijeTip = array();
        
        foreach($tipovi as $tip) {
            $opcijeTip[$tip['id']] = $tip['naziv'];
        }
        
        $tipRacunara = new Zend_Form_Element_Select('tip');
        $tipRacunara->setLabel('Tip računara:')
        ->setAttrib('id', 'tip')
        ->setAttrib('name', 'tip')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 2)
        ->setRequired(true)
        ->addMultiOptions($opcijeTip);
        
        $osMymapper = new Application_Model_Mymapper_OperativniSistem();
        $operativniSistemi = $osMymapper->operativniSistemSelect();
        $opcijeOs = array();
        
        foreach($operativniSistemi as $operativniSistem) {
            $opcijeOs[$operativniSistem['id']] = $operativniSistem['naziv'];
        }
        
        $os = new Zend_Form_Element_Select('os');
        $os->setLabel('Operativni sistem:')
        ->setAttrib('id', 'os')
        ->setAttrib('name', 'os')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 3)
        ->setRequired(true)
        ->addMultiOptions($opcijeOs);
        
        
        $mbMymapper = new Application_Model_Mymapper_MaticnaPloca();
        $maticnePloce = $mbMymapper->maticnaPlocaSelect();
        $opcijeMb = array();
        
        foreach($maticnePloce as $maticnaPloca) {
            $opcijeMb[$maticnaPloca['id']] = $maticnaPloca['naziv'];
        }
        
        $mb = new Zend_Form_Element_Select('mb');
        $mb->setLabel('Matična ploča:')
        ->setAttrib('id', 'mb')
        ->setAttrib('name', 'mb')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 4)
        ->setRequired(true)
        ->addMultiOptions($opcijeMb);
        
        $cpuMymapper = new Application_Model_Mymapper_Procesor();
        $procesori = $cpuMymapper->procesorSelect();
        $opcijeCpu = array();
        
        foreach($procesori as $procesor) {
            $opcijeCpu[$procesor['id']] = $procesor['naziv'];
        }
        
        $cpu = new Zend_Form_Element_Select('cpu');
        $cpu->setLabel('Procesor:')
        ->setAttrib('id', 'cpu')
        ->setAttrib('name', 'cpu')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 5)
        ->setRequired(true)
        ->addMultiOptions($opcijeCpu);
        

        $korisnikMymapper = new Application_Model_Mymapper_Korisnik();
        $korisnici = $korisnikMymapper->korisnikSelect();
        $opcijeKorisnici = array();
        
        foreach($korisnici as $kor) {
            $opcijeKorisnici[$kor['id']] = ($kor['ime'] . " " . $kor['prezime']);
        }

        $korisnik = new Zend_Form_Element_Select('korisnik');
        $korisnik->setLabel('Korisnik:')
        ->setAttrib('id', 'korisnik')
        ->setAttrib('name', 'korisnik')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 6)
        ->setRequired(true)
        ->addMultiOptions($opcijeKorisnici);

        
                
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Sačuvaj')
        ->setAttrib('class', 'btn btn-success pull-right')
        ->setAttrib('tabindex', 5);
        
        $this->addElements(array($id, $naziv, $tipRacunara, $os, $mb, $cpu, $korisnik, $submit));
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