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

		        $usuario1 =$linea["username"];

		 }

		while($linea = mysqli_fetch_array($sacarTipo)){

		        $tipo =$linea["tipo"];

		 }


		$consulta = mysqli_query($connection, "SELECT * FROM usuario WHERE id='".$ID."'");

		while($filax = mysqli_fetch_array($consulta))
		{	
			$user=$filax['username'];
			$pass=$filax['password'];
		}
				
		if(isset($_POST['modificar']))
		{
			if(isset($_POST['user2']) && !empty($_POST['user2']) && isset($_POST['pass2']) && !empty($_POST['pass2']))
			{
				$usuario2 = $_POST['user2'];
				$pass2 = $_POST['pass2'];
				
				mysqli_query($connection, "UPDATE usuario SET username = '$usuario2', password = '$pass2' WHERE id = '$ID'"); 

				if($tipo == "Concesionario"){

					mysqli_query($connection, "UPDATE pedidos SET concesionario = '".$usuario2."' WHERE concesionario = '".$usuario1."'"); 
				}else{

					mysqli_query($connection, "UPDATE pedidos SET proveedor = '$usuario2' WHERE proveedor = '$usuario1'"); 
					mysqli_query($connection, "UPDATE productos SET proveedor = '$usuario2' WHERE proveedor = '$usuario1'"); 


				}

				
				echo "<p class='verde'>MODIFICACIÓN REALIZADA CON ÉXITO</p>";
			}
			
		}

	?>

		<form name="formulario" method="post" action="">
		     
		    <p>Usuario</p>
		    <input class="inputsFormulario" placeholder="" type="text" name="user2" value="<?php echo $user;?>" maxlength="30" size="40">
		    <br />
		    
		    <p>Contraseña</p>
		    <input class="inputsFormulario" placeholder="" type="text" name="pass2" value="<?php echo $pass;?>" maxlength="30" size="40">
		    <br />

	
	  <input class="boton" type="submit"  value="Modificar" name="modificar">
		    
		</form>
		<br />
		<a href="admin.php">Regresar</a>

</body>
</html>