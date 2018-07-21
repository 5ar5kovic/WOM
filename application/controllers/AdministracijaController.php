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

    public function operativniSistemUnosAction()
    {
        
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_OperativniSistemUnos();

        if($request->isPost()) {
            
            $naziv = $request->getParam('naziv');
            
            if($form->isValid($request->getPost())) {
                $operativniSistemModel = new Application_Model_OperativniSistem();
                $id = (int) $request->getParam('id');
                $operativniSistemModel->setId($id != 0 ? $id : null)
                ->setNaziv($naziv);
                $operativniSistemModel->save();
                $this->redirect('administracija/operativni-sistem-prikaz');
            }

            
        }
        
        if(!$request->isPost() && $id != null) {
            $operativniSistemModel = new Application_Model_OperativniSistem();
            $data = $operativniSistemModel->find($id)->toArray();
            $form->populate($data);
            
        }
        
        $this->view->form = $form;
        $this->view->id = $id;

        
    }
        
    public function operativniSistemBrisanjeAction()
    {
        
     
    }



}





