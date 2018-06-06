<?php

class AdministracijaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function operativniSistemiPrikazAction() {
        $myMapperOperativniSistemi = new Application_Model_Mymapper_OperativniSistemi();
        $operativniSistemi = $myMapperOperativniSistemi->operativniSistemiSelect();
        $this->view->operativniSistemi = $operativniSistemi;        
    }
    
    public function operativniSistemiUnosAction() {}
    public function operativniSistemiBrisanjeAction() {}


}



