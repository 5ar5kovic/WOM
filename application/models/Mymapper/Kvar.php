<?php

class Application_Model_Mymapper_Kvar extends Application_Model_Mapper_Kvar
{

    public function kvarSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
}