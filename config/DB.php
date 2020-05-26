<?php

require_once 'IConnection.php';

class DB implements IConnection{
	private static $server = IConnection::HOST;
	private static $currentDB = IConnection::DBNAME;
	private static $user = IConnection::UNAME;
	private static $pass = IConnection::PW;
	private static $hookup;

	public static function doConnect(){
		self::$hookup=mysqli_connect(self::$server, self::$user, self::$pass, self::$currentDB);
		if(self::$hookup){
			//echo 'Connection ok';
		}elseif(mysqli_connect_error(self::$hookup)){
			//cho 'Connection failed!';	
		}
		return self::$hookup;
	}
}