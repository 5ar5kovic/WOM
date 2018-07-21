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
        
        if ($request->isPost()) {
            
            $naziv = $request->getParam('naziv');
            
            if ($form->isValid($request->getPost())) {
                $operativniSistemModel = new Application_Model_OperativniSistem();
                $id = (int) $request->getParam('id');
                $operativniSistemModel->setId($id != 0 ? $id : null)->setNaziv($naziv);
                $operativniSistemModel->save();
                $this->redirect('administracija/operativni-sistem-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $operativniSistemModel = new Application_Model_OperativniSistem();
            $data = $operativniSistemModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }

    public function operativniSistemBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $operativniSistemModel = new Application_Model_OperativniSistem();
        $operativniSistemModel->setId($id);
        $operativniSistemModel->deleteRowByPrimaryKey();
        $this->redirect('administracija/operativni-sistem-prikaz');
    }

    public function kvarPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_Kvar();
        $kvarovi = $myMapper->kvarSelect();
        $this->view->kvarovi = $kvarovi;
    }

    public function kvarUnosAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_KvarUnos();
        if ($request->isPost()) {
            $kvar = $request->getParam('kvar');
            if ($form->isValid($request->getPost())) {
                $kvarModel = new Application_Model_Kvar();
                $id = (int) $request->getParam('id');
                $kvarModel->setId($id != 0 ? $id : null)->setKvar($kvar);
                $kvarModel->save();
                $this->redirect('administracija/kvar-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $kvarModel = new Application_Model_Kvar();
            $data = $kvarModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }

    public function kvarBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $kvarModel = new Application_Model_Kvar();
        $kvarModel->setId($id);
        $kvarModel->deleteRowByPrimaryKey();
        $this->redirect('administracija/kvar-prikaz');
    }

    public function maticnaPlocaPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_MaticnaPloca();
        $maticnePloce = $myMapper->maticnaPlocaSelect();
        $this->view->maticnePloce = $maticnePloce;
    }
    
    public function maticnaPlocaUnosAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_MaticnaPlocaUnos();
        if ($request->isPost()) {
            $maticnaPloca = $request->getParam('naziv');
            if ($form->isValid($request->getPost())) {
                $maticnaPlocaModel = new Application_Model_MaticnaPloca();
                $id = (int) $request->getParam('id');
                $maticnaPlocaModel->setId($id != 0 ? $id : null)->setNaziv($naziv);
                $maticnaPlocaModel->save();
                $this->redirect('administracija/maticna-ploca-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $maticnaPlocaModel = new Application_Model_MaticnaPloca();
            $data = $maticnaPlocaModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }


    public function maticnaPlocaBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $maticnaPlocaModel = new Application_Model_MaticnaPloca();
        $maticnaPlocaModel->setId($id);
        $maticnaPlocaModel->deleteRowByPrimaryKey();
        $this->redirect('administracija/maticna-ploca-prikaz');
    }


}

















