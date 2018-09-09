<?php

include_once APPLICATION_PATH . "/configs/Constants.php";

class RadniNalogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        // action body
    }
    
    public function radniNalogUnosAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_RadniNalogUnos();       
        
        if ($request->isPost()) {
            
            $idKorisnicka = $request->getParam('korisnicka');
            $idRacunar = $request->getParam('racunar');
            $idKvar = $request->getParam('kvar');
            $opis = $request->getParam('opisKvara');
            
           
            if ($form->isValid($this->_request->getPost())) {
                
                $radniNalog = new Application_Model_RadniNalog();
                
                $myMapper1 = new Application_Model_KorisnickaPodrska();
                $korisnik = $myMapper1->find($idKorisnicka);
                
                $myMapper2 = new Application_Model_Racunar();
                $racunar = $myMapper2->find($idRacunar);
                
                $myMapper3 = new Application_Model_Kvar();
                $kvar = $myMapper3->find($idKvar);
                
                $radniNalog->setKorisnickaPodrska($korisnik);
                $radniNalog->setRacunar($racunar);
                $radniNalog->setKvar($kvar);
                
                $status = new Application_Model_Status();
                $status = $status->find(1);
                $radniNalog->setStatus($status);
                
                $radniNalog->setVremeKreiranja(date(Constants::$formatVremena));
                
                $radniNalog->setOpisKvara($opis);
                
                $radniNalog->save();   
                
                $this->redirect(Constants::$radniNalogPrikazPutanja);
            } 
        }
        
        $this->view->form = $form;
        
    }
    
    public function radniNalogPrikazAction()
    {
        
        $request = $this->getRequest();
        
        $page = $this->_request->getParam('page');
        if(empty($page)){
            $page=1;
        }        
        
        $myMapper = new Application_Model_Mymapper_RadniNalog();
        //var_dump($radniNalozi);
        //exit;
        
        $filterForma = new Application_Form_RadniNaloziPrikaz();
        
        $filteriJednako = array();
        $filteriManjeOd = array();
        $filteriVeceOd = array();
        $filteriLike = array();
                    
        $username = $request->getParam('username');
        $kvar = $request->getParam('kvar');
        $racunar = $request->getParam('racunar');
        $odDatuma = $request->getParam('odDatuma');
        $doDatuma = $request->getParam('doDatuma');
        $status = $request->getParam('status');
        $opis = $request->getParam('opis');
        
        if($username != null && $username!= "" && (int)$username != 0){
            $filteriJednako["id_korisnicka"] = $username;
        }
        if($kvar != null && $kvar!= "" && (int)$kvar != 0){
            $filteriJednako["id_kvar"] = $kvar;
        }
        if($racunar != null && $racunar!= "" && (int)$racunar != 0){
            $filteriJednako["id_racunar"] = $racunar;
        }
        if($odDatuma != null && $odDatuma!= ""){
            $filteriVeceOd["vreme_kreiranja"] = $odDatuma;
        }
        if($doDatuma != null && $doDatuma!= ""){
            $filteriManjeOd["vreme_kreiranja"] = $doDatuma;
        }
        if($status != null && $status!= "" && (int)$status != 0){
            $filteriJednako["id_status"] = $status;     
        }  
        if($opis != null && $opis!= ""){
            $filteriLike["opis_kvara"] = $opis;
        }  
        
        $data = array();
        $data['username'] = $username;
        $data['racunar'] = $racunar;
        $data['kvar'] = $kvar;
        $data['odDatuma'] = $odDatuma;
        $data['doDatuma'] = $doDatuma;
        $data['status'] = $status;
        $data['opis'] = $opis;
        
        
        $filterForma->populate($data);
        
        $radniNalozi = $myMapper->radniNaloziSelect($filteriJednako,$filteriManjeOd,$filteriVeceOd,$filteriLike,$page);
        
        $this->view->radniNalozi = $radniNalozi;
        $this->view->form = $filterForma;
    }
    
    public function radniNalogBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $radniNalogModel = new Application_Model_RadniNalog();
        $radniNalogModel->setId($id);
        $radniNalogModel->deleteRowByPrimaryKey();
        $this->redirect('radniNalog/radni-nalog-prikaz');
    }


}

