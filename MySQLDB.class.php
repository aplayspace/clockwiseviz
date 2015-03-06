<?php 
	define ('DB_ADDRESS', 'localhost');	
	define ('DB_DATABASE', 'clockwise');	
	define ('DB_USERNAME', 'root');	
	define ('DB_PASSWORD', '');	
	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/";
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"]."/";
	 }
	 return $pageURL;
	}
	class MySQLDB
	{
		private static $instance;
		private function __construct() { }
		public static function connect() 
		{
			if (!isset(self::$instance))
			{
				self::$instance = new mysqli(DB_ADDRESS, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			}
			return self::$instance;
		}
	}
	$db_connector = MySQLDB::connect();
?>