<?php
define("HOST", "localhost");
define("USER", "admin");
define("PASSWORD", "admin1234");
define("BD", "practica_php");

	//Realizamos la conexion
	$conn = new mysqli(HOST, USER, PASSWORD, BD);
	if($conn->connect_errno){
		die("Error de conexión de la base de datos");
	}else{
		$conn->set_charset("utf-8");
	}
	return $conn;
?>