<?php

class Application_Form_RadniNaloziPrikaz extends Zend_Form
{
    protected $_dodeljenaPodrska;
    protected $_racunar;
    protected $_kvar;
    protected $_odDatuma;
    protected $_doDatuma;
    protected $_status;
    protected $_opis; 
    
    public function init() {
        
        $auth = Zend_Auth::getInstance();
        $role = $auth->getStorage()->read()->id_rola;
        $id = $auth->getStorage()->read()->id;
        $un = $auth->getStorage()->read()->username;
        
        
        $this->setName('frmRadniNaloziPrika');  
        
        $myMapper1 = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnici = $myMapper1->korisnickaPodrskaSelectKorisnike();
        
        $myMapper2 = new Application_Model_Mymapper_Racunar();
        $racunari = $myMapper2->racunarSelect();
        
        $myMapper3 = new Application_Model_Mymapper_Kvar();
        $kvarovi = $myMapper3->kvarSelect();
        
        $map1 = array();
        $map2 = array();
        $map3 = array();
        $map1[0] = "Sve";
        $map2[0] = "Sve";
        $map3[0] = "Sve";
        
        foreach($korisnici as $korisnik){
            $map1[$korisnik['id']] = $korisnik['username'];
        }
        
        foreach($racunari as $racunar){
            $map2[$racunar['id']] = $racunar['naziv'];
        }
        
        foreach($kvarovi as $kvar){
            $map3[$kvar['id']] = $kvar['kvar'];
        } 
        
        $username = new Zend_Form_Element_Select('username');
        $username->setRequired(true)
        ->setLabel('username')
        ->setAttrib('id', 'username')
        ->setAttrib('name', 'username')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        if ($role > 2) {
        $username->setMultiOptions($map1);
        }
        else {
            $username->setMultiOptions(array(
                $id => $un));
        }
        
        $racunar = new Zend_Form_Element_Select('racunar');
        $racunar->setRequired(true)
        ->setLabel('racunar')
        ->setAttrib('id', 'racunar')
        ->setAttrib('name', 'racunar')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 2);
        $racunar->setMultiOptions($map2);
        
        $kvar = new Zend_Form_Element_Select('kvar');
        $kvar->setRequired(true)
        ->setLabel('kvar')
        ->setAttrib('id', 'kvar')
        ->setAttrib('name', 'kvar')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 3);
        $kvar->setMultiOptions($map3);
        
        
        $odDatuma = new Zend_Form_Element_Text("odDatuma");
        $odDatuma->setRequired(true)
        ->setLabel('odDatuma')
        ->setAttrib('id', 'odDatuma')
        ->setAttrib('name', 'odDatuma')
        //->setAtrrib('type', 'date')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 4);
        
        $doDatuma = new Zend_Form_Element_Text('doDatuma');
        $doDatuma->setRequired(true)
        ->setLabel('doDatuma')
        ->setAttrib('id', 'doDatuma')
        ->setAttrib('name', 'doDatuma')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 5);
        
        $status = new Zend_Form_Element_Select('status');
        $status->setRequired(true)
        ->setLabel('status')
        ->setAttrib('id', 'status')
        ->setAttrib('name', 'status')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 6);
        $status->addMultiOptions(array(
            '0' => 'Sve',
            '1' => 'Ceka',
            '2' => 'U radu',
            '3' => 'Zavrsen',
            '4' => 'Odbacen'
        ));
        
        $opis = new Zend_Form_Element_Text('opis');
        $opis->setRequired(true)
        ->setLabel('opis')
        ->setAttrib('id', 'opis')
        ->setAttrib('name', 'opis')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('placeholder', 'Pretrazi po opisu...')
        ->setAttrib('tabindex', 7);
        
        $trazi = new Zend_Form_Element_Submit('trazi');
        $trazi->setAttrib('type', 'submit')
        ->setLabel('Trazi')
        ->setAttrib('id', 'trazi')
        ->setAttrib('name', 'trazi')
        ->setAttrib('value', 'Trazi')
        ->setAttrib('class', 'btn btn-sucess')
        ->setAttrib('tabindex', 8);
        
        $generisi = new Zend_Form_Element_Submit('generisi');
        $generisi->setAttrib('type', 'submit')
        ->setLabel("Štampaj u PDF")
        ->setAttrib('id', 'generisi')
        ->setAttrib('name', 'generisi')
        ->setAttrib('value', 'Generisi')
        ->setAttrib('formaction', '/../pdf/spisak-radni-nalog')
        ->setAttrib('class', 'btn btn-danger pull-right btnExport')
        ->setAttrib('tabindex', 9);
        
        

        
        $this->addElements(array($username,$racunar,$kvar,$odDatuma,$doDatuma,$status,$opis,$trazi,$generisi));
        $this->setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
    }
    
    public function populate(array $data) {
        parent::populate($data);
        $this->getElement('username')->setValue($data['username']);
        $this->getElement('racunar')->setValue($data['racunar']);
        $this->getElement('kvar')->setValue($data['kvar']);
        $this->getElement('odDatuma')->setValue($data['odDatuma']);
        $this->getElement('doDatuma')->setValue($data['doDatuma']);
        $this->getElement('status')->setValue($data['status']);
    }
}

