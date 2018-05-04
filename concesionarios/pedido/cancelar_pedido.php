<?php
    
    
    include("../db_connect/db_connect.php");
    $ID = $_GET["ID"];

    $sql = mysqli_query($connection, "DELETE FROM pedidos WHERE id = '".$ID."'");
  
 
    echo header("Location: ../concesionario.php");
    //echo "DELETE FROM pedidos WHERE id = '".$ID."'";


?>