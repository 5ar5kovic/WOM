<?php

class Application_Model_Mymapper_RadniNalog extends Application_Model_Mapper_RadniNalog
{

    public function radniNaloziSelect($filteriJednako,$filteriManjeOd,$filteriVeceOd)
    {
        /*
         * $select = $db->select()
         * ->from(array('p' => 'products'),
         * array('product_id', 'product_name'))
         * ->join(array('l' => 'line_items'),
         * 'p.product_id = l.product_id',
         * array() ); // empty list of columns
         */
        $select = $this->getDbTable()
            ->select()
            ->from(array(
            'rn' => 'radni_nalog'
        ), array(
            'id',
            'vreme_kreiranja',
            'id_status',
            'opis_kvara',
            'opis_resenja',
            'vreme_zavrsetka'
        ))
            ->join(array(
            'kor' => 'korisnicka_podrska'
        ), 'rn.id_korisnicka = kor.id', array(
            'username'
        ))
            ->join(array(
            'rac' => 'racunar'
        ), 'rn.id_racunar = rac.id', array(
            'naziv'
        ))
            ->join(array(
            'kv' => 'kvar'
        ), 'rn.id_kvar = kv.id', array(
            'kvar'
        ))
            ->join(array(
            'st' => 'status'
        ), 'st.id = rn.id_status', array(
            'status'
        ));
            
        $brisiZadnja4 = false;
        
        if (count($filteriJednako) > 0) {
            $brisiZadnja4 = true;
            $whereString = "";
            foreach($filteriJednako as $key => $value){
                $whereString = $whereString . "$key = $value AND ";
            }
        }
        if (count($filteriManjeOd) > 0) {
            $brisiZadnja4 = true;
            $whereString = "";
            foreach($filteriManjeOd as $key => $value){
                $whereString = $whereString . "$key < $value AND ";
            }
        }
        if (count($filteriVeceOd) > 0) {
            $brisiZadnja4 = true;
            $whereString = "";
            foreach($filteriVeceOd as $key => $value){
                $whereString = $whereString . "$key > $value AND ";
            }
        }
        
        if($brisiZadnja4){            
            $whereString = substr($whereString, 0, -4);            
            $select = $select->where($whereString);
        }
                
        $select = $select->setIntegrityCheck(false);
        
        $rowSet = $this->getDbTable()->fetchAll($select);
        return $rowSet;
    }

    public function radniNaloziSelectByID($id)
    {
        $select = $this->getDbTable()
            ->select()
            ->where('id=?', $id);
        $rowSet = $this->getDbTable()->fetchAll($select);
        return $rowSet[0]['naziv'];
    }
}