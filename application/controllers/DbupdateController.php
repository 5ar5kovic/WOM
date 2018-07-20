<?php

class DbupdateController extends Zend_Controller_Action
{

    public function init()
    {}

    public function indexAction()
    {

    }
    
    public function executeAction()
    {
        global $dbUpdate;
        include_once('../data/dbupdate.php');
        
        $poruke = array();
        
        foreach($dbUpdate as $dbup) {
            
            $myMapper = new Application_Model_Mymapper_DbupdateHistory();
            $modelDbupdateHistory = new Application_Model_DbupdateHistory();
            
            $postoji = $myMapper->find($dbup['id'], $modelDbupdateHistory);
            
            
            if ($postoji == null) {
                $poruke[$dbup['id']] = $myMapper->getDbTable()->getAdapter()->prepare($dbup['query'])->execute($dbup['params']);
                
                $modelDbupdateHistory->setId($dbup['id']);
                $modelDbupdateHistory->setQuery($dbup['query']);
                $modelDbupdateHistory->setDatumIzmene(Zend_Date::now());
                $modelDbupdateHistory->setOpis($dbup['opis']);
                $success = $myMapper->insert($modelDbupdateHistory);
                if(!$success) {
                    $poruke[$dbup['id']] = "Greška prilikom registracije dopune u tabelu dbupdate_history";
                }
            } else {
                $poruke[$dbup['id']] = "Upit je već izvršen";
            }
            
            
        }
        
        $this->view->dbUpdate = $dbUpdate;
        $this->view->poruke = $poruke;
    }
}



