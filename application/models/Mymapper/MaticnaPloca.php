<?php

class Application_Model_Mymapper_MaticnaPloca extends Application_Model_Mapper_MaticnaPloca
{

    public function maticnaPlocaSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
}