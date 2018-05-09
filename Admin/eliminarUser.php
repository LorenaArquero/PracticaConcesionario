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
		$sacarUser = mysqli_query($connection, "SELECT username FROM usuario WHERE id ='".$ID."'");
        $sacarTipo = mysqli_query($connection, "SELECT tipo FROM usuario WHERE id ='".$ID."'");
		
		while($linea = mysqli_fetch_array($sacarUser)){

		        $usuario =$linea["username"];
		 }

		while($linea = mysqli_fetch_array($sacarTipo)){

		        $tipo =$linea["tipo"];

		 }


		if(isset($_POST['eliminar']))
		{
				mysqli_query($connection, "DELETE FROM usuario WHERE id='".$ID."'");
				
				if($tipo == "Concesionario"){
						mysqli_query($connection, "DELETE FROM pedidos WHERE concesionario='".$usuario."'");

		        }else{	//caso de que sea proveedor

		        		mysqli_query($connection, "DELETE FROM pedidos WHERE proveedor='".$usuario."'");
						mysqli_query($connection, "DELETE FROM productos WHERE proveedor='".$usuario."'");

		        }

				
				header('refresh: 1; url=admin.php'); //tiempo que tarda en recargar la pagina cuando se elimina un usuario (1 segundo)
				
				echo "<p class='verde'>ELIMINACIÓN REALIZADA CON ÉXITO</p>";
		}

 	?>


</body>
</html>