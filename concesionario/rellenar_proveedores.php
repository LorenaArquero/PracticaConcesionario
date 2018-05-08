<?php
    
    include("../db_connect/db_connect.php");
    $return_arr = array();
    $sql = mysqli_query($connection, "SELECT username FROM usuario WHERE tipo=\"proveedor\"");
                
    while ($row = mysqli_fetch_array($sql)) {
        
        $row_array['username'] = $row['username'];
        array_push($return_arr,$row_array);
    }
    echo json_encode($return_arr);
?>