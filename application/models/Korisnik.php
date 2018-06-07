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
class Application_Model_Korisnik extends Application_Model_ModelAbstract
{

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_Id;

    /**
     * Database var type varchar(60)
     *
     * @var string
     */
    protected $_Ime;

    /**
     * Database var type varchar(60)
     *
     * @var string
     */
    protected $_Prezime;

    /**
     * Database var type varchar(60)
     *
     * @var string
     */
    protected $_Email;

    /**
     * Database var type varchar(50)
     *
     * @var string
     */
    protected $_Tel;



    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'ime'=>'Ime',
            'prezime'=>'Prezime',
            'email'=>'Email',
            'tel'=>'Tel',
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
     * @return Application_Model_Korisnik
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
     * Sets column ime
     *
     * @param string $data
     * @return Application_Model_Korisnik
     */
    public function setIme($data)
    {
        $this->_Ime = $data;
        return $this;
    }

    /**
     * Gets column ime
     *
     * @return string
     */
    public function getIme()
    {
        return $this->_Ime;
    }

    /**
     * Sets column prezime
     *
     * @param string $data
     * @return Application_Model_Korisnik
     */
    public function setPrezime($data)
    {
        $this->_Prezime = $data;
        return $this;
    }

    /**
     * Gets column prezime
     *
     * @return string
     */
    public function getPrezime()
    {
        return $this->_Prezime;
    }

    /**
     * Sets column email
     *
     * @param string $data
     * @return Application_Model_Korisnik
     */
    public function setEmail($data)
    {
        $this->_Email = $data;
        return $this;
    }

    /**
     * Gets column email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_Email;
    }

    /**
     * Sets column tel
     *
     * @param string $data
     * @return Application_Model_Korisnik
     */
    public function setTel($data)
    {
        $this->_Tel = $data;
        return $this;
    }

    /**
     * Gets column tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->_Tel;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_Korisnik
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_Korisnik());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_Korisnik::delete
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
