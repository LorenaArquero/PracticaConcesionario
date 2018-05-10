<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>

	<?php

		include("../db_connect/db_connect.php");

		$ID = $_GET["ID"];

		if(isset($_POST['bloquear']))
		{
	   			mysqli_query($connection, "UPDATE usuario SET numeroSesiones='1' WHERE id='".$ID."'"); 
				
				header('refresh: 1; url=admin.php'); //tiempo que tarda en recargar la pagina cuando se bloquea un usuario (1 segundo)
				
				echo "<p class='verde'>USUARIO BLOQUEADO</p>";
		}

 	?>


</body>
</html>