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
class Application_Model_KorisnickaPodrska extends Application_Model_ModelAbstract
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
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdNivo;


    /**
     * Parent relation korisnicka_podrska_ibfk_1
     *
     * @var Application_Model_Nivo
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
            'ime'=>'Ime',
            'prezime'=>'Prezime',
            'email'=>'Email',
            'tel'=>'Tel',
            'id_nivo'=>'IdNivo',
        ));

        $this->setParentList(array(
            'KorisnickaPodrskaIbfk1'=> array(
                    'property' => 'Nivo',
                    'table_name' => 'Nivo',
                ),
        ));

        $this->setDependentList(array(
        ));
    }

    /**
     * Sets column id
     *
     * @param int $data
     * @return Application_Model_KorisnickaPodrska
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
     * @return Application_Model_KorisnickaPodrska
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
     * @return Application_Model_KorisnickaPodrska
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
     * @return Application_Model_KorisnickaPodrska
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
     * @return Application_Model_KorisnickaPodrska
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
     * Sets column id_nivo
     *
     * @param int $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setIdNivo($data)
    {
        $this->_IdNivo = $data;
        return $this;
    }

    /**
     * Gets column id_nivo
     *
     * @return int
     */
    public function getIdNivo()
    {
        return $this->_IdNivo;
    }

    /**
     * Sets parent relation IdNivo
     *
     * @param Application_Model_Nivo $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setNivo(Application_Model_Nivo $data)
    {
        $this->_Nivo = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdNivo($primary_key);

        return $this;
    }

    /**
     * Gets parent IdNivo
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Nivo
     */
    public function getNivo($load = true)
    {
        if ($this->_Nivo === null && $load) {
            $this->getMapper()->loadRelated('KorisnickaPodrskaIbfk1', $this);
        }

        return $this->_Nivo;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_KorisnickaPodrska
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_KorisnickaPodrska());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_KorisnickaPodrska::delete
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
