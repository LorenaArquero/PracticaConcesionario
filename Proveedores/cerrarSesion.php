<?php
    //echo "Pagina de salir\n";

    include("Conecxion.php");
    $Con = new  conecxion();

    $nameProveedor = $_GET["nameProveedor"];
    
        
    //echo "Adios " .$nameProveedor;
    $Con->cerrarSesion($nameProveedor);


    header("Location: ../login/login.php");
?>