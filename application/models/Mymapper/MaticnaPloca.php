<?php

class Application_Model_Mymapper_MaticnaPloca extends Application_Model_Mapper_MaticnaPloca
{

    public function maticnaPlocaSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
    public function maticnaPlocaSelectByID($id) {
        $select = $this->getDbTable()
        ->select()
        ->where('id=?', $id);
        $rowSet = $this->getDbTable()->fetchAll($select);
        return $rowSet[0]['naziv'];
    }

    
}