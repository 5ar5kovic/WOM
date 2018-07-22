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
        return $role;
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
}

