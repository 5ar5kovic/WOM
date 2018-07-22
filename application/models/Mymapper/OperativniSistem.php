<?php

class Application_Model_Mymapper_OperativniSistem extends Application_Model_Mapper_OperativniSistem
{

    public function operativniSistemSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
    
}