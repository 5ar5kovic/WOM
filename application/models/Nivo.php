<?php

/**
 * Application Models
 *
 * @package Application_Model
 * @subpackage Model
 * @author SpecNaz Team 9815
 * @copyright SpecNaz Team 9815
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * 
 *
 * @package Application_Model
 * @subpackage Model
 * @author SpecNaz Team 9815
 */
class Application_Model_Nivo extends Application_Model_ModelAbstract
{

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_Id;

    /**
     * Database var type varchar(50)
     *
     * @var string
     */
    protected $_Nivo;



    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'nivo'=>'Nivo',
        ));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
        ));
    }

    /**
     * Sets column id
     *
     * @param int $data
     * @return Application_Model_Nivo
     */
    public function setId($data)
    {
        $this->_Id = $data;
        return $this;
    }

    /**
     * Gets column id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_Id;
    }

    /**
     * Sets column nivo
     *
     * @param string $data
     * @return Application_Model_Nivo
     */
    public function setNivo($data)
    {
        $this->_Nivo = $data;
        return $this;
    }

    /**
     * Gets column nivo
     *
     * @return string
     */
    public function getNivo()
    {
        return $this->_Nivo;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_Nivo
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_Nivo());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_Nivo::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            throw new Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()
                    ->getDbTable()
                    ->delete('id = ' .
                             $this->getMapper()
                                  ->getDbTable()
                                  ->getAdapter()
                                  ->quote($this->getId()));
    }
}
