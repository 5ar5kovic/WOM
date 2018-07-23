<?php
include_once APPLICATION_PATH . "/configs/Constants.php";

class Utils
{
    public static function getRoleId(){
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $role = $auth->getStorage()->read()->id_rola;
        } else {
            $role = 1;
        }
        return (int)$role;
    }
    
    public static function getUserId(){
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $id = $auth->getStorage()->read()->id;
        } else {
            $id = -1;
        }
        return (int)$id;
    }
    
    public static function getUserEmail(){
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $email = $auth->getStorage()->read()->email;
        } else {
            $email = -1;
        }
        return $email;
    }
    
    public static function getPassword(){
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            $password = $auth->getStorage()->read()->password;
        } else {
            $password = -1;
        }
        return $password;
    }
    
    public static function sendEmail($templateName,$subject,$to,$templateParams,$toName='')
    {
        $config = array('ssl' => 'tls',
            'auth' => 'login',
            'username' => Constants::$appMail,
            'password' => Constants::$appMailPassword);
        
        $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
        
        $html = new Zend_View();
        $html->setScriptPath(APPLICATION_PATH . '\views\emails');
        
        foreach ($templateParams as $key => $value) {
            $html->assign($key, $value);      
        }
        
        $bodyText = $html->render($templateName . ".phtml");
        
        $mail = new Zend_Mail();
        $mail->setBodyHtml($bodyText);
        $mail->setFrom(Constants::$appMail, 'WOM');
        $mail->addTo($to, $toName);
        $mail->setSubject($subject);
        $mail->send($transport);
    }
    
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public static function getHashedValue($toHash)
    {
        $passwordSalt1 = "wom213";
        $passwordSalt2 = "spaleperajohan";
        return hash('sha256', $passwordSalt1 . $toHash . $passwordSalt2);
    }
}

