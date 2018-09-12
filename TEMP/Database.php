<?php

class Database 
{

	private static $_dbhost = 'localhost';
	private static $_dbname = 'test';
	private static $_dbuser = 'root';
	private static $_dbpass = '';
	
	public static function dbconnect()
	{
		try
		{
		    $db = new PDO('mysql:host='.$this->_dbhost.';dbname='.$this->_dbname.';charset=utf8', $this->_dbuser, $this->_dbpass);
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		return $db;
	}
}