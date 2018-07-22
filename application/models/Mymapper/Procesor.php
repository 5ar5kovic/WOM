<?php

class Application_Model_Mymapper_Procesor extends Application_Model_Mapper_Procesor
{

    public function procesorSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
}