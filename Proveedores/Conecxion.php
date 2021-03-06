<?php
echo "<link rel='stylesheet' type='text/css' href='styleProveedores1.css' />";
    $connection= mysqli_connect("localhost", "root", "", "practica_php");
    class conecxion{
        
        
        function mostrarDatosEnTabla($resultado){ 
        }
        function recuperarDatosProductos($name_proveedor){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");
           
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }  
            $consulta = "SELECT * FROM pedidos where proveedor LIKE '$name_proveedor' ";    
            //$consulta = "SELECT * FROM productos";    
            if ($resultado = mysqli_query($connection, $consulta)){
               // mostrarDatosEnTabla($resultado);
                
                echo "<table id='pedidos_table' border='2' width='500'>\n";
                        
                echo "<tr><th>Id</th><th>Concesionario</th><th>Fecha</th><th>Proveedor</th><th>Producto</th><th>ProductoID</th><th>Confirmado</th></tr>";
                
                // obtener el array asociativo 
                while ($obj = mysqli_fetch_object($resultado) ){
                    //printf ("%s %s %s %s %s<br>" , $obj->id, $obj->proveedor, $obj->nombre, $obj->cantidad, $obj->descatalogado);
                    // /*Imprimir tabla pedidos.*/printf ("%s %s %s %s %s %s %s<br>" , $obj->id, $obj->concesionario, $obj->fecha, $obj->proveedor, $obj->producto, $obj->productoID,$obj->confirmado);
                    echo "<tr>";
                        echo "<td>$obj->id</td>";
                        echo "<td>$obj->concesionario</td>";
                        echo "<td>$obj->fecha</td>";
                        echo "<td>$obj->proveedor</td>";
                        echo "<td>$obj->producto</td>";
                        echo "<td>$obj->productoID</td>";
                        echo "<td>$obj->confirmado</td>";
                    echo "</tr>";
                }
                echo "</table>\n";
                /* liberar el conjunto de resultados */
                mysqli_free_result($resultado);
            }
            /* cerrar la conexión */
            mysqli_close($connection);
        }
        function recuperarDatosProductosConfirmados($name_proveedor){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");
           
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }  
           
            $consulta = "SELECT * FROM pedidos where proveedor LIKE '$name_proveedor' AND confirmado = 1";    
            //$consulta = "SELECT * FROM productos";    
            if ($resultado = mysqli_query($connection, $consulta)){
               // mostrarDatosEnTabla($resultado);
                
                echo "<table id='pedidos_table' border='2' width='500'>\n";
                        
                echo "<tr><th>Id</th><th>Concesionario</th><th>Fecha</th><th>Proveedor</th><th>Producto</th><th>ProductoID</th><th>Confirmado</th></tr>";
                
                // obtener el array asociativo 
                while ($obj = mysqli_fetch_object($resultado) ){
                    //printf ("%s %s %s %s %s<br>" , $obj->id, $obj->proveedor, $obj->nombre, $obj->cantidad, $obj->descatalogado);
                    // /*Imprimir tabla pedidos.*/printf ("%s %s %s %s %s %s %s<br>" , $obj->id, $obj->concesionario, $obj->fecha, $obj->proveedor, $obj->producto, $obj->productoID,$obj->confirmado);
                    echo "<tr>";
                        echo "<td>$obj->id</td>";
                        echo "<td>$obj->concesionario</td>";
                        echo "<td>$obj->fecha</td>";
                        echo "<td>$obj->proveedor</td>";
                        echo "<td>$obj->producto</td>";
                        echo "<td>$obj->productoID</td>";
                        echo "<td>$obj->confirmado</td>";
                    echo "</tr>";
                }
                echo "</table>\n";
                /* liberar el conjunto de resultados */
                mysqli_free_result($resultado);
            }
            /* cerrar la conexión */
            mysqli_close($connection);
        }
        function recuperarDatosProductosNoConfirmados($name_proveedor){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");
           
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }  
            $consulta = $consulta = "SELECT * FROM pedidos where proveedor LIKE '$name_proveedor' AND confirmado = 0"; 
            //$consulta = "SELECT * FROM productos";    
            if ($resultado = mysqli_query($connection, $consulta)){
               // mostrarDatosEnTabla($resultado);
                
                echo "<table id='pedidos_table' border='2' width='500'>\n";
                        
                echo "<tr><th>Id</th><th>Concesionario</th><th>Fecha</th><th>Proveedor</th><th>Producto</th><th>ProductoID</th><th>Confirmado</th></tr>";
                
                // obtener el array asociativo 
                while ($obj = mysqli_fetch_object($resultado) ){
                    //printf ("%s %s %s %s %s<br>" , $obj->id, $obj->proveedor, $obj->nombre, $obj->cantidad, $obj->descatalogado);
                    // /*Imprimir tabla pedidos.*/printf ("%s %s %s %s %s %s %s<br>" , $obj->id, $obj->concesionario, $obj->fecha, $obj->proveedor, $obj->producto, $obj->productoID,$obj->confirmado);
                    echo "<tr>";
                        echo "<td>$obj->id</td>";
                        echo "<td>$obj->concesionario</td>";
                        echo "<td>$obj->fecha</td>";
                        echo "<td>$obj->proveedor</td>";
                        echo "<td>$obj->producto</td>";
                        echo "<td>$obj->productoID</td>";
                        echo "<td>$obj->confirmado</td>";
                    echo "</tr>";
                }
                echo "</table>\n";
                /* liberar el conjunto de resultados */
                mysqli_free_result($resultado);
            }
            /* cerrar la conexión */
            mysqli_close($connection);
        }
        function deleteAllElementsFromTablePedidos(){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            $sql = "DELETE FROM pedidos";

                if(mysqli_query($connection, $sql)){
                    echo "Eliminacion correcta.";
                } else{
                    echo "ERROR: Could not able to execute 'Eliminacion de valores'$sql. Tabla Pedidos <br>" . mysqli_error($link);
                }
            /*Reinicio del indice automático. */
            $sql_reset_id = "ALTER TABLE pedidos AUTO_INCREMENT = 1"; 
                
                if(mysqli_query($connection, $sql_reset_id)){
                    echo "Reseteo correcto de la tabla pedidos.";
                } else{
                    echo "ERROR: Could not able to execute 'Reseteo no correcto'$sql. <br>" . mysqli_error($link);
                }
            /* cerrar la conexión */
            mysqli_close($connection);              
        }
        function insertarDatosTablaPedidos(){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            
            $sql = "INSERT INTO pedidos (concesionario, fecha, proveedor, producto, productoID, cantidad,confirmado) VALUES 
                                ('concesionario1',NOW(),'proveedorX','coche','23234','100','1'),
                                ('concesionario1',NOW(),'proveedorZ','coche','396','12','1'),
                                ('concesionario4',NOW(),'proveedorX','bus','345','45','0'),
                                ('concesionario8',NOW(),'proveedorF','coche','23234','5','1'),
                                ('concesionario3',NOW(),'pepe','plane','3453','68','0'),
                                ('concesionario1',NOW(),'proveedorX','coche','456','35','1'),
                                ('concesionario2',NOW(),'pepe','coche','396','12','1'),
                                ('concesionario4',NOW(),'proveedorA','bus','345','45','0'),
                                ('concesionario8',NOW(),'proveedorF','coche','23234','5','0'),
                                ('concesionario1',NOW(),'pepe','plane','3453','68','1'),
                                ('concesionario6',NOW(),'proveedorX','coche','23234','100','1'),
                                ('concesionario1',NOW(),'proveedorU','coche','396','12','0'),
                                ('concesionario5',NOW(),'proveedorX','bus','345','35','1'),
                                ('concesionario8',NOW(),'proveedorF','coche','234','35','0'),
                                ('concesionario6',NOW(),'pepe','plane','3453','35','1'),
                                ('concesionario3',NOW(),'pepe','coche','234','6','0')";

            if(mysqli_query($connection, $sql)){
                echo "Records added successfully in table pedidos.<br>";
            } else{
                echo "ERROR: Could not able to execute $sql, in table pedidos. <br>"; //. mysqli_error($link);
            }
            /* cerrar la conexión */
            mysqli_close($connection);          
        }
        function insertarDatosTablaProductos(){

            $connection= mysqli_connect("localhost", "root", "", "practica_php");

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            $sql = "INSERT INTO productos (proveedor, nombre, cantidad, descatalogado) VALUES 
                                ('pepe', 'coche', '2','true'),
                                ('p1', 'avion', '25','true'),
                                ('pepe', 'bicicleta', '54','true'),
                                ('p1', 'coche', '8','true'),
                                ('pepe', 'moto', '100','true'),
                                ('pepe', 'moto', '21','false'),
                                ('p3', 'coche', '18','false'),
                                ('pepe', 'Sebastian', '84','true'),
                                ('p4', 'bus', '87','true'),
                                ('pepe', 'bicicleta', '130','false'),
                                ('p5', 'bus', '221','true'),
                                ('p5', 'camion', '1822','false'),
                                ('p4', 'bus', '87','true'),
                                ('pepe', 'bicicleta', '130','false'),
                                ('p5', 'bus', '221','true'),
                                ('p5', 'camion', '1822','false')";

            if(mysqli_query($connection, $sql)){
                echo "Records added successfully.<br>";
            } else{
                echo "ERROR: Could not able to execute $sql. <br>" . mysqli_error($link);
            }
            /* cerrar la conexión */
            mysqli_close($connection);              
        }
        function deleteAllElementsFromTableProductos(){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            $sql = "DELETE FROM productos";

                if(mysqli_query($connection, $sql)){
                    echo "Eliminacion correcta.";
                } else{
                    echo "ERROR: Could not able to execute 'Eliminacion de valores'$sql. <br>" . mysqli_error($link);
                }
            /*Reinicio del indice automático. */
            $sql_reset_id = "ALTER TABLE productos AUTO_INCREMENT = 1"; 
                
                if(mysqli_query($connection, $sql_reset_id)){
                    echo "Reseteo correcto.";
                } else{
                    echo "ERROR: Could not able to execute 'Reseteo no correcto'$sql. <br>" . mysqli_error($link);
                }
            /* cerrar la conexión */
            mysqli_close($connection);              
        }
        function confirmarPedidoSi($ID){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");
           
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            
            $consulta = "UPDATE pedidos SET confirmado = 1 WHERE id = $ID";    
            $resultado = mysqli_query($connection, $consulta);
            
            /* cerrar la conexión */
            mysqli_close($connection);
        }
        function confirmarPedidoNo($ID){
           $connection= mysqli_connect("localhost", "root", "", "practica_php");
           
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            } 
             
            $consulta = "UPDATE pedidos SET confirmado = 0 WHERE id = $ID";    
            $resultado = mysqli_query($connection, $consulta);
           
            /* cerrar la conexión */
            mysqli_close($connection);
        }
        function cerrarSesion($proveedor){
            $connection= mysqli_connect("localhost", "root", "", "practica_php");
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            } 
             
            $consulta = "UPDATE usuario SET numeroSesiones = 0 WHERE username = '$proveedor'";    
            $resultado = mysqli_query($connection, $consulta);
           
            /* cerrar la conexión */
            mysqli_close($connection);
        }
    }
?>