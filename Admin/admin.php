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
			
			$consulta = mysqli_query($conn, "SELECT * FROM usuario");
			
	?>

			<table class="listaUsers">
	            <tr>
					<td class="negrita">Usuario</td>
					<td class="negrita">Contraseña</td>
					<td class="negrita">Tipo</td>
	                <td class="negrita">Modificar</td>
	                <td class="negrita">Eliminar</td>
	                <td class="negrita">Bloquear</td>
	                <td class="negrita">Desbloquear</td>
				  </tr>
	<?php
			
			while($filas = mysqli_fetch_array($consulta))
			{	
				$IDu=$filas['id'];
				$user=$filas['username'];
				$pass=$filas['password'];
				$tipo=$filas['tipo'];
				
	?>
				  <tr>
					<td><?php echo "<p>".$user."</p>";?></td>
					<td><?php echo "<p>".$pass."</p>";?></td>
					<td><?php echo "<p>".$tipo."</p>";?></td>
	                <td> 
	                    <form method="post" action="modificarUser.php?ID=<?php echo $IDu;?>">
	                    	<input type="submit" value="Modificar" name="modificar" />
	                    </form>
	                </td>
	                <td>
	                	<form method="post" action="eliminarUser.php?ID=<?php echo $IDu;?>">
	                    	<input type="submit" value="Eliminar" name="eliminar" />
	                    </form>
	                </td>
	                <td> 
	                    <form method="post" action="bloquearUser.php?ID=<?php echo $IDu;?>">
	                    	<input type="submit" value="Bloquear" name="bloquear" />
	                    </form>
	                </td>
	                <td>
	                	<form method="post" action="desbloquearUser.php?ID=<?php echo $IDu;?>">
	                    	<input type="submit" value="Desbloquear" name="desbloquear" />
	                    </form>
	                </td>
				  </tr>
	<?php
				
				
			}


	?>
	
			</table>
			<br />
			<a href="addUser.php">Añadir usuario</a>
			<br />
			<a href="mensajesAdmin.php">Ver mensajes</a>

</body>
</html>