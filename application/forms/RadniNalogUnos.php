<?php


class Application_Form_RadniNalogUnos extends Zend_Form
{ 
    public function init() {  
        
        $this->setName('frmRadniNalogUnos');
        
        $myMapper1 = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnici = $myMapper1->korisnickaPodrskaSelectKorisnike();
        
        $myMapper2 = new Application_Model_Mymapper_Racunar();
        $racunari = $myMapper2->racunarSelect();
        
        $myMapper3 = new Application_Model_Mymapper_Kvar();
        $kvarovi = $myMapper3->kvarSelect();
        
        $map1 = array();
        $map2 = array();
        $map3 = array();
        
        foreach($korisnici as $korisnik){
            $map1[$korisnik['id']] = $korisnik['ime'] . " " . $korisnik['prezime'];
        }
        
        foreach($racunari as $racunar){
            $map2[$racunar['id']] = $racunar['naziv'];
        }
        
        foreach($kvarovi as $kvar){
            $map3[$kvar['id']] = $kvar['kvar'];
        }
        
        $korisnickaPodrskaId = new Zend_Form_Element_Select('korisnicka');
        $korisnickaPodrskaId->setRequired(true)
        ->setLabel('korisnicka')
        ->setAttrib('id', 'korisnicka')
        ->setAttrib('name', 'korisnicka')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 1);
        $korisnickaPodrskaId->setMultiOptions($map1);
        
        $racunarId = new Zend_Form_Element_Select('racunar');
        $racunarId->setRequired(true)
        ->setLabel('racunar')
        ->setAttrib('id', 'racunar')
        ->setAttrib('name', 'racunar')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 2);
        $racunarId->setMultiOptions($map2);
        
        $kvarId = new Zend_Form_Element_Select('kvar');
        $kvarId->setRequired(true)
        ->setLabel('kvar')
        ->setAttrib('id', 'kvar')
        ->setAttrib('name', 'kvar')
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 3);
        $kvarId->setMultiOptions($map3);
        
        //$opis = new Zend_Form_Element_Text('opisKvara');
        $opis = new Zend_Form_Element_Textarea('opisKvara');
        $opis->setLabel('opis kvara')
        ->setAttrib('id', 'opisKvara')
        ->setAttrib('name', 'opisKvara')
        ->setAttrib('cols', '50')
        ->setAttrib('rows', '3')        
        ->setAttrib('class', 'form-control validate[requested]')
        ->setAttrib('tabindex', 4)
        ->setRequired(true);
        
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttrib('type', 'submit')
        ->setLabel('Kreiraj')
        ->setAttrib('class', 'btn btn-sucess')
        ->setAttrib('tabindex', 5);        
        
        $this->addElements(array($korisnickaPodrskaId,$kvarId,$racunarId,$opis,$submit));
        $this->setMethod('post');
        $this->setElementDecorators(array("ViewHelper"),null, false);
    }
    
}

