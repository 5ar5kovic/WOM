<?php

class Application_Model_Mymapper_KorisnickaPodrska extends Application_Model_Mapper_KorisnickaPodrska
{
    
    public function pronadjiPoMejlu($email,$randomString)
    {             
        
        $where = $this->getDbTable()->select()->where("email = ?", $email);             
        
        $result = $this->getDbTable()->fetchRow($where);
        
        return $result;
    }
    
    public function pronadjiPoTokenu($token){
        
        $where = $this->getDbTable()->select()->where("random_string = ?", $token);
        
        $result = $this->getDbTable()->fetchRow($where);
        
        return $result;
    }
    public function pronadjiPoId($id){
        
        $where = $this->getDbTable()->select()->where("id = ?", $id);
        
        $result = $this->getDbTable()->fetchRow($where);
        
        return $result;
    }
    public function korisnickaPodrskaSelect() {
        $select = $this->getDbTable()->select();
        $result = $this->getDbTable()->fetchAll($select)->toArray();
        return $result;
    }
}