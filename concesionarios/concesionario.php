 <!DOCTYPE html>
<html>
<head>
    <title>Practica PHP</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="scriptConcesionario.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "style.css" >		
</head>
<body>

    
    
    <?php
			include("./db_connect/db_connect.php");
			
			$consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE confirmado = '0'");
			
	?>

			<table class="listaUsers">
	            <tr>
					<td class="negrita">Fecha</td>
					<td class="negrita">Proveedor</td>
					<td class="negrita">Producto</td>
					<td class="negrita">Cantidad</td>
	                <td class="negrita">Modificar</td>
	                <td class="negrita">Cancelar</td>
				  </tr>
	<?php
			
			while($filas = mysqli_fetch_array($consulta))
			{	
				$fecha=$filas['fecha'];
				$proveedor=$filas['proveedor'];
				$producto=$filas['producto'];
				$cantidad=$filas['cantidad'];
				$ID=$filas['id'];
                
				
	?>
				  <tr>
					<td><?php echo "<p>".$fecha."</p>";?></td>
					<td><?php echo "<p>".$proveedor."</p>";?></td>
					<td><?php echo "<p>".$producto."</p>";?></td>
					<td><?php echo "<p>".$cantidad."</p>";?></td>
	                <td> 
	                    <form method="post" action="./pedido/modificar_pedido.php?ID=<?php echo $ID;?>">
	                    	<input type="submit" value="Modificar" name="modificar" />
	                    </form>
	                </td>
	                <td>
	                	<form method="post" action="./pedido/cancelar_pedido.php?ID=<?php echo $ID;?>">
	                    	<input type="submit" value="Eliminar" name="eliminar" />
	                    </form>
	                </td>
				  </tr>
	<?php
				
				
			}
	?>
	
			</table>
			<br />

    
    
    
    
    <input type="button" value="hacer pedido" onclick="hacerPedido()" />
    
</body>
</html> 