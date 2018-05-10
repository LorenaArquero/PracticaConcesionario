
<html5>
    <head>
        <title>Proveedor</title>
        <link rel="stylesheet" type="text/css" href="styleProveedores1.css">
    </head>

    <body>
    <div id="general">
    <br>

        <?php
            $nameProveedor = $_GET["user"];
        ?>

        <form action="../Proveedores/cerrarSesion.php?nameProveedor=<?php echo $nameProveedor;?>" method="post">
            <button type="submit" id="myButton"  class="button button2" >Salir - Ventana Login</button>
        </form>
        <fieldset id="fieldset1">
                <div id="div_menu">
                    <ol>
                        <li>Cargar un fichero XML</li>
                        <li>Visualizar valores de confirmados o no confirmados.</li>
                    </ol>
                </div>
            <legend id="legend" align="center">Bienvenido, <?php echo $nameProveedor ?>, las opciones que tiene son:</legend>
                
        </fieldset>
        <br>
        <fieldset id="fieldset1">

            <legend id="legend2">Opciones XML</legend>
                <form enctype="multipart/form-data" action="upload.php" method="POST">
                    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                    Cargar fichero  XML para visualización <input name="fichero_usuario" type="file" />
                    <input type="submit" value="Visualizar fichero" />
                </form>
                <form enctype="multipart/form-data" action="guardar_productos.php?proveedor=<?php echo $nameProveedor?>" method="POST">
                    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                    Actualizar productos con el fichero XML <input name="fichero_usuario" type="file" />
                    <input type="submit" value="Guardar cambios" />
                </form>
        </fieldset>
        <br>
            <?php
                        include("Conecxion.php");
                        $Con = new  conecxion();
                        
                        /*Operaciones sobre la tabla de Productos*/
                            
                            //$Con->deleteAllElementsFromTableProductos();
                            //$Con->insertarDatosTablaProductos();
                        
                        /*Operaciones sobre la tabla de Pedidos*/
                            
                            //$Con->deleteAllElementsFromTablePedidos();
                            //$Con->insertarDatosTablaPedidos();
                    ?>
        <fieldset id="fieldset1">
            <legend id="legend2">Opciones: Marque una opción para visualizar  los pedidos.</legend>
            
                
                    
            <form method="post">
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Ambos") echo "checked";?> value="Ambos (confirmados y no confirmados)">Ambos (confirmados y no confirmados)    
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Confirmado") echo "checked";?> value="Confirmados">Confirmados
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="No Confirmado") echo "checked";?> value="No Confirmados">No confirmados
                    <br>

                <?php $gender = ""?>
                <input type="submit" name="submit" value="Submit - Ver"> 
                <?php
                        if (empty($_POST["gender"])) {
                            $genderErr = "Marque alguna opción.";
                            echo $genderErr;
                        } else {
                            $gender = $_POST["gender"];
                            echo "Ha seleccionado => " .$gender;   
                        }
                    ?>
                
            </form>
        </fieldset>
        <br><br>
        <fieldset id="fieldset1">
                    <legend id="legend2">Opciones de confirmar pedido.</legend>
                        <?php $valorRadioButton = ""?>
                        <form action="confirmarPedido.php?nameProveedor=<?php echo $nameProveedor;?>" method="POST">
                            Introduzca Id: <input type="text" name="idIntroducido" > 
                            <input type="radio" name="option"<?php if (isset($valorRadioButton) && $valorRadioButton=="si");?> value="si">Si
                            <input type="radio" name="option"<?php if (isset($valorRadioButton) && $valorRadioButton=="no");?> value="no">No
                            
                            <input type="submit" name="submitConfirmar" value="Submit">
                        </form>
                </fieldset>



        <br>
        <fieldset id="fieldset2">
            
            <legend id="legend2">Datos: TABLA PEDIDOS que han sido <?php echo $gender?></legend>
            <div>
                <?php
                
                    if(strcmp($gender, "Ambos (confirmados y no confirmados)")==0 ){
                        $Con->recuperarDatosProductos($nameProveedor);
                    }else{ 
                        if(strcmp($gender, "Confirmados")==0){
                            $Con->recuperarDatosProductosConfirmados($nameProveedor);
                        
                        }else{
                            if(strcmp($gender, "No Confirmados")==0){
                                $Con->recuperarDatosProductosNoConfirmados($nameProveedor);
                            }  
                        }
                    }                      
                ?>
            </div>
        </fieldset>  
        </div>
    </body>
</html5>
