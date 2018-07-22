<?php

class Application_Model_Mymapper_TipRacunara extends Application_Model_Mapper_TipRacunara
{

    public function tipRacunaraSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
    public function tipRacunaraSelectByID($id) {
        $select = $this->getDbTable()
        ->select()
        ->where('id=?', $id);
        var_dump($select);
        exit;
        $rowSet = $this->getDbTable()->fetchAll($select);
       
        return $rowSet['naziv'];
        
        
        
        
        
        
    }
    
    
}