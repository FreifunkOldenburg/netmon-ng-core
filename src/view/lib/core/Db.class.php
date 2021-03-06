<?php
	require_once(ROOT_DIR.'/config/db_config.php');
class DB {

	/*** Declare instance ***/
	private static $instance = NULL;

	/**
	*
	* the constructor is set to private so
	* so nobody can create a new instance using new
	*
	*/
	private function __construct() {
	/*** maybe set the db name here later ***/
	}

	/**
	*
	* Return DB instance or create intitial connection
	*
	* @return object (PDO)
	*
	* @access public
	*
	*/
	public static function getInstance() {
		if (!self::$instance) {
			echo "new";
			try {
				self::$instance = new PDO("mysql:host=".$GLOBALS['mysql_host'].";dbname=".$GLOBALS['mysql_db'], $GLOBALS['mysql_user'], $GLOBALS['mysql_password']);
			} catch (Exception $e) {
				die("Bei der Verbindung zur Datenbank ist ein schwerer Fehler aufgetreten.");
			}
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instance-> query('SET NAMES utf8');
		}
		return self::$instance;
	}

	/**
	*
	* Like the constructor, we make __clone private
	* so nobody can clone the instance
	*
	*/
	private function __clone(){

	}

} /*** end of class ***/

?>