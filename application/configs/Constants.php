<?php

class Constants
{
            
    public static $duzinaRandomStringaZaPromenuPassworda = 70;
    public static $formatVremena = "Y-m-d";
    public static $redovaPoStrani = 3;
    
    
    public static $authentication = "authentication";
    public static $administracija = "administracija";
    public static $korisnickaAdministracija = "korisnickaAdministracija";
    public static $dbupdate = "dbupdate";
    public static $error = "error";
    public static $login = "login";
    public static $logout = "logout";
    public static $index = "index";
    public static $profil = "profil";
    public static $radniNalog = "radniNalog";
    public static $promenaLozinke = "promena-lozinke";
    public static $dodajKorisnika = "dodaj-korisnika";
    public static $korisnickaAdministracijaPrikaz = "korisnicka-administracija-prikaz";
    public static $korisnickaAdministracijaPrikazZaSupervizore = "korisnicka-administracija-za-supervizore-prikaz";
    public static $zaboravljenaLozinka = "zaboravljena-lozinka";
    public static $execute = "execute";    
    public static $operativni_sistem_prikaz = "operativni-sistem-prikaz"; 
    public static $operativni_sistem_unos = "operativni-sistem-unos";
    public static $operativni_sistem_brisanje = "operativni-sistem-brisanje";
    public static $kvar_prikaz = "kvar-prikaz";
    public static $kvar_unos = "kvar-unos";
    public static $kvar_brisanje = "kvar-brisanje";
    public static $maticna_ploca_prikaz = "maticna-ploca-prikaz";
    public static $maticna_ploca_unos = "maticna-ploca-unos";
    public static $maticna_ploca_brisanje = "maticna-ploca-brisanje";
    public static $procesor_prikaz = "procesor-prikaz";
    public static $procesor_unos = "procesor-unos";
    public static $procesor_brisanje = "procesor-brisanje";
    public static $tip_racunara_prikaz = "tip-racunara-prikaz";
    public static $tip_racunara_unos = "tip-racunara-unos";
    public static $tip_racunara_brisanje = "tip-racunara-brisanje";
    public static $korisnik_prikaz = "korisnik-prikaz";
    public static $korisnik_unos = "korisnik-unos";
    public static $korisnik_brisanje = "korisnik-brisanje";
    public static $racunar = "racunar";
    public static $racunar_prikaz="racunar-prikaz";
    public static $racunar_unos="racunar-unos";
    public static $racunar_brisanje="racunar-brisanje";
    public static $radni_nalog_unos="radni-nalog-unos";
    public static $radni_nalog_prikaz="radni-nalog-prikaz";
    public static $radni_nalog_update="radni-nalog-update";
    
    
    
    //putanje
    public static $zaboravljenaLozinkaPutanja = "/authentication/zaboravljena-lozinka";
    public static $homePutanja = "/authentication/login";
    public static $loginPutanja = "/authentication/login";
    public static $novaLozinkaPutanja = "/authentication/promena-lozinke";
    public static $administracijaIndexPutanja = "administracija/index";
    public static $korisnickaAdministracijaIndexPutanja = "korisnickaAdministracija/index";
    public static $dodajKorisnikaPutanja = "/korisnickaAdministracija/dodaj-korisnika";
    public static $izmeniKorisnikaPutanja = "/korisnickaAdministracija/izmeni-korisnika";
    public static $obrisiKorisnikaPutanja = "/korisnickaAdministracija/brisanje-korisnika";
    public static $korisnickaAdministracijaPrikazPutanja = "/korisnickaAdministracija/korisnicka-administracija-prikaz";
    public static $promenaLozinkePutanja = "/profil/promena-lozinke";
    public static $radniNalogIndexPutanja = "/radniNalog/index";
    public static $radniNalogUnosPutanja = "/radniNalog/radni-nalog-unos";
    public static $radniNalogPrikazPutanja = "/radniNalog/radni-nalog-prikaz";
    public static $radniNalogIzmenaPutanja = "/radniNalog/radni-nalog-update";
    
    //ostalo
    public static $appMail = 'mikam6618@gmail.com';
    public static $appMailPassword = 'MIKAm6618.';
    
    
    
}

