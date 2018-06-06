<?php

class Application_Model_Mymapper_OperativniSistemi extends Application_Model_Mapper_OperativniSistemi
{

    public function operativniSistemiSelect()
    {
        $select = $this->getDbTable()
            ->select()
            ->where('naziv is not null')
            ->ored(array(
            'naziv'
        ));
        $rowSet = $this->getDbTable()->fetchAll($select);
        $entries = array();
        foreach ($rowSet as $row) {
            $entry = self::loadModel($row, null);
            $entries[] = $entry;
        }
        return $entries;
    }
}