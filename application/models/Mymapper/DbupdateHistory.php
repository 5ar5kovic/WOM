<?php
class Application_Model_Mymapper_DbupdateHistory extends Application_Model_Mapper_DbupdateHistory {
    
    
    public function insert(Application_Model_DbupdateHistory $model, $useTransaction = true)
    {
        
        $data = $model->toArray();
        if ($useTransaction) {
            $this->getDbTable()->getAdapter()->beginTransaction();
        }
        try {
            $success = $this->getDbTable()->insert($data);
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
    
}