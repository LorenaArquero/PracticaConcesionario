$(document).ready(function(){ 
	$("#contenedor").on('change', '#proveedores', function(){
        
        var i,items, list="";
        var valor = $(this).val();
        valor = "valor="+valor;
        var saveme = $.ajax({

                type: "POST",
                url: "rellenar_productos.php",
                data: valor,
                dataType:"html",
                async:false,
            
        }).responseText;
        
        items = JSON.parse(saveme);
    
        list += "<option value='0' >Seleccione un producto</option>";
        for(i in items){

            list += "<option value='" + items[i].nombre+ "'>"  + items[i].nombre + "</option>";
        }
        $(this).siblings('select').html(list);
        
	});
});

var pedidos = 1;

function agregarNuevo(){
    
    //contenedor principal
    var contenedor = document.getElementById("contenedor");
    
    var espacio = document.createElement("br");
    //contenedor.appendChild(espacio);
    
    //formulario nuevo
    var nuevoFormulario=document.createElement("form");
    nuevoFormulario.action="./rellenar_productos.php";
    nuevoFormulario.name="formulario";
    nuevoFormulario.method="POST";
    nuevoFormulario.id="form";
    
    //proveedores
    var selProveedores=document.createElement("select");
    selProveedores.id="proveedores";
    selProveedores.name="proveedores";
    //opciones de proveedores
    var opcionProveedor=document.createElement("option");
    opcionProveedor.value="0";
    opcionProveedor.text="Seleccione un proveedor";
    selProveedores.appendChild(opcionProveedor);
    
    //productos
    var selProductos=document.createElement("select");
    selProductos.id="productos";
    selProductos.name="productos";
    //opciones de productos
    var opcionProducto=document.createElement("option");
    opcionProducto.value="0";
    opcionProducto.text="Seleccione un producto";;
    selProductos.appendChild(opcionProducto);
    
    //Input
    var input = document.createElement("input");
    input.type="number";
    input.value="Añadir";
    input.name="cantidad";
    input.value="0";
    input.min="0";
    //input.max="100"; 
    
    //añadir al form
    nuevoFormulario.appendChild(selProveedores);
    nuevoFormulario.appendChild(selProductos);
    nuevoFormulario.appendChild(input);
    
    //añadir al contenedor
    contenedor.appendChild(nuevoFormulario);
    
    pedidos++;
    rellenarProveedores();
}

function rellenarProveedores(){
    
     
    var i,items, list="";
    var saveme = $.ajax({

            type: "POST",
            url: "rellenar_proveedores.php",
            dataType:"html",
            async:false,
    }).responseText;

    items = JSON.parse(saveme);

    list += "<option value='0' disable selected>Seleccione un producto</option>";
    for(i in items){

        list += "<option value='" + items[i].username+ "'>"  + items[i].username + "</option>";
    }
    $("#contenedor").children().last().children().first().html(list);
       
}

function guardarDatos(user){
    
    var i;
    var contenedor = $("#contenedor");
    var formulario = contenedor.children().first().next().next().next();

    var nulo = Boolean(0); 
    
    for( i = 0; i < pedidos; i++){ //comprobar si hay valores nulos
        
        var proveedor = formulario.children().first().val();
        var producto = formulario.children().first().next().val();
        var cantidad = formulario.children().first().next().next().val();
        
        
        if( proveedor == "0" || producto == "0" || cantidad == 0 ){
            nulo = Boolean(1);
            formulario = formulario.next()
            continue;
        }
        formulario = formulario.next()
    }
    
    
    if(nulo){
        
        if (confirm("Algún valor sin rellenar. Si continúas, ese valor no será guardado, ¿continuar de todos modos?")){
            subirDatos(user);
        } else {
        } 
    }else{
        subirDatos(user);
        
    }   
    
}

function subirDatos(user){
    
    var i;
    var contenedor = $("#contenedor");
    
    var formulario = contenedor.children().first().next().next().next();
    
    
    for( i = 0; i < pedidos; i++){

        var proveedor = formulario.children().first().val();
        var producto = formulario.children().first().next().val();
        var cantidad = formulario.children().first().next().next().val();


        if( proveedor == "0" || producto == "0" || cantidad == 0 ){
            nulo = Boolean(1);
            formulario = formulario.next();
            continue;
        }

        var valor = "proveedor="+proveedor+"&producto="+producto+"&cantidad="+cantidad+"&concesionarioID="+user;
        var saveme = $.ajax({

                type: "POST",
                url: "guardar_datos.php",
                data: valor,
                dataType:"html",
                async:false,

        }).responseText;
        
        formulario = formulario.next();
    }
    
    alert ("Petición realizada con éxito");
    document.location.href="../concesionario/concesionario.php?ID="+user;

    
}

