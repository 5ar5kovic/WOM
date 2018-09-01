<?php

class Application_Model_Mymapper_Korisnik extends Application_Model_Mapper_Korisnik
{

    public function korisnikSelect()
    {
       $select = $this->getDbTable()->select();
       $result = $this->getDbTable()->fetchAll($select)->toArray();
       return $result;
    }
    
    public function korisnikSelectByID($id) {
        $select = $this->getDbTable()
        ->select()
        ->where('id=?', $id);
        $rowSet = $this->getDbTable()->fetchAll($select);
        return $rowSet[0]['ime'] . " " . $rowSet[0]['prezime'];
    }
    

    
}