<?php

echo "<link rel='stylesheet' type='text/css' href='styleProveedores1.css' />";

$archivo = $_FILES['fichero_usuario']['name'];

$fichero_subido = ($archivo);

echo '<pre>';
    if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {

        /*Saber si el archivo es de tipo XML.*/
        if(strpos($archivo, '.xml')!==false){
            
            echo "El fichero es válido y se subió con éxito.\n";
            echo "Nombre del fichero: " . $_FILES['fichero_usuario']['name'] . "\n";
            
            /*Apertura del ficher XML*/
            if (file_exists($archivo)){
                
                    if(!$xml = simplexml_load_file($archivo)){
                        echo "No se ha podido cargar el archivo";
                    } else {
                        echo "<table id='productos_table' border='2' width='500'>\n";
                        
                        echo "
                                <tr>
                                    <th>Id</th>
                                    <th>Proveedor</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Descatalogado</th>
                                </tr>";
                        foreach($xml as $one){
                                echo "<tr>";
                                echo "<td>$one->id</td>";
                                echo "<td>$one->proveedor</td>";
                                echo "<td>$one->nombre</td>";
                                echo "<td>$one->cantidad</td>";
                                echo "<td>$one->descatalogado</td>";
                                echo "</tr>";
                        }
                        echo "</table>\n";
                    }
            } else {
                $error_message = "Error abriendo " . $archivo; 
                exit($error_message);
            }
        }else{
            echo "ERROR: El fichero que intenta abrir no es de tipo XML. Vuelva a intentarlo de nuevo.";
        }
    } else {
        echo "¡No ha seleccionado ningún fichero!\n";
    }


?>
