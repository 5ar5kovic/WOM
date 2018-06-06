<?php


$dbUpdate = array();

/*
$bootstrap = $this->getInvokeArg ( 'bootstrap' );
$aConfig = $bootstrap->getOptions ();
$dbName = $aConfig ['resources'] ['db'] ['params'] ['dbname'];
*/

$id = 1;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists operativni_sistemi (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `naziv` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa operativnim sistemima';

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

$id = 6;
$dbUpdate[$id]['id'] = $id;
$dbUpdate[$id]['query'] = "
create table if not exists racunar (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `hostname` varchar(60) NOT NULL,
    `id_os` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE=InnoDB
    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;";
$dbUpdate[$id]['params'] = array();
$dbUpdate[$id]['opis'] = 'Kreiranje tabele sa tipovima racunara (desktop/laptop)';





