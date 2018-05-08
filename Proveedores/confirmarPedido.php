<?php
    include("Conecxion.php");
    $Con = new  conecxion();
    $resultado = $_POST['idIntroducido'];
   

    
    $valorID = $_POST['idIntroducido'];
    

    if(strcmp($valorID, "")==0){
        echo '¡Error! Has de introducir un valor.';
    }else{
        if(strcmp($_POST['option'], "si")==0){
        
            $Con->confirmarPedidoSi($valorID);
            echo '¡Pedido marcado como confirmado!';
        }else{
            if(strcmp($_POST['option'], "no")==0){
                $Con->confirmarPedidoNo($valorID);
                echo '¡Pedido marcado como no confirmado!';
            }
        }
    }

    echo '<button id="myButton" class="float-left submit-button" >Pagina de proveedores</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            location.href = "/Proveedores/proveedores.php";
        };
    </script>';
    
?>