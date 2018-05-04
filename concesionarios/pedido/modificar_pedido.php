<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../scriptConcesionario.js"></script>
	<title>Practica PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php
		include("../db_connect/db_connect.php");
		$ID = $_GET["ID"];
		$consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE id='".$ID."'");
				while($filas = mysqli_fetch_array($consulta))
				{	
					$proveedor=$filas['proveedor'];
					$producto=$filas['producto'];
					$cantidad=$filas['cantidad'];
				}
				
		if(isset($_POST['modificar']))
		{
			if(isset($_POST['proveedorNuevo']) && !empty($_POST['proveedorNuevo']) && isset($_POST['productoNuevo']) && !empty($_POST['productoNuevo']) && isset($_POST['cantidadNueva']) && !empty($_POST['cantidadNueva']))
			{
				$proveedor = $_POST['proveedorNuevo'];
				$producto = $_POST['productoNuevo'];
				$cantidad = $_POST['cantidadNueva'];
				
                
                $fechaNueva = date("Y-m-d");
                
				mysqli_query($connection, "UPDATE pedidos SET proveedor = '$proveedor', producto = '$producto', cantidad = '$cantidad', fecha = '$fechaNueva' WHERE id = '$ID'"); 
				
				echo "<p class='verde'>MODIFICACIÓN REALIZADA CON ÉXITO</p>";
			}
			
		}
	?>
    
    <form action="" method="POST" id="form" name="formulario">

        <select name="proveedorNuevo" id="proveedores">
            <option value="0">Seleccione un proveedor</option>
            
            <?php 
                $sql = mysqli_query($connection, "SELECT username FROM usuario WHERE tipo=\"proveedor\"");
                while($linea = mysqli_fetch_array($sql)){

                    //echo "<script>console.log(".$linea.");</script>";
                    if($linea[0] == $proveedor){

                        echo "<option value=".$linea[0]." selected='selected'>".$linea[0]."</option>";
                        //echo "<p>hola</p>";
                    }else{
                        echo "<option value=".$linea[0].">".$linea[0]."</option>";
                    }

                }
            ?>
        </select>
        
            
        <select id="productos" name="productoNuevo">
            <option value="0">Seleccione un producto</option>
            <?php 
                $sql = mysqli_query($connection, "SELECT nombre FROM productos WHERE proveedor=\"".$proveedor."\"");
                while($linea = mysqli_fetch_array($sql)){

                    //echo "<script>console.log(".$linea.");</script>";
                    if($linea[0] == $producto){

                        echo "<option value=".$linea[0]." selected='selected'>".$linea[0]."</option>";
                        //echo "<p>hola</p>";
                    }else{   
                        echo "<option value=".$linea[0].">".$linea[0]."</option>";
                    }
                }
            ?>
        </select>
        
        
        <input type="number" name="cantidadNueva" value=<?php echo "\"".$cantidad."\"" ?> min="0">
        
        <input class="boton" type="submit"  value="Modificar" name="modificar">
    </form>
            
            
            
    
		    
		<br />
		<a href="../concesionario.php">Regresar</a>

</body>
</html>