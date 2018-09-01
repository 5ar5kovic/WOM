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
    
    public function korisnickaAdministracijaPrikazAction()
    {
        $myMapper = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnici = $myMapper->korisnickaPodrskaSelectKorisnike();
        $this->view->korisnici = $korisnici;
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
                $korisnickaPodrskaModel->setPassword(Utils::getHashedValue($password));
                $korisnickaPodrskaModel->setIme($ime);
                $korisnickaPodrskaModel->setPrezime($prezime);
                $korisnickaPodrskaModel->setEmail($email);
                $korisnickaPodrskaModel->setTel($tel);
                $rolaModel = new Application_Model_Rola();
                $rolaModel = $rolaModel->find($rola);
                $korisnickaPodrskaModel->setRola($rolaModel);
                $result = $korisnickaPodrskaModel->save();
                if(!$result){
                    $this->redirect('korisnickaAdministracija/index?result=failed1');
                }
            } else {
                $this->redirect('korisnickaAdministracija/index?result=failed2');
            }
            
            //salji mejl korisniku
            $templateParams = array("username"=>$username, "password"=>$password);
            Utils::sendEmail("pozivNaPlatformuTemplate","Registracija na WOM",$email,$templateParams,$ime.$prezime);
            
            
            $this->redirect('korisnickaAdministracija/index');
            
            
        }
        
        $this->view->form = $form;
        
    }
    public function izmeniKorisnikaAction() {
        $request = $this->getRequest();        
        $id = (int)$request->getParam('id', null);
        
        $form = new Application_Form_KorisnickaPodrskaIzmena();
        if($request->isPost()) {
            
            $username = $request->getParam('username');
            $ime = $request->getParam('ime');
            $prezime = $request->getParam('prezime');
            $email = $request->getParam('email');
            $tel = $request->getParam('telefon');
            $rola = (int)$request->getParam('rola');
            
            if($form->isValid($request->getPost())) {
                $korisnickaPodrskaModel = new Application_Model_KorisnickaPodrska();
                $korisnickaPodrskaModel->setId($id);
                $korisnickaPodrskaModel->setUsername($username);
                $korisnickaPodrskaModel->setIme($ime);
                $korisnickaPodrskaModel->setPrezime($prezime);
                $korisnickaPodrskaModel->setEmail($email);
                $korisnickaPodrskaModel->setTel($tel);
                $rolaModel = new Application_Model_Rola();
                $rolaModel = $rolaModel->find($rola);
                $korisnickaPodrskaModel->setRola($rolaModel);
                
                $result = $korisnickaPodrskaModel->save();
               
                if(!$result){
                    $this->redirect('korisnickaAdministracija/index?result=failed1');
                }
            } else {
                $this->redirect('korisnickaAdministracija/index?result=failed2');
            }
            
            $this->redirect('korisnickaAdministracija/index');
                        
        } else {
            $kpModel = new Application_Model_KorisnickaPodrska();
            $data = $kpModel->find($id)->toArray();            
            $form->populate($data);
        }
        
        $this->view->form = $form;
        $this->view->id = $id;
        
    }
    
    public function brisanjeKorisnikaAction()
    {
        $request = $this->getRequest();
        $id = (int)$request->getParam('id', null);
        $korisnickaPodrskaModel = new Application_Model_KorisnickaPodrska();
        $korisnickaPodrskaModel->setId($id);
        $korisnickaPodrskaModel->deleteRowByPrimaryKey();
        $this->redirect('korisnickaAdministracija/korisnicka-administracija-prikaz');
    }
    
}
?>
