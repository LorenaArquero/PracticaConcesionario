<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>

<body>

	<?php

		//include("conexion.php");
		include("../db_connect/db_connect.php");

		if(isset($_POST['registrar']))
		{
			if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']))
			{
				$usuario = $_POST['user'];
				$pass = $_POST['pass'];
				$tipo = $_POST['tipo'];

				mysqli_query($connection, "insert into usuario(username, password, tipo) VALUES('$usuario', '$pass', '$tipo')");
				
				echo "<p class='verde'>INSERCIÓN REALIZADA CON ÉXITO</p>";
			}
			
		}

	?>

		<form name="formulario" method="post" action="">
		     
		    <input class="inputsFormulario" placeholder="Usuario" type="text" name="user" maxlength="30" size="40">
		    <br />
		    
		    <input class="inputsFormulario" placeholder="Contraseña" type="password" name="pass" maxlength="30" size="40">
			<br />


		    <select class="inputsFormulario" name="tipo">
			  <option value="Concesionario">Concesionario</option>
			  <option value="Proveedor">Proveedor</option>
			</select>
		    <br />

		    <input class="boton" type="submit" value="Registrar" name="registrar">
		    
		</form>
		<br />
		<a href="admin.php">Regresar</a>

</body>

</html>