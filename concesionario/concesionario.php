 <!DOCTYPE html>
<html>
<head>
    <title>Practica PHP</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptConcesionario.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "../style.css" >		
</head>
<body>

    
    
    <?php
            include("../db_connect/db_connect.php");
            
            $IDuser = $_GET["ID"];
            $sacarConcesionario = mysqli_query($connection, "SELECT username FROM usuario WHERE id ='".$IDuser."'");
    
            while($linea = mysqli_fetch_array($sacarConcesionario)){

                $concesionario =$linea["username"];

            }
    
            if(isset($_GET["filtro"])){
                
                $filtro = $_GET["filtro"];
                if($filtro == "fecha" && isset($_GET["fecha"])){
                    $fecha = $_GET["fecha"];
                    $consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE (confirmado = '0' AND concesionario ='" .$concesionario."' AND fecha='".$fecha."')");
                    
                    
                }else if($filtro == "proveedor" && isset($_GET["proveedor"])){
                    $proveedor = $_GET["proveedor"];   
                    $consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE (confirmado = '0' AND concesionario ='" .$concesionario."' AND proveedor='".$proveedor."')");
                    
                }else if($filtro == "producto" && isset($_GET["producto"])){
                    $producto = $_GET["producto"];        
                    $consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE (confirmado = '0' AND concesionario ='" .$concesionario."' AND producto='".$producto."')");
                    
                }
                
            }else{
                $consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE (confirmado = '0' AND concesionario ='" .$concesionario."')");
                
            }
			
	?>
    
            <input type="hidden" id="idUser" value="<?php echo $IDuser; ?>">
    
            <form action="./cerrarSesion.php?concesionario=<?php echo $concesionario;?>" method="post">
                <button type="submit" id="myButton"  class="button button2" >Salir - Ventana Login</button>
            </form>

			<table class="listaPedidos">
	            <tr>
					<td class="negrita">Fecha</td>
					<td class="negrita">Proveedor</td>
					<td class="negrita">Producto</td>
					<td class="negrita">Cantidad</td>
	                <td class="negrita">Modificar</td>
	                <td class="negrita">Cancelar</td>
				    <td>
                        <select name="filtro" id="filtro">
                            
                            <?php 
                                if(isset($_GET["filtro"])){
                            ?>
                            <option value="0">Sin filtros</option>
                            <?php 
                                }else{
                            ?>
                             <option value="0" selected>Filtrar por</option>
                            
                            <?php 
                                }                                
                            ?>
                            
                            <option value="1" <?php if(isset($_GET["filtro"])){if($filtro == "fecha"){echo "selected";}}?>>Fecha</option>
                            <option value="2" <?php if(isset($_GET["filtro"])){if($filtro == "proveedor"){echo "selected";}}?>>Proveedor</option>
                            <option value="3" <?php if(isset($_GET["filtro"])){if($filtro == "producto"){echo "selected";}}?>>Producto</option>
                        </select>
                    </td>
                    <td id="variable">

                    </td>
                </tr>
	<?php
			while($filas = mysqli_fetch_array($consulta))
			{	
				$fecha=$filas['fecha'];
				$proveedor=$filas['proveedor'];
				$producto=$filas['producto'];
				$cantidad=$filas['cantidad'];
				$IDpedido=$filas['id'];
				
	?>
				  <tr>
					<td><?php echo "<p>".$fecha."</p>";?></td>
					<td><?php echo "<p>".$proveedor."</p>";?></td>
					<td><?php echo "<p>".$producto."</p>";?></td>
					<td><?php echo "<p>".$cantidad."</p>";?></td>
	                <td> 
	                    <form method="post" action="./modificar_pedido.php?ID=<?php echo $IDpedido."&IDuser=".$IDuser;?>">
	                    	<input type="submit" value="Modificar" name="modificar" />
	                    </form>
	                </td>
	                <td>
	                	<form method="post" action="./cancelar_pedido.php?ID=<?php echo $IDpedido."&IDuser=".$IDuser;?>">
	                    	<input type="submit" value="Eliminar" name="eliminar" />
	                    </form>
	                </td>
				  </tr>
	<?php				
			}
	?>
	
			</table>
			<br />
	<?php
            echo "<input type='button' value='hacer pedido' onclick='hacerPedido(".$IDuser.")'/>";
            
	?>
    
    
</body>
</html> 