<?php
class Zend_Controller_Action_Helper_Loadconfig extends Zend_Controller_Action_Helper_Abstract
{
    function direct()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH .'/configs/config.ini',APPLICATION_ENV);       
        $configHelper = new Zend_Config($config->toArray());       
        return $configHelper;
    }
}