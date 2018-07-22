<?php

class Application_Model_Mymapper_Korisnik extends Application_Model_Mapper_Korisnik
{

    public function korisnikSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
}