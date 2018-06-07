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
class Application_Model_Racunar extends Application_Model_ModelAbstract
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
    protected $_Naziv;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdTip;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdOs;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdMb;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdCpu;

    /**
     * Database var type int(11)
     *
     * @var int
     */
    protected $_IdKorisnik;


    /**
     * Parent relation racunar_ibfk_1
     *
     * @var Application_Model_TipRacunara
     */
    protected $_TipRacunara;

    /**
     * Parent relation racunar_ibfk_2
     *
     */
    protected $_OperativniSistem;

    /**
     * Parent relation racunar_ibfk_3
     *
     * @var Application_Model_MaticnaPloca
     */
    protected $_MaticnaPloca;

    /**
     * Parent relation racunar_ibfk_4
     *
     * @var Application_Model_Procesor
     */
    protected $_Procesor;


    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        parent::init();
        $this->setColumnsList(array(
            'id'=>'Id',
            'naziv'=>'Naziv',
            'id_tip'=>'IdTip',
            'id_os'=>'IdOs',
            'id_mb'=>'IdMb',
            'id_cpu'=>'IdCpu',
            'id_korisnik'=>'IdKorisnik',
        ));

        $this->setParentList(array(
            'RacunarIbfk1'=> array(
                    'property' => 'TipRacunara',
                    'table_name' => 'TipRacunara',
                ),
            'RacunarIbfk2'=> array(
                    'property' => 'OperativniSistem',
                    'table_name' => 'OperativniSistem',
                ),
            'RacunarIbfk3'=> array(
                    'property' => 'MaticnaPloca',
                    'table_name' => 'MaticnaPloca',
                ),
            'RacunarIbfk4'=> array(
                    'property' => 'Procesor',
                    'table_name' => 'Procesor',
                ),
        ));

        $this->setDependentList(array(
        ));
    }

    /**
     * Sets column id
     *
     * @param int $data
     * @return Application_Model_Racunar
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
     * Sets column naziv
     *
     * @param string $data
     * @return Application_Model_Racunar
     */
    public function setNaziv($data)
    {
        $this->_Naziv = $data;
        return $this;
    }

    /**
     * Gets column naziv
     *
     * @return string
     */
    public function getNaziv()
    {
        return $this->_Naziv;
    }

    /**
     * Sets column id_tip
     *
     * @param int $data
     * @return Application_Model_Racunar
     */
    public function setIdTip($data)
    {
        $this->_IdTip = $data;
        return $this;
    }

    /**
     * Gets column id_tip
     *
     * @return int
     */
    public function getIdTip()
    {
        return $this->_IdTip;
    }

    /**
     * Sets column id_os
     *
     * @param int $data
     * @return Application_Model_Racunar
     */
    public function setIdOs($data)
    {
        $this->_IdOs = $data;
        return $this;
    }

    /**
     * Gets column id_os
     *
     * @return int
     */
    public function getIdOs()
    {
        return $this->_IdOs;
    }

    /**
     * Sets column id_mb
     *
     * @param int $data
     * @return Application_Model_Racunar
     */
    public function setIdMb($data)
    {
        $this->_IdMb = $data;
        return $this;
    }

    /**
     * Gets column id_mb
     *
     * @return int
     */
    public function getIdMb()
    {
        return $this->_IdMb;
    }

    /**
     * Sets column id_cpu
     *
     * @param int $data
     * @return Application_Model_Racunar
     */
    public function setIdCpu($data)
    {
        $this->_IdCpu = $data;
        return $this;
    }

    /**
     * Gets column id_cpu
     *
     * @return int
     */
    public function getIdCpu()
    {
        return $this->_IdCpu;
    }

    /**
     * Sets column id_korisnik
     *
     * @param int $data
     * @return Application_Model_Racunar
     */
    public function setIdKorisnik($data)
    {
        $this->_IdKorisnik = $data;
        return $this;
    }

    /**
     * Gets column id_korisnik
     *
     * @return int
     */
    public function getIdKorisnik()
    {
        return $this->_IdKorisnik;
    }

    /**
     * Sets parent relation IdTip
     *
     * @param Application_Model_TipRacunara $data
     * @return Application_Model_Racunar
     */
    public function setTipRacunara(Application_Model_TipRacunara $data)
    {
        $this->_TipRacunara = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdTip($primary_key);

        return $this;
    }

    /**
     * Gets parent IdTip
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_TipRacunara
     */
    public function getTipRacunara($load = true)
    {
        if ($this->_TipRacunara === null && $load) {
            $this->getMapper()->loadRelated('RacunarIbfk1', $this);
        }

        return $this->_TipRacunara;
    }

    /**
     * Sets parent relation IdOs
     *
     * @return Application_Model_Racunar
     */
    public function setOperativniSistem(Application_Model_OperativniSistem $data)
    {
        $this->_OperativniSistem = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdOs($primary_key);

        return $this;
    }

    /**
     * Gets parent IdOs
     *
     * @param boolean $load Load the object if it is not already
     */
    public function getOperativniSistem($load = true)
    {
        if ($this->_OperativniSistem === null && $load) {
            $this->getMapper()->loadRelated('RacunarIbfk2', $this);
        }

        return $this->_OperativniSistem;
    }

    /**
     * Sets parent relation IdMb
     *
     * @param Application_Model_MaticnaPloca $data
     * @return Application_Model_Racunar
     */
    public function setMaticnaPloca(Application_Model_MaticnaPloca $data)
    {
        $this->_MaticnaPloca = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdMb($primary_key);

        return $this;
    }

    /**
     * Gets parent IdMb
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_MaticnaPloca
     */
    public function getMaticnaPloca($load = true)
    {
        if ($this->_MaticnaPloca === null && $load) {
            $this->getMapper()->loadRelated('RacunarIbfk3', $this);
        }

        return $this->_MaticnaPloca;
    }

    /**
     * Sets parent relation IdCpu
     *
     * @param Application_Model_Procesor $data
     * @return Application_Model_Racunar
     */
    public function setProcesor(Application_Model_Procesor $data)
    {
        $this->_Procesor = $data;

        $primary_key = $data->getPrimaryKey();
        if (is_array($primary_key)) {
            $primary_key = $primary_key['id'];
        }

        $this->setIdCpu($primary_key);

        return $this;
    }

    /**
     * Gets parent IdCpu
     *
     * @param boolean $load Load the object if it is not already
     * @return Application_Model_Procesor
     */
    public function getProcesor($load = true)
    {
        if ($this->_Procesor === null && $load) {
            $this->getMapper()->loadRelated('RacunarIbfk4', $this);
        }

        return $this->_Procesor;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Application_Model_Mapper_Racunar
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {
            $this->setMapper(new Application_Model_Mapper_Racunar());
        }

        return $this->_mapper;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
	 * @see Application_Model_Mapper_Racunar::delete
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
