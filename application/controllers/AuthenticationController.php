<?php

include_once APPLICATION_PATH . '/configs/Constants.php';
include_once APPLICATION_PATH . '/Utils.php';

class AuthenticationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        //nije potrebno jer je sve reseno u preDispatch()
        /* 
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->redirect('administracija/index');
        }
        */
        
        Zend_Layout::getMvcInstance()->setLayout('login');
               
        $request = $this->getRequest();
        $form = new Application_Form_LoginForm();
        
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                
                $authAdapter = $this->getAuthAdapter();
                
                $username = $form->getValue('username');
                $password = $form->getValue('password');
                
                $authAdapter->setIdentity($username)->setCredential(Utils::getHashedValue($password));                
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);  
                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    if($auth->getStorage()->read()->id_rola == 8) {
                        $this->redirect('index/index');
                    } else {
                        $this->redirect('administracija/index');
                    }
                } else {
                    $this->view->errorMessage = "Pogresno korisnicko ime ili lozinka";
                }
            }
        }
        
        $this->view->form = $form;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect(Constants::$loginPutanja);
    }
    
    
    public function zaboravljenaLozinkaAction()
    {
        
        Zend_Layout::getMvcInstance()->setLayout('login');
        $request = $this->getRequest();
        $form = new Application_Form_ZaboravljenaLozinka();
                
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
               $email = $form->getValue('email');
        
                $token = Utils::generateRandomString(Constants::$duzinaRandomStringaZaPromenuPassworda);
                $link = "wom" . Constants::$novaLozinkaPutanja . "?token=" . $token;
                
                $myMapper = new Application_Model_Mymapper_KorisnickaPodrska();
                $korisnik = $myMapper->pronadjiPoMejlu($email,$token);        
                
                $data = array(
                    'random_string' => $token
                ); 
                $korisnik->setFromArray($data);
                $korisnik->save();
                
                $templateParams = array("link"=>$link);
                Utils::sendEmail("zaboravljenaLozinkaTemplate","Zaboravljena lozinka WOM",$email,$templateParams);
                $this->redirect(Constants::$loginPutanja);
            } else {
               $this->redirect(Constants::$zaboravljenaLozinkaPutanja);
            }
        }        
        $this->view->form = $form;        
    }
    
    public function promenaLozinkeAction()
    {
                
        // napravi formu za unos passworda
        Zend_Layout::getMvcInstance()->setLayout('login');
        $request = $this->getRequest();
        $form = new Application_Form_PromenaLozinke();
        
        $token = $this->getRequest()->getParam('token');
        $myMapper = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnik = $myMapper->pronadjiPoTokenu($token);
        
        if(count($korisnik->toArray()) == 0){
            $this->redirect(Constants::$loginPutanja);
        }
        
        if ($request->isPost()) {            
            
            if ($form->isValid($this->_request->getPost())) {
                $npw1 = $form->getValue('pass1');
                $npw2 = $form->getValue('pass2');
                
                if($npw1 != $npw2){                    
                    header(Constants::$novaLozinkaPutanja . "?token=" . $token);     
                } else {
                    $noviPassword =  $npw1;
                    $hashiranPassword = Utils::getHashedValue($noviPassword);
                    
                    $data = array(
                        'random_string' => "",
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
    
    private function getAuthAdapter()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('korisnicka_podrska')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password');
        // ->setCredentialTreatment();
        return $authAdapter;
    }
    
}







