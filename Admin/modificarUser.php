<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>

<body>

	<?php
		include("conexion.php");

		$ID = $_GET["ID"];

		$consulta = mysqli_query($conn, "SELECT * FROM usuario WHERE id='".$ID."'");

				while($filax = mysqli_fetch_array($consulta))
				{	
					$user=$filax['username'];
					$pass=$filax['password'];
					$tipo=$filax['tipo'];
				}
				
		if(isset($_POST['modificar']))
		{
			if(isset($_POST['user2']) && !empty($_POST['user2']) && isset($_POST['pass2']) && !empty($_POST['pass2']))
			{
				$usuario2 = $_POST['user2'];
				$pass2 = $_POST['pass2'];
				$tipo2 = $_POST['tipo2'];
				
				mysqli_query($conn, "UPDATE usuario SET username = '$usuario2', password = '$pass2', tipo = '$tipo2' WHERE id = '$ID'"); 
				
				echo "<p class='verde'>MODIFICACIÓN REALIZADA CON ÉXITO</p>";
			}
			
		}

	?>

		<form name="formulario" method="post" action="">
		     
		    <input class="inputsFormulario" placeholder="" type="text" name="user2" value="<?php echo $user;?>" maxlength="30" size="40">
		    <br />
		    
		    <input class="inputsFormulario" placeholder="" type="text" name="pass2" value="<?php echo $pass;?>" maxlength="30" size="40">
		    <br />

	<?php 		if($tipo == "Concesionario"){ //si el tipo = concesionario en el select box aparece selccionado concesionario ?>
		    	
		    	<select class="inputsFormulario" name="tipo2">
				  <option value="Concesionario">Concesionario</option>
				  <option value="Proveedor">Proveedor</option>
				</select>
			    <br />

	<?php 		
				} else { //si el tipo = proveedor en el select box aparece selccionado proveedor 

	?>

		    	<select class="inputsFormulario" name="tipo2">
		    	  <option value="Proveedor">Proveedor</option>
				  <option value="Concesionario">Concesionario</option>
				</select>
			    <br />

	<?php 		
				} 

	?>
			    
		    
		    <input class="boton" type="submit"  value="Modificar" name="modificar">
		    
		</form>
		<br />
		<a href="admin.php">Regresar</a>

</body>
</html>