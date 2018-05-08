<?php
    
    
    include("../db_connect/db_connect.php");
    $ID = $_GET["ID"];
    $IDuser = $_GET["IDuser"];

    $sql = mysqli_query($connection, "DELETE FROM pedidos WHERE id = '".$ID."'");
  
 
    echo header("Location: ./concesionario.php?ID=".$IDuser);
    //echo "DELETE FROM pedidos WHERE id = '".$ID."'";


?>