
<html5>
    <head>
        <title>Page Proveedor</title>
        
    </head>

    <body>
    <br><br><br>
        <div>
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
            Enviar este fichero: <input name="fichero_usuario" type="file" />
            <input type="submit" value="Enviar fichero" />
        </form>
            <p>
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
            <fieldset>
                <legend>Opciones</legend>
                
                    
                        
                <form method="post">
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Ambos") ;?> value="Ambos (confirmados y no confirmados)">Ambos (confirmados y no confirmados)    
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Confirmado") ;?> value="Confirmados">Confirmados
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="No Confirmado") ;?> value="No Confirmados">No confirmados
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
            
            <br><br>
            <fieldset>
                
                <legend>Datos: TABLA PEDIDOS <?php echo $gender?></legend>
                
                <fieldset>
                    <legend>Opciones de confirmar pedido.</legend>
                        <?php $valorRadioButton = ""?>
                        <form action="confirmarPedido.php" method="POST">
                            Introduzca Id: <input type="text" name="idIntroducido" > 
                            <input type="radio" name="option"<?php if (isset($valorRadioButton) && $valorRadioButton=="si");?> value="si">Si
                            <input type="radio" name="option"<?php if (isset($valorRadioButton) && $valorRadioButton=="no");?> value="no">No
                            
                            <input type="submit" name="submitConfirmar" value="Submit">
                        </form>
                </fieldset>
            <br><br>
                <div>
                   <?php
                        if(strcmp($gender, "Ambos (confirmados y no confirmados)")==0 ){
                            $Con->recuperarDatosProductos();
                        }else{ 
                            if(strcmp($gender, "Confirmados")==0){
                                $Con->recuperarDatosProductosConfirmados();
                           
                            }else{
                                if(strcmp($gender, "No Confirmados")==0){
                                    $Con->recuperarDatosProductosNoConfirmados();
                                }  
                            }
                        }                      
                   ?>
                </div>
            </fieldset>  
        </div>

        
    </body>
</html5>
