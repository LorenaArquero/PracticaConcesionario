<?php
	define('DB_SERVER', "localhost");				// DB_SERVER
	define('DB_USER', "root");						// DB_USER
	define('DB_PASSWORD', "password");					// DB_PASSWORD
	define('DB_DATABASE', "practica_php");	// DB_DATABASE
		

	//Realizamos la conexion
	$connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	if($connection->connect_errno){
		die("Error de conexión");
	}else{
		$connection->set_charset("utf-8");
	}
	return $connection;
?>