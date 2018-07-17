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
class Application_Model_RadniNalog extends Application_Model_ModelAbstract
{

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_Id;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdKorisnicka;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdRacunar;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdKvar;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_VremeKreiranja;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdStatus;

    /**
     * Database var type text
     *
     * @var string
     */
    protected $_OpisKvara;

    /**
     * Database var type text
     *
     * @var string
     */
    protected $_OpisResenja;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_VremeZavrsetka;


    /**
     * Parent relation radni_nalog_ibfk_1
     *
     * @var Application_Model_KorisnickaPodrska
     */
    protected $_KorisnickaPodrska;

    /**
     * Parent relation radni_nalog_ibfk_2
     *
     * @var Application_Model_Racunar
     */
    protected $_Racunar;

    /**
     * Parent relation radni_nalog_ibfk_3
     *
     * @var Application_Model_Kvar
     */
    protected $_Kvar;

    /**
     * Parent relation radni_nalog_ibfk_4
     *
     * @var Application_Model_Status
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
            'id_korisnicka'=>'IdKorisnicka',
            'id_racunar'=>'IdRacunar',
            'id_kvar'=>'IdKvar',
            'vreme_kreiranja'=>'VremeKreiranja',
            'id_status'=>'IdStatus',
            'opis_kvara'=>'OpisKvara',
            'opis_resenja'=>'OpisResenja',
            'vreme_zavrsetka'=>'VremeZavrsetka',
        ));

        $this->setParentList(array(
            'RadniNalogIbfk1'=> array(
                    'property' => 'KorisnickaPodrska',
                    'table_name' => 'KorisnickaPodrska',
                ),
            'RadniNalogIbfk2'=> array(
                    'property' => 'Racunar',
                    'table_name' => 'Racunar',
                ),
            'RadniNalogIbfk3'=> array(
                    'property' => 'Kvar',
                    'table_name' => 'Kvar',
                ),
            'RadniNalogIbfk4'=> array(
                    'property' => 'Status',
                    'table_name' => 'Status',
                ),
        ));

        $this->setDependentList(array(
        ));
    }

    /**
     * Sets column id
     *
     * @param int $data
     * @return Application_Model_RadniNalog
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
     * Sets column id_korisnicka
     *
     * @param int $data
     * @return Application_Model_RadniNalog
     */
    public function setIdKorisnicka($data)
    {
        $this->_IdKorisnicka = $data;
        return $this;
    }

    /**
     * Gets column id_korisnicka
     *
     * @return int
     */
    public function getIdKorisnicka()
    {
        return $this->_IdKorisnicka;
    }

    /**
     * Sets column id_racunar
     *
     * @param int $data
     * @return Application_Model_RadniNalog
     */
    public function setIdRacunar($data)
    {
        $this->_IdRacunar = $data;
        return $this;
    }

    /**
     * Gets column id_racunar
     *
     * @return int
     */
    public function getIdRacunar()
    {
        return $this->_IdRacunar;
    }

    /**
     * Sets column id_kvar
     *
     * @param int $data
     * @return Application_Model_RadniNalog
     */
    public function setIdKvar($data)
    {
        $this->_IdKvar = $data;
        return $this;
    }

    /**
     * Gets column id_kvar
     *
     * @return int
     */
    public function getIdKvar()
    {
        return $this->_IdKvar;
    }

    /**
     * Sets column vreme_kreiranja. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return Application_Model_RadniNalog
     */
    public function setVremeKreiranja($data)
    {
        if (! empty($data)) {
            if (! $data instanceof Zend_Date) {
                $data = new Zend_Date($data);
            }

            $data = $data->toString('yyyy-MM-dd HH:mm:ss');
        }

        $this->_VremeKreiranja = $data;
        return $this;
    }

    /**
     * Gets column vreme_kreiranja
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getVremeKreiranja($returnZendDate = false)
    {
        if ($returnZendDate) {
            if ($this->_VremeKreiranja === null) {
                return null;
            }

            return new Zend_Date($this->_VremeKreiranja, Zend_Date::ISO_8601);
        }

        return $this->_VremeKreiranja;
    }

    /**
     * Sets column id_status
     *
     * @param int $data
     * @return Application_Model_RadniNalog
     */
    public function setIdStatus($data)
    {
        $this->_IdStatus = $data;
        return $this;
    }

    /**
     * Gets column id_status
     *
     * @return int
     */
    public function getIdStatus()
    {
        return $this->_IdStatus;
    }

    /**
     * Sets column opis_kvara
     *
     * @param string $data
     * @return Application_Model_RadniNalog
     */
    public function setOpisKvara($data)
    {
        $this->_OpisKvara = $data;
        return $this;
    }

    /**
     * Gets column opis_kvara
     *
     * @return string
     */
    public function getOpisKvara()
    {
        return $this->_OpisKvara;
    }

    /**
     * Sets column opis_resenja
     *
     * @param string $data
     * @return Application_Model_RadniNalog
     */
    public function setOpisResenja($data)
    {
        $this->_OpisResenja = $data;
        return $this;
    }

    /**
     * Gets column opis_resenja
     *
     * @return string
     */
    public function getOpisResenja()
    {
        return $this->_OpisResenja;
    }

    /**
     * Sets column vreme_zavrsetka. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return Application_Model_RadniNalog
     */
    public function setVremeZavrsetka($data)
    {
        if (! empty($data)) {
            if (! $data instanceof Zend_Date) {
                $data = new Zend_Date($data);
            }

            $data = $data->toString('yyyy-MM-dd HH:mm:ss');
        }

        $this->_VremeZavrsetka = $data;
        return $this;
    }

    /**
     * Gets column vreme_zavrsetka
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getVremeZavrsetka($returnZendDate = false)
    {
        if ($returnZendDate) {
            if ($this->_VremeZavrsetka === null) {
                return null;
            }

            return new Zend_Date($this->_VremeZavrsetka, Zend_Date::ISO_8601);
        }

        return $this->_VremeZavrsetka;
    }

    /**
     * Sets parent relation IdKorisnicka
     *
     * @param Application_Model_KorisnickaPodrska $data
     * @return Application_Model_RadniNalog
     */
    public function setKorisnickaPodrska(Application_Model_KorisnickaPodrska $data)
    {
        $this->_KorisnickaPodrska = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdKorisnicka($primary_key);

        return $this;
    }

    /**
     * Gets parent IdKorisnicka
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_KorisnickaPodrska
     */
    public function getKorisnickaPodrska($load = true)
    {
        if ($this->_KorisnickaPodrska === null && $load) {
            $this->getMapper()->loadRelated('RadniNalogIbfk1', $this);
        }

        return $this->_KorisnickaPodrska;
    }

    /**
     * Sets parent relation IdRacunar
     *
     * @param Application_Model_Racunar $data
     * @return Application_Model_RadniNalog
     */
    public function setRacunar(Application_Model_Racunar $data)
    {
        $this->_Racunar = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdRacunar($primary_key);

        return $this;
    }

    /**
     * Gets parent IdRacunar
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Racunar
     */
    public function getRacunar($load = true)
    {
        if ($this->_Racunar === null && $load) {
            $this->getMapper()->loadRelated('RadniNalogIbfk2', $this);
        }

        return $this->_Racunar;
    }

    /**
     * Sets parent relation IdKvar
     *
     * @param Application_Model_Kvar $data
     * @return Application_Model_RadniNalog
     */
    public function setKvar(Application_Model_Kvar $data)
    {
        $this->_Kvar = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdKvar($primary_key);

        return $this;
    }

    /**
     * Gets parent IdKvar
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Kvar
     */
    public function getKvar($load = true)
    {
        if ($this->_Kvar === null && $load) {
            $this->getMapper()->loadRelated('RadniNalogIbfk3', $this);
        }

        return $this->_Kvar;
    }

    /**
     * Sets parent relation IdStatus
     *
     * @param Application_Model_Status $data
     * @return Application_Model_RadniNalog
     */
    public function setStatus(Application_Model_Status $data)
    {
        $this->_Status = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdStatus($primary_key);

        return $this;
    }

    /**
     * Gets parent IdStatus
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Status
     */
    public function getStatus($load = true)
    {
        if ($this->_Status === null && $load) {
            $this->getMapper()->loadRelated('RadniNalogIbfk4', $this);
        }

        return $this->_Status;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_RadniNalog
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_RadniNalog());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_RadniNalog::delete
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
