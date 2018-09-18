<?php



class Database{
  private static $dbHost = "localhost";
  private static $dbName = "test";
  private static $dbUser = "root";
  private static $dbUserPassword = "";

  private static $connection = null;

  public static function dbconnect(){
    try {
      self::$connection = new PDO("mysql:host=". self::$dbHost .";dbname=". self::$dbName .";charset=utf8", self::$dbUser , self::$dbUserPassword);
      self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $e) 
    {
      die($e->getMessage());
    }
    return self::$connection;
  }
}