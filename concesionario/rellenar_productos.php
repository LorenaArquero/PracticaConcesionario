<?php

    include("../db_connect/db_connect.php");
    $return_arr = array();

    $proveedor=$_POST['valor'];;

    $sql = mysqli_query($connection, "SELECT nombre FROM productos WHERE proveedor=\"".$proveedor."\"");
    
    while ($row = mysqli_fetch_array($sql)) {
        
        $row_array['nombre'] = $row['nombre'];
        array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
?>