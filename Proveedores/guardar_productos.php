<?php

include("../db_connect/db_connect.php");
echo "<link rel='stylesheet' type='text/css' href='styleProveedores1.css' />";

$archivo = $_FILES['fichero_usuario']['name'];
$proveedor = $_GET['proveedor'];

$fichero_subido = ($archivo);

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
                        
                        foreach($xml as $one){
                            
                            $cambiado = "no";
                            
                            $selectProducto=mysqli_query($connection, "SELECT id FROM productos WHERE (proveedor=\"".$proveedor."\" AND nombre=\"".$one->producto."\")");

                            while($linea = mysqli_fetch_array($selectProducto)){
                                $productoID =$linea["id"];

                                mysqli_query($connection, "UPDATE productos SET cantidad='$one->cantidad', descatalogado='$one->descatalogado' WHERE id='$productoID'");
                                //echo "UPDATE productos SET cantidad='$one->cantidad', descatalogado='$one->descatalogado' WHERE id='$productoID'";
                                
                                $cambiado = "si";
                            }
                            
                            if($cambiado == "no"){
                                $sql = mysqli_query($connection, "INSERT INTO productos (proveedor, nombre, cantidad, descatalogado) VALUES ('".$proveedor."','".$one->producto."','".$one->cantidad."','".$one->descatalogado."')");
                                //echo "INSERT INTO productos (proveedor, nombre, cantidad, descatalogado) VALUES ('".$proveedor."','".$one->producto."','".$one->cantidad."','".$one->descatalogado."')";
                                //echo "</br>";
                            }
  
                            /*
                            echo "<tr>";
                                echo "<td>$one->id</td>";
                                echo "<td>$one->proveedor</td>";
                                echo "<td>$one->producto</td>";
                                echo "<td>$one->cantidad</td>";
                                echo "<td>$one->descatalogado</td>";
                                echo "</tr>";
                            */
                        }
                        echo "todo subido";
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
