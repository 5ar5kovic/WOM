<?php
include_once APPLICATION_PATH . '/configs/Constants.php';
include_once APPLICATION_PATH . '/Utils.php';

class ProfilController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function promenaLozinkeAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_PromenaLozinke();
        $myMapper = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnik = $myMapper->pronadjiPoId(Utils::getUserId());
        
        if ($request->isPost()) {
            
            if ($form->isValid($this->_request->getPost())) {
                $stari = $form->getValue('stari');
                $npw1 = $form->getValue('pass1');
                $npw2 = $form->getValue('pass2');
                
                if (Utils::getPassword() != Utils::getHashedValue($stari)  || $npw1 != $npw2) {
                    header(Constants::$promenaLozinke);
                } else {
                    $noviPassword =  $npw1;
                    $hashiranPassword = Utils::getHashedValue($noviPassword);
                    
                    $data = array(
                        'password' => $hashiranPassword
                    );
                    
                    $korisnik->setFromArray($data);
                    $korisnik->save();
                    
                    $this->redirect(Constants::$loginPutanja);
                
                }
            }
        }
        $this->view->form = $form;
        
    }
    

}

