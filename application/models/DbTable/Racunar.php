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
 * Table definition for racunar
 *
 * @package Application_Model
 * @subpackage DbTable
 * @author SpecNaz Team 9815
 */
class Application_Model_DbTable_Racunar extends Application_Model_DbTable_TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'racunar';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_sequence = true;

    protected $_referenceMap = array(
        'RacunarIbfk1' => array(
          	'columns' => 'id_tip',
            'refTableClass' => 'Application_Model_DbTable_TipRacunara',
            'refColumns' => 'id'
        ),
        'RacunarIbfk2' => array(
          	'columns' => 'id_os',
            'refTableClass' => 'Application_Model_DbTable_OperativniSistem',
            'refColumns' => 'id'
        ),
        'RacunarIbfk3' => array(
          	'columns' => 'id_mb',
            'refTableClass' => 'Application_Model_DbTable_MaticnaPloca',
            'refColumns' => 'id'
        ),
        'RacunarIbfk4' => array(
          	'columns' => 'id_cpu',
            'refTableClass' => 'Application_Model_DbTable_Procesor',
            'refColumns' => 'id'
        )
    );
    



}
