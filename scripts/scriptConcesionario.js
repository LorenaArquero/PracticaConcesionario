function hacerPedido(id){
    var idGlobal = id;
    document.location.href="./pedido.php?IDuser="+id;
}

$(document).ready(function(){ 
	$("#form").on('change', '#proveedores', function(){
        
        var i,items, list="";
        var valor = $(this).val();
        
        console.log(valor);
        
        valor = "valor="+valor;
        var saveme = $.ajax({

                type: "POST",
                url: "rellenar_productos.php",
                data: valor,
                dataType:"html",
                async:false,
            
        }).responseText;
        
        items = JSON.parse(saveme);
    
        list += "<option value='0' selected='selected'>Seleccione un producto</option>";
        for(i in items){

            list += "<option value='" + items[i].nombre+ "'>"  + items[i].nombre + "</option>";
        }
        $(this).siblings('select').html(list);
        
	});
});

$(document).ready(function(){ 
	$("#filtro").on('change', function(){
        
        var i,items, list="";
        var filtro = $(this).val();
        
        if(filtro == 0){
            
            var input ="";
            $("#variable").html(input);
            var id = $('#idUser').val();
            document.location.href="../concesionario/concesionario.php?ID="+id;

        }else if(filtro == 1){
            
            var input = '<input type="date" id="dato"/><input type="button" value="aceptar" onclick="redirigirFecha()"/>'; 
            $("#variable").html(input);
            
        }else if(filtro == 2){
             var input = '<input type="text" id="dato"/><input type="button" value="aceptar" onclick="redirigirProveedor()"/>'; 
            $("#variable").html(input);
        }else{
             var input = '<input type="text" id="dato"/><input type="button" value="aceptar" onclick="redirigirProducto()"/>'; 
            $("#variable").html(input);
            
        }
                
	});
});

function redirigirFecha(){
    
    var id = $('#idUser').val();
    var fecha = $("#dato").val();
    document.location.href="../concesionario/concesionario.php?ID="+id+"&filtro=fecha&fecha="+fecha;
    
}

function redirigirProveedor(){
    
    var id = $('#idUser').val();
    var proveedor = $("#dato").val();
    document.location.href="../concesionario/concesionario.php?ID="+id+"&filtro=proveedor&proveedor="+proveedor;
    
}

function redirigirProducto(){
    
    var id = $('#idUser').val();
    var producto = $("#dato").val();
    document.location.href="../concesionario/concesionario.php?ID="+id+"&filtro=producto&producto="+producto;
    
}




				


				  


























