<?php
class Conf {

	var $smtphost;
	var $dbhost;
	var $dbport;
	var $dbname;
	var $dbuser;
	var $version;

	function __construct() {

		$this->dbhost	= 'localhost';
		$this->dbport 	= '3306';
		if(defined('ENVIRNOMENT') && ENVIRNOMENT == 'test'){
		$this->dbname    = 'test_orangehrm_mysql';		
		}else {
		$this->dbname    = 'orangehrm_mysql';
		}
		$this->dbuser    = 'root';
		$this->dbpass	= 'bCs032401113313@@';
		$this->version = '4.3.4';

		$this->emailConfiguration = dirname(__FILE__).'/mailConf.php';
		$this->errorLog =  realpath(dirname(__FILE__).'/../logs/').'/';
	}
}
?>