<?php

/**
 * Application Model DbTables
 *
 * @package Application_Model
 * @subpackage DbTable
 * @author SpecNaz Team 9815
 * @copyright SpecNaz Team 9815
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Table definition for korisnicka_podrska
 *
 * @package Application_Model
 * @subpackage DbTable
 * @author SpecNaz Team 9815
 */
class Application_Model_DbTable_KorisnickaPodrska extends Application_Model_DbTable_TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'korisnicka_podrska';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_sequence = true;

    protected $_referenceMap = array(
        'KorisnickaPodrskaIbfk1' => array(
          	'columns' => 'id_nivo',
            'refTableClass' => 'Application_Model_DbTable_Nivo',
            'refColumns' => 'id'
        )
    );
    



}
