<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>

<body>

	<?php

		include("../db_connect/db_connect.php");

		$ID = $_GET["ID"];

		if(isset($_POST['eliminar']))
		{
				mysqli_query($connection, "DELETE FROM usuario WHERE id='".$ID."'");
				//mysqli_query($connection, "DELETE FROM pedidos WHERE id='".$ID."'");
				//mysqli_query($connection, "DELETE FROM productos WHERE id='".$ID."'");

				
				header('refresh: 1; url=admin.php'); //tiempo que tarda en recargar la pagina cuando se elimina un usuario (1 segundo)
				
				echo "<p class='verde'>ELIMINACIÓN REALIZADA CON ÉXITO</p>";
		}

 	?>


</body>
</html>