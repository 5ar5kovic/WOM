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
class Application_Model_DbupdateHistory extends Application_Model_ModelAbstract
{

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_Id;

    /**
     * Database var type text
     *
     * @var string
     */
    protected $_Query;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_DatumIzmene;

    /**
     * Database var type text
     *
     * @var string
     */
    protected $_Opis;



    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'query'=>'Query',
            'datum_izmene'=>'DatumIzmene',
            'opis'=>'Opis',
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
     * @return Application_Model_DbupdateHistory
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
     * Sets column query
     *
     * @param string $data
     * @return Application_Model_DbupdateHistory
     */
    public function setQuery($data)
    {
        $this->_Query = $data;
        return $this;
    }

    /**
     * Gets column query
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->_Query;
    }

    /**
     * Sets column datum_izmene. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return Application_Model_DbupdateHistory
     */
    public function setDatumIzmene($data)
    {
        if (! empty($data)) {
            if (! $data instanceof Zend_Date) {
                $data = new Zend_Date($data);
            }

            $data = $data->toString('yyyy-MM-dd HH:mm:ss');
        }

        $this->_DatumIzmene = $data;
        return $this;
    }

    /**
     * Gets column datum_izmene
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getDatumIzmene($returnZendDate = false)
    {
        if ($returnZendDate) {
            if ($this->_DatumIzmene === null) {
                return null;
            }

            return new Zend_Date($this->_DatumIzmene, Zend_Date::ISO_8601);
        }

        return $this->_DatumIzmene;
    }

    /**
     * Sets column opis
     *
     * @param string $data
     * @return Application_Model_DbupdateHistory
     */
    public function setOpis($data)
    {
        $this->_Opis = $data;
        return $this;
    }

    /**
     * Gets column opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->_Opis;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_DbupdateHistory
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_DbupdateHistory());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_DbupdateHistory::delete
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
