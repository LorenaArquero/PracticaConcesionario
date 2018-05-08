<?php

    include("./db_connect/db_connect.php");
    $return_arr = array();
    $consulta = mysqli_query($connection, "SELECT * FROM pedidos WHERE confirmado = '0'");
    while ($row = mysqli_fetch_array($consulta)) {
        
        $row_array['fecha'] = $row['fecha'];
        $row_array['proveedor'] = $row['proveedor'];
        $row_array['producto'] = $row['producto'];
        $row_array['cantidad'] = $row['cantidad'];
        array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
?>