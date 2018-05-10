<!DOCTYPE html>
<html>
    <head>
        <title>Practica PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="scriptAdmin.js"></script>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>

<?php

    include("../db_connect/db_connect.php");

    if(isset($_POST['marcarLeido'])){
        
        if(!empty($_POST['check_list'])) {

            // Numero de checkboxes seleccionados:
            //$checked_count = count($_POST['check_list']);
           
            // Hacemos un Loop por cada checkbox seleccionado para poner el mensaje como leido

            foreach($_POST['check_list'] as $selected) {        //selected valdra lo que valga el value del checkbox (el ID) en obtenerTodosMensajes.php y obtenerMensajesNoLeidos.php
                
                mysqli_query($connection, "UPDATE mensajes SET leido = '1' WHERE id = '$selected'"); 
            }

            header('refresh: 0.5; url=mensajesAdmin.php'); //tiempo que tarda en recargar la pagina cuando se marcan como leido mensajes (0.5 segundos)
        }
        else{
            echo '<script language="javascript">alert("Debes de seleccionar al menos una opción");</script>'; 
        }
    }

?>



    <form method="post" action="" >
        <input type="button" value="Mostrar todos los mensajes" id="buttonTodos"/>
        <input type="button" value="Mostrar mensajes no leídos" id="buttonNoLeidos"/>
        <input type="submit" name ="marcarLeido" id="buttonMarcarLeido" value="Marcar como leídos"/>

        <table class ="listaUsers" id="listaMensajes">
            <!-- Aqui se mostraran los datos -->
        </table>
    </form>
    <br/>
    <a class="button" href="admin.php">Regresar</a>

    </body>
</html>
