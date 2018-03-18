<?php


class ConnectionModel
{

  function __contruct(){

  }

  function getDbConnection($server = 'localhost', $database = 'examen', $user = 'root', $pass = '')
  {
  	static $conn = null;
  	if($conn === null)
  	{
  		$conn = new PDO("mysql:host=$server;dbname=". $database, $user, $pass);
  		// set the PDO error mode to exception
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      return $conn;
  }

}


?>
