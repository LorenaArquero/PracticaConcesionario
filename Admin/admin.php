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
$consulta = mysqli_query($connection, "SELECT * FROM usuario");	
?>
<h1>ADMINISTRADOR</h1>			
<table class="listaUsers">
	            <tr>
	           	<td class="negrita">ID</td>
					<td class="negrita">Usuario</td>
					<td class="negrita">Contraseña</td>
					<td class="negrita">Tipo</td>
					<td class="negrita">Sesiones abiertas</td>
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
				$numeroSesiones=$filas['numeroSesiones'];		
	?>

				  <tr>
				  	<td><?php echo "<p>".$IDu."</p>";?></td>
					<td><?php echo "<p>".$user."</p>";?></td>
					<td><?php echo "<p>".$pass."</p>";?></td>
					<td><?php echo "<p>".$tipo."</p>";?></td>
					<td><?php echo "<p>".$numeroSesiones."</p>";?></td>
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

	<?php	}	?>
	
			
</table>

			<br />
			<a class="button" href="addUser.php">Añadir usuario</a>
			<br />
			<br />
			<br />
			<a  class="button" href="mensajesAdmin.php">Ver mensajes</a>
			<br />
			<br />
			<br />
			<a  class="button" href="../login/login.html">Cerrar Sesión</a>



</body>

</html>
