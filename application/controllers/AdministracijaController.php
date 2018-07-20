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

    public function operativniSistemPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_OperativniSistem();
        $operativniSistemi = $myMapper->operativniSistemSelect();
        $this->view->operativniSistemi = $operativniSistemi;
    }

    public function operativniSistemBrisanjeAction()
    {
        
        $request = $this->_request;
        $operativniSistemId = $request->getParam('id', null);
        
        $operativniSistemModel = new Application_Model_OperativniSistem();
        $operativniSistemModel->setId($operativniSistemId);
        $operativniSistemModel->deleteRowByPrimaryKey();
        $this->redirect('/administracija/operativni-sistemi-prikaz');
        
        
    }

    public function operativniSistemUnosAction()
    {
        // action body
    }


}





