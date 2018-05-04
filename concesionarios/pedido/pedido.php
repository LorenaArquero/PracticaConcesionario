 <!DOCTYPE html>
<html>
<head>
    <title>Practica PHP</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="scriptPedidos.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "../style.css" >		
</head>
<body>

    <?php
            include("../db_connect/db_connect.php");
    ?>
    <div id="contenedor">
    <form action="./rellenar_productos.php" method="POST" id="form" name="formulario">

        <select name="proveedores" id="proveedores">
            <option value="0" disable selected>Seleccione un proveedor</option>
            
        <?php 
            $sql = mysqli_query($connection, "SELECT username FROM usuario WHERE tipo=\"proveedor\"");
            while($linea = mysqli_fetch_array($sql)){

                echo "<option value=".$linea[0].">".$linea[0]."</option>";

            }
        ?>
        </select>
        
            
        <select id="productos" name="productos">
            <option value="0" disable selected>Seleccione un producto</option>
        </select>
        
        
        <input type="number" name="cantidad" value="0" min="0" max="100">
        
    </form>
    </div>
    
    <input type="button" value="Añadir" onclick="agregarNuevo()"/>
    <input type="button" value="Hacer pedido" onclick="guardarDatos()"/>
   

    

</body>
</html> 