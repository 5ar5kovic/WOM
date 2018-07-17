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
class Application_Model_Status extends Application_Model_ModelAbstract
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
    protected $_Status;



    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'status'=>'Status',
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
     * @return Application_Model_Status
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
     * Sets column status
     *
     * @param string $data
     * @return Application_Model_Status
     */
    public function setStatus($data)
    {
        $this->_Status = $data;
        return $this;
    }

    /**
     * Gets column status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->_Status;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_Status
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_Status());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_Status::delete
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
