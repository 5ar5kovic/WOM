<?php
/*
 * CREATE TABLE dbupdate_history (
 * id INT(11) NOT NULL AUTO INCREMENT PRIMARY KEY,
 * query MEDIUMTEXT,
 * datum_izmene DATETIME,
 * opos text) 
 * 
 * */


$dbUpdate = array();

//OPERATIVNI_SISTEM
$id = 1;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists operativni_sistem (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa operativnim sistemima';

//MATICNA_PLOCA
$id = 2;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists maticna_ploca (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa maticnim plocama';


//PROCESOR
$id = 3;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists procesor (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa procesorima';


//TIP_RACUNARA (desktop, laptop)
$id = 4;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists tip_racunara (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa tipovima racunara (desktop/laptop)';

//KORISNIK
$id = 5;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists korisnik (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ime` varchar(60) NOT NULL,
    `prezime` varchar(60) NOT NULL,
    `email` varchar(60) NOT NULL,
    `tel` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa korisnicima';

//NIVO
/*
 * Administrator
 * Sef
 * Inzenjer
 *  
 * */

$id = 6;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists nivo (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nivo` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa nivoima duznosti i prava';


//KORISNICKA PODRSKA
$id = 7;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists korisnicka_podrska (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ime` varchar(60) NOT NULL,
    `prezime` varchar(60) NOT NULL,
    `password` varchar(50) NOT NULL,
    `email` varchar(60) NOT NULL,
    `tel` varchar(50) NOT NULL,
    `id_nivo` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_nivo`) REFERENCES nivo (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa korisnicima';

//KVAR
$id = 8;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists kvar (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `kvar` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa tipovima kvara';


//RACUNAR
$id = 9;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists racunar (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    `id_tip` int(11) NOT NULL,
    `id_os` int(11) NOT NULL,
    `id_mb` int(11) NOT NULL,
    `id_cpu` int(11) NOT NULL,
    `id_korisnik` int(11),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_tip`) REFERENCES tip_racunara (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`id_os`) REFERENCES operativni_sistem (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`id_mb`) REFERENCES maticna_ploca (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`id_cpu`) REFERENCES procesor (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa racunarima';

//RADNI NALOG
$id = 10;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists radni_nalog (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_korisnicka` int(11) NOT NULL,
    `id_racunar` int(11) NOT NULL,
    `id_kvar` int(11) NOT NULL,
    `vreme_kreiranja` DATETIME NOT NULL,
    `opis_kvara` text NOT NULL,
    `opis_resenja` text,
    `vreme_zavrsetka` DATETIME,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_korisnicka`) REFERENCES korisnicka_podrska (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`id_racunar`) REFERENCES racunar (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`id_kvar`) REFERENCES kvar (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa radnim nalozima';








