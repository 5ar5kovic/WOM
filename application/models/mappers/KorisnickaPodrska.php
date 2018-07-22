<?php

/**
 * Application Model Mappers
 *
 * @package Application_Model
 * @subpackage Mapper
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Application_Model_KorisnickaPodrska
 *
 * @package Application_Model
 * @subpackage Mapper
 * @author <YOUR NAME HERE>
 */
class Application_Model_Mapper_KorisnickaPodrska extends Application_Model_Mapper_MapperAbstract
{
    /**
     * Returns an array, keys are the field names.
     *
     * @param Application_Model_KorisnickaPodrska $model
     * @return array
     */
    public function toArray($model)
    {
        if (! $model instanceof Application_Model_KorisnickaPodrska) {
            throw new Exception('Unable to create array: invalid model passed to mapper');
        }

        $result = array(
            'id' => $model->getId(),
            'username' => $model->getUsername(),
            'password' => $model->getPassword(),
            'ime' => $model->getIme(),
            'prezime' => $model->getPrezime(),
            'email' => $model->getEmail(),
            'tel' => $model->getTel(),
            'id_rola' => $model->getIdRola(),
            'random_string' => $model->getRandomString(),
        );

        return $result;
    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return 
     */
    public function getDbTable()
    {
        if ($this->_dbTable === null) {
            $this->setDbTable('Application_Model_DbTable_KorisnickaPodrska');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param Application_Model_KorisnickaPodrska $model The model to delete
     * @param boolean $useTransaction Flag to indicate if delete should be done inside a database transaction
     * @see Application_Model_DbTable_TableAbstract::delete()
     * @return int
     */
    public function delete($model, $useTransaction = true)
    {
        if (! $model instanceof Application_Model_KorisnickaPodrska) {
            throw new Exception('Unable to delete: invalid model passed to mapper');
        }

        if ($useTransaction) {
            $this->getDbTable()->getAdapter()->beginTransaction();
        }
        try {
            $where = $this->getDbTable()->getAdapter()->quoteInto('id = ?', $model->getId());
            $result = $this->getDbTable()->delete($where);

            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->commit();
            }
        } catch (Exception $e) {
            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();
            }
            $result = false;
        }

        return $result;
    }

    /**
     * Saves current row, and optionally dependent rows
     *
     * @param Application_Model_KorisnickaPodrska $model
     * @param boolean $ignoreEmptyValues Should empty values saved
     * @param boolean $recursive Should the object graph be walked for all related elements
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return boolean If the save action was successful
     */
    public function save(Application_Model_KorisnickaPodrska $model,
        $ignoreEmptyValues = true, $recursive = false, $useTransaction = true
    ) {
        $data = $model->toArray();
        if ($ignoreEmptyValues) {
            foreach ($data as $key => $value) {
                if ($value === null or $value === '') {
                    unset($data[$key]);
                }
            }
        }

        $primary_key = $model->getId();
        $success = true;

        if ($useTransaction) {
            $this->getDbTable()->getAdapter()->beginTransaction();
        }

        unset($data['id']);

        try {
            if ($primary_key === null) {
                $primary_key = $this->getDbTable()->insert($data);
                if ($primary_key) {
                    $model->setId($primary_key);
                } else {
                    $success = false;
                }
            } else {
                $this->getDbTable()
                     ->update($data,
                              array(
                                 'id = ?' => $primary_key
                              )
                );
            }

            if ($useTransaction && $success) {
                $this->getDbTable()->getAdapter()->commit();
            } elseif ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();
            }

        } catch (Exception $e) {
            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();
            }

            $success = false;
        }

        return $success;
    }

    /**
     * Finds row by primary key
     *
     * @param int $primary_key
     * @param Application_Model_KorisnickaPodrska|null $model
     * @return Application_Model_KorisnickaPodrska|null The object provided or null if not found
     */
    public function find($primary_key, $model)
    {
        $result = $this->getRowset($primary_key);

        if (is_null($result)) {
            return null;
        }

        $row = $result->current();

        $model = $this->loadModel($row, $model);

        return $model;
    }

    /**
     * Loads the model specific data into the model object
     *
     * @param Zend_Db_Table_Row_Abstract|array $data The data as returned from a Zend_Db query
     * @param Application_Model_KorisnickaPodrska|null $entry The object to load the data into, or null to have one created
     * @return Application_Model_KorisnickaPodrska The model with the data provided
     */
    public function loadModel($data, $entry)
    {
        if ($entry === null) {
            $entry = new Application_Model_KorisnickaPodrska();
        }

        if (is_array($data)) {
            $entry->setId($data['id'])
                  ->setUsername($data['username'])
                  ->setPassword($data['password'])
                  ->setIme($data['ime'])
                  ->setPrezime($data['prezime'])
                  ->setEmail($data['email'])
                  ->setTel($data['tel'])
                  ->setIdRola($data['id_rola'])
                  ->setRandomString($data['random_string']);
        } elseif ($data instanceof Zend_Db_Table_Row_Abstract || $data instanceof stdClass) {
            $entry->setId($data->id)
                  ->setUsername($data->username)
                  ->setPassword($data->password)
                  ->setIme($data->ime)
                  ->setPrezime($data->prezime)
                  ->setEmail($data->email)
                  ->setTel($data->tel)
                  ->setIdRola($data->id_rola)
                  ->setRandomString($data->random_string);
        }

        $entry->setMapper($this);

        return $entry;
    }
}
