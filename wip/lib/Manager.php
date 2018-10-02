<?php



class Manager 
{
	public $_db;

	public function __construct()
	{
		$this->_db = Database::dbconnect();
	}

	
}