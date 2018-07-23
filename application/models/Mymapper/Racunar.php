<?php

class Application_Model_Mymapper_Racunar extends Application_Model_Mapper_Racunar
{
    public function racunariSelect(){        
        $select = $this->getDbTable()->select();
        $result = $this->getDbTable()->fetchAll($select)->toArray();
        return $result;
    }
    public function pronadjiPoId($id){
        
        $where = $this->getDbTable()->select()->where("id = ?", $id);
        
        $result = $this->getDbTable()->fetchRow($where);
        
        return $result;
    }
}

