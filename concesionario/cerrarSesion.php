
<?php
    include("../db_connect/db_connect.php");

    $username = $_GET["concesionario"];
    
    $consulta = "UPDATE usuario SET numeroSesiones = 0 WHERE username = '$username'";    
    $resultado = mysqli_query($connection, $consulta);
    
    header("Location: ../login/login.html");
?>

