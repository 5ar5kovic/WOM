<?php

include_once APPLICATION_PATH . '/Utils.php';
class KorisnickaAdministracijaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function dodajKorisnikaAction() {
        $request = $this->getRequest();
        
        $form = new Application_Form_KorisnickaPodrskaUnos();
        //var_dump($form);
        //exit;
        if($request->isPost()) {
            
            $username = $request->getParam('username');
            $password = $request->getParam('password');
            $ime = $request->getParam('ime');
            $prezime = $request->getParam('prezime');
            $email = $request->getParam('email');
            $tel = $request->getParam('telefon');
            $rola = (int)$request->getParam('rola');
            
            if($form->isValid($request->getPost())) {
                $korisnickaPodrskaModel = new Application_Model_KorisnickaPodrska();
                $korisnickaPodrskaModel->setUsername($username);
                $korisnickaPodrskaModel->setPassword($password);
                $korisnickaPodrskaModel->setIme($ime);
                $korisnickaPodrskaModel->setPrezime($prezime);
                $korisnickaPodrskaModel->setEmail($email);
                $korisnickaPodrskaModel->setTel($tel);
                $rolaModel = new Application_Model_Rola();
                $rolaModel = $rolaModel->find($rola);
                $korisnickaPodrskaModel->setRola($rolaModel);
                $result = $korisnickaPodrskaModel->save();
                if(!$result){   
                    $this->redirect('korisnickaAdministracija/index?result=failed');
                }
            } else {                
                $this->redirect('korisnickaAdministracija/index?result=failed');
            } 
            
            //salji mejl korisniku
            
            
            $this->redirect('korisnickaAdministracija/index');
            
            
        }
        
        $this->view->form = $form;
        
    }

}
?>
