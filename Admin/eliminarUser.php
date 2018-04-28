<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>

	<?php

		include("conexion.php");

		$ID = $_GET["ID"];

		if(isset($_POST['eliminar']))
		{
				//echo("el id de la BD es $IDu");
				mysqli_query($conn, "DELETE FROM usuario WHERE id='".$ID."'");
				
				header('refresh: 1; url=admin.php'); //tiempo que tarda en recargar la pagina cuando se elimina un usuario (1 segundo)
				
				echo "<p class='verde'>ELIMINACIÓN REALIZADA CON ÉXITO</p>";
		}

 	?>


</body>
</html>