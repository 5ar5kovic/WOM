<?php

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
                
                $authAdapter->setIdentity($username)->setCredential($password);                
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
        $this->redirect('authentication/login');
    }
    
    public function zaboravljenaLozinkaAction()
    {
        // action body
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







