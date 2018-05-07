<?php

    include("../db_connect/db_connect.php");

    $emisor=$_POST['emisor'];
    $mensaje=$_POST['mensaje'];
    $fecha_actual = date("Y-m-d");

    mysqli_query($connection, "INSERT INTO mensajes (emisor, texto, leido, fecha) VALUES ('".$emisor."','".$mensaje."','0','".$fecha_actual."')"); //valor 0 porque el mensaje NO esta leido
  

?>