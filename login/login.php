<?php

	include("../db_connect/db_connect.php");

  	$user = $_POST['user'];
   	$password = $_POST['password'];

   	if($user == "admin" && $password == "admin1234") {  				//caso de que sea admin (admin no esta en la base de datos)

		header("Location: ../Admin/admin.php"); 

	}else{

		$consulta = mysqli_query($connection, "SELECT * FROM usuario WHERE username ='".$user."'"); 

	   	if($fila = mysqli_fetch_array($consulta)){

			$numeroSesiones = $fila['numeroSesiones'];

			if($numeroSesiones == '1'){		//comprobamos el numero de sesiones abiertas que tiene un usuario para saber si hay que denegarle acceso o no

				echo "NO PUEDES ABRIR MAS DE UNA SESIÓN O EL ADMIN TE HA BLOQUEADO";
				header('refresh: 1; url=login.html'); //tiempo que tarda en recargar la pagina cuando un usuario esta bloqueado (1 segundo)

			}else{

				if($fila['password'] == $password){

		   			$tipo=$fila['tipo'];
		   			$ID=$fila['id'];

		   			if($tipo == "Concesionario"){

		   				mysqli_query($connection, "UPDATE usuario SET numeroSesiones='1' WHERE id='".$ID."'"); 
		   				echo "hola concesionario";

		   				header("Location: ../concesionarios/concesionario.php");

		   			}elseif ($tipo == "Proveedor") {

		   				mysqli_query($connection, "UPDATE usuario SET numeroSesiones='1' WHERE id='".$ID."'"); 

		   				echo("hola proveedor");
		   				//header("Location: proveedor.php"); //cambiar ruta!!!!!!!!!!!!!!

		   			}

		   		}else{
		   			    echo "¡Usuario o contraseña incorrectos! 1";
		   		}

			}

	   		
	   	}else{
	   		echo "¡Usuario o contraseña incorrectos! 2";
	   	}

	}



?>



