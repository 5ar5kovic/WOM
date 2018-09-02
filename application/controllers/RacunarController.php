<?php
require 'fpdf/fpdf.php';

class RacunarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function racunarPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_Racunar();
        $racunari = $myMapper->racunarSelect();
        $this->view->racunari = $racunari;
    }

    public function racunarUnosAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $form = new Application_Form_RacunarUnos();
        
        if ($request->isPost()) {
            
            $naziv = $request->getParam('naziv');
            $id_tip = $request->getParam('tip');
            $id_os = $request->getParam('os');
            $id_mb = $request->getParam('mb');
            $id_cpu = $request->getParam('cpu');
            $id_korisnik = $request->getParam('korisnik');
            
            if ($form->isValid($request->getPost())) {
                $racunarModel = new Application_Model_Racunar();
                $id = (int) $request->getParam('id');
                $racunarModel->setId($id != 0 ? $id : null)
                ->setNaziv($naziv)
                ->setIdTip($id_tip)
                ->setIdOs($id_os)
                ->setIdMb($id_mb)
                ->setIdCpu($id_cpu)
                ->setIdKorisnik($id_korisnik);
                $racunarModel->save();
                $this->redirect('racunar/racunar-prikaz');
            }
        }
        
        if (! $request->isPost() && $id != null) {
            $racunarModel = new Application_Model_Racunar();
            $data = $racunarModel->find($id)->toArray();
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
    }

    public function racunarBrisanjeAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id', null);
        $racunarModel = new Application_Model_Racunar();
        $racunarModel->setId($id);
        $racunarModel->deleteRowByPrimaryKey();
        $this->redirect('racunar/racunar-prikaz');
    }
    
    
    


}







