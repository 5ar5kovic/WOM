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
    
    public function dodajNalogAction()
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
                
                $this->redirect(Constants::$radniNalogIndexPutanja);
            } else {
                
                var_dump($form->getErrors());
                exit;
            }
        }
        
        $this->view->form = $form;
        
    }
    
    public function listajNalogeAction()
    {
        // action body
    }


}

