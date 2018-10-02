<?php



class Manager 
{
	public $_db;

	public function __construct()
	{
		$this->_db = Database::dbconnect();
	}

	public function redirect($uri = '/')
	{
		header("Location: $uri");
		exit();
	}
}