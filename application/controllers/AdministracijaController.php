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
            $naziv = $request->getParam('naziv');
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

    public function procesorPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_Procesor();
        $procesori = $myMapper->procesorSelect();
        $this->view->procesori = $procesori;
    }

    public function procesorUnosAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_ProcesorUnos();
        if ($request->isPost()) {
            $naziv = $request->getParam('naziv');
            if ($form->isValid($request->getPost())) {
                $procesorModel = new Application_Model_Procesor();
                $id = (int) $request->getParam('id');
                $procesorModel->setId($id != 0 ? $id : null)->setNaziv($naziv);
                $procesorModel->save();
                $this->redirect('administracija/procesor-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $procesorModel = new Application_Model_Procesor();
            $data = $procesorModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }

    public function procesorBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $procesorModel = new Application_Model_Procesor();
        $procesorModel->setId($id);
        $procesorModel->deleteRowByPrimaryKey();
        $this->redirect('administracija/procesor-prikaz');
    }

    public function tipRacunaraPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_TipRacunara();
        $tipoviRacunara = $myMapper->tipRacunaraSelect();
        $this->view->tipoviRacunara = $tipoviRacunara;
    }

    public function tipRacunaraUnosAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_TipRacunaraUnos();
        if ($request->isPost()) {
            $naziv = $request->getParam('naziv');
            if ($form->isValid($request->getPost())) {
                $tipRacunaraModel = new Application_Model_TipRacunara();
                $id = (int) $request->getParam('id');
                $tipRacunaraModel->setId($id != 0 ? $id : null)->setNaziv($naziv);
                $tipRacunaraModel->save();
                $this->redirect('administracija/tip-racunara-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $tipRacunaraModel = new Application_Model_TipRacunara();
            $data = $tipRacunaraModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }

    public function tipRacunaraBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $tipRacunaraModel = new Application_Model_TipRacunara();
        $tipRacunaraModel->setId($id);
        $tipRacunaraModel->deleteRowByPrimaryKey();
        $this->redirect('administracija/tip-racunara-prikaz');
    }

    public function korisnikPrikazAction()
    {
        // action body
    }

    public function korisnikUnosAction()
    {
        // action body
    }

    public function korisnikBrisanjeAction()
    {
        // action body
    }


}





























