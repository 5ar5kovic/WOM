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
 * Table definition for radni_nalog
 *
 * @package Application_Model
 * @subpackage DbTable
 * @author SpecNaz Team 9815
 */
class Application_Model_DbTable_RadniNalog extends Application_Model_DbTable_TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'radni_nalog';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_sequence = true;

    protected $_referenceMap = array(
        'RadniNalogIbfk1' => array(
          	'columns' => 'id_korisnicka',
            'refTableClass' => 'Application_Model_DbTable_KorisnickaPodrska',
            'refColumns' => 'id'
        ),
        'RadniNalogIbfk2' => array(
          	'columns' => 'id_racunar',
            'refTableClass' => 'Application_Model_DbTable_Racunar',
            'refColumns' => 'id'
        ),
        'RadniNalogIbfk3' => array(
          	'columns' => 'id_kvar',
            'refTableClass' => 'Application_Model_DbTable_Kvar',
            'refColumns' => 'id'
        ),
        'RadniNalogIbfk4' => array(
          	'columns' => 'id_status',
            'refTableClass' => 'Application_Model_DbTable_Status',
            'refColumns' => 'id'
        )
    );
    



}
