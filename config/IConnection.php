<?php

interface IConnection{
	const HOST = 'localhost';
	const UNAME = 'root';
	const PW = '';
	const DBNAME = 'superoffice';
	
	public static function doConnect();
}