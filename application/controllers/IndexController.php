<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        global $dbUpdate;
        require_once '../data/dbupdate.php';
        
        $myMapper = new Application_Model_Mymapper_DbupdateHistory();
        
        $poslednjiBrojUpitaIzSkripte = sizeof($dbUpdate);
        $poslednjiBrojUpitaIzBaze = $myMapper->getLastId();
        
        $postojeUpitiZaIzvrsenje = false;
        
        if ($poslednjiBrojUpitaIzSkripte > $poslednjiBrojUpitaIzBaze) {
            $postojeUpitiZaIzvrsenje = true;
        }
        
        $this->view->postojeUpitiZaIzvrsenje = $postojeUpitiZaIzvrsenje;
               
    }
    
    
    


}

