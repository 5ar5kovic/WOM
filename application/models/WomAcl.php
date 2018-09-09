<?php

include APPLICATION_PATH . "/configs/Constants.php";

class Application_Model_WomAcl extends Zend_Acl {
    
    public function __construct() {
        
        /*resursi*/
        $this->addResource(new Zend_Acl_Resource(Constants::$authentication));
        $this->addResource(new Zend_Acl_Resource(Constants::$authentication . "/" . Constants::$login), Constants::$authentication);
        $this->addResource(new Zend_Acl_Resource(Constants::$authentication . "/" . Constants::$logout), Constants::$authentication);
        $this->addResource(new Zend_Acl_Resource(Constants::$authentication . "/" . Constants::$zaboravljenaLozinka), Constants::$authentication);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$error));
        $this->addResource(new Zend_Acl_Resource(Constants::$error . "/" . Constants::$error). Constants::$error);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$dbupdate));
        $this->addResource(new Zend_Acl_Resource(Constants::$dbupdate . "/" . Constants::$execute), Constants::$dbupdate);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$index));
        $this->addResource(new Zend_Acl_Resource(Constants::$index . "/" . Constants::$index), Constants::$index);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$profil));
        $this->addResource(new Zend_Acl_Resource(Constants::$profil . "/" . Constants::$promenaLozinke), Constants::$profil);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$radniNalog));
        $this->addResource(new Zend_Acl_Resource(Constants::$radniNalog . "/" . Constants::$radni_nalog_unos), Constants::$radniNalog);
        $this->addResource(new Zend_Acl_Resource(Constants::$radniNalog . "/" . Constants::$radni_nalog_prikaz), Constants::$radniNalog);        
        
        $this->addResource(new Zend_Acl_Resource(Constants::$korisnickaAdministracija));
        $this->addResource(new Zend_Acl_Resource(Constants::$korisnickaAdministracija . "/" . Constants::$index), Constants::$korisnickaAdministracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$korisnickaAdministracija . "/" . Constants::$dodajKorisnika),Constants::$korisnickaAdministracija);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$racunar));
        $this->addResource(new Zend_Acl_Resource(Constants::$racunar . "/" . Constants::$racunar_prikaz), Constants::$racunar);
        $this->addResource(new Zend_Acl_Resource(Constants::$racunar . "/" . Constants::$racunar_unos), Constants::$racunar);
        $this->addResource(new Zend_Acl_Resource(Constants::$racunar . "/" . Constants::$racunar_brisanje), Constants::$racunar); 
        
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija));
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$index), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$operativni_sistem_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$operativni_sistem_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$operativni_sistem_brisanje), Constants::$administracija);
        
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$kvar_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$kvar_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$kvar_brisanje), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$maticna_ploca_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$maticna_ploca_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$maticna_ploca_brisanje), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$procesor_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$procesor_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$procesor_brisanje), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$tip_racunara_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$tip_racunara_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$tip_racunara_brisanje), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$korisnik_prikaz), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$korisnik_unos), Constants::$administracija);
        $this->addResource(new Zend_Acl_Resource(Constants::$administracija . "/" . Constants::$korisnik_brisanje), Constants::$administracija);
        
        $this->addResource(new Zend_Acl_Resource('pdf'));
        $this->addResource(new Zend_Acl_Resource('pdf/spisak-racunara'), 'pdf');
        
        /*role*/
        $this->addRole(new Zend_Acl_Role('1')); //gost
        $this->addRole(new Zend_Acl_Role('2'), '1'); //korisnik
        $this->addRole(new Zend_Acl_Role('4'), '2'); //supervizor
        $this->addRole(new Zend_Acl_Role('8'), '4'); //administrator
        
        /*permisije*/
        $this->allow('1', Constants::$authentication);
        //$this->deny('2',Constants::$authentication, Constants::$login);
        //$this->deny('2',Constants::$authentication, Constants::$zaboravljenaLozinka);
        $this->allow('2', Constants::$profil);
        $this->allow('4', Constants::$korisnickaAdministracija, Constants::$dodajKorisnika);
        $this->allow('4', Constants::$racunar);
        $this->allow('8', Constants::$administracija);
        $this->allow('2', Constants::$administracija, Constants::$index);
        $this->allow('8', Constants::$korisnickaAdministracija);
        $this->allow('8', Constants::$dbupdate);
        $this->allow('8', Constants::$error);
        $this->allow('8', Constants::$index);
        $this->allow('2', Constants::$radniNalog, Constants::$radni_nalog_prikaz);
        $this->allow('4', Constants::$radniNalog, Constants::$radni_nalog_unos);
        $this->allow('4', 'pdf');
        $this->allow('4', 'pdf', 'pdf/spisak-racunara');
        
      
    }
    
}