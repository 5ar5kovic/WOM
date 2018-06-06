<?php

require_once('MakeDbTableAbstract.php');

abstract class MakeDbTable extends  MakeDbTableAbstract {

	function __construct($config,$dbname,$namespace) {
		parent::__construct($config, $dbname,$namespace);
                
                // set default template path for zfw 2.x
                $this->setTemplatePath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates-v2');
	}
	
	function doItAll() {
		$fooFile=$this->getLocation().DIRECTORY_SEPARATOR.$this->_className.".php";
		$fooData=$this->getParsedTplContents('Foo.phtml');
		$fooTableFile=$this->getLocation().DIRECTORY_SEPARATOR.$this->_className."Table.php";
		$fooTableData=$this->getParsedTplContents('FooTable.phtml');
	
		$templatesDir=realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates-v2').DIRECTORY_SEPARATOR;
		
		if (!file_put_contents($fooFile,$fooData))
			die("Error: could not write model file $fooFile.");
		if (!file_put_contents($fooTableFile,$fooTableData))
			die("Error: could not write model file $fooFile.");
		return true;
	
	}
	
	
}