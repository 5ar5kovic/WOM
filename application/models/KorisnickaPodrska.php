<?php

/**
 * Application Models
 *
 * @package Application_Model
 * @subpackage Model
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * 
 *
 * @package Application_Model
 * @subpackage Model
 * @author <YOUR NAME HERE>
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
    protected $_Username;

    /**
     * Database var type varchar(100)
     *
     * @var string
     */
    protected $_Password;

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
    protected $_IdRola;

    /**
     * Database var type varchar(100)
     *
     * @var string
     */
    protected $_RandomString;


    /**
     * Parent relation korisnicka_podrska_ibfk_1
     *
     * @var Application_Model_Rola
     */
    protected $_Rola;


    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'username'=>'Username',
            'password'=>'Password',
            'ime'=>'Ime',
            'prezime'=>'Prezime',
            'email'=>'Email',
            'tel'=>'Tel',
            'id_rola'=>'IdRola',
            'random_string'=>'RandomString',
        ));

        $this->setParentList(array(
            'KorisnickaPodrskaIbfk1'=> array(
                    'property' => 'Rola',
                    'table_name' => 'Rola',
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
     * Sets column username
     *
     * @param string $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setUsername($data)
    {
        $this->_Username = $data;
        return $this;
    }

    /**
     * Gets column username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->_Username;
    }

    /**
     * Sets column password
     *
     * @param string $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setPassword($data)
    {
        $this->_Password = $data;
        return $this;
    }

    /**
     * Gets column password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_Password;
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
     * Sets column id_rola
     *
     * @param int $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setIdRola($data)
    {
        $this->_IdRola = $data;
        return $this;
    }

    /**
     * Gets column id_rola
     *
     * @return int
     */
    public function getIdRola()
    {
        return $this->_IdRola;
    }

    /**
     * Sets column random_string
     *
     * @param string $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setRandomString($data)
    {
        $this->_RandomString = $data;
        return $this;
    }

    /**
     * Gets column random_string
     *
     * @return string
     */
    public function getRandomString()
    {
        return $this->_RandomString;
    }

    /**
     * Sets parent relation IdRola
     *
     * @param Application_Model_Rola $data
     * @return Application_Model_KorisnickaPodrska
     */
    public function setRola(Application_Model_Rola $data)
    {
        $this->_Rola = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdRola($primary_key);

        return $this;
    }

    /**
     * Gets parent IdRola
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Rola
     */
    public function getRola($load = true)
    {
        if ($this->_Rola === null && $load) {
            $this->getMapper()->loadRelated('KorisnickaPodrskaIbfk1', $this);
        }

        return $this->_Rola;
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
