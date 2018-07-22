<?php

class Application_Model_Mymapper_Racunar extends Application_Model_Mapper_Racunar
{

    public function racunarSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
    
    
    
}