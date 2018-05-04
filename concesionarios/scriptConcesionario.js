function hacerPedido(){
    document.location.href="./pedido/pedido.php";
}


$(document).ready(function(){ 
	$("#form").on('change', '#proveedores', function(){
        
        
        console.log("hola");        
        
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
        
        console.log(saveme);
        
        items = JSON.parse(saveme);
    
        list += "<option value='0' selected='selected'>Seleccione un producto</option>";
        for(i in items){

            list += "<option value='" + items[i].nombre+ "'>"  + items[i].nombre + "</option>";
        }
        $(this).siblings('select').html(list);
        
	});
});
