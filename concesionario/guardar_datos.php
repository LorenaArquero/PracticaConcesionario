<?php

    include("../db_connect/db_connect.php");

    $proveedor=$_POST['proveedor'];
    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];
    $fecha_actual = date("Y-m-d");
    $sacarProductoID=mysqli_query($connection, "SELECT id FROM productos WHERE (proveedor=\"".$proveedor."\" AND nombre=\"".$producto."\")");

    while($linea = mysqli_fetch_array($sacarProductoID)){

        $productoID =$linea["id"];

    }

    $idConcesionario = $_POST["concesionarioID"];
    $sacarConcesionario = mysqli_query($connection, "SELECT username FROM usuario WHERE id ='".$idConcesionario."'");

    while($linea = mysqli_fetch_array($sacarConcesionario)){

        $concesionario =$linea["username"];
    }

    $sql = mysqli_query($connection, "INSERT INTO pedidos (concesionario, fecha, proveedor, producto, productoID, cantidad, confirmado) VALUES ('".$concesionario."','".$fecha_actual."','".$proveedor."','".$producto."','".$productoID."','".$cantidad."', '0')");
  
 
    echo "INSERT INTO 'pedidos' ('concesionario', 'fecha', 'proveedor','producto', 'productoID', 'cantidad') VALUES ('".$concesionario."','".$fecha_actual."','".$proveedor."','".$producto."','".$productoID."','".$cantidad."', '0')";

?>
