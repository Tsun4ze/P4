<?php 

session_start();
ob_start(); //Mise en mémoire tempon

define('DBHOST', 'localhost');
define('DBNAME', 'test');
define('DBUSER', 'root');
define('DBPASS', '');

$db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*function __autoload($class)
{
	$class = strtolower($class);

	$classpath = 'classes/class.'$class.'.php';
	if(file_exists($classpath))
	{
		require_once $classpath;
	}

	$classpath = '../classes/class.'$class.'.php';
	if(file_exists($classpath))
	{
		require_once $classpath;
	}
}

$user = new User($db);*/