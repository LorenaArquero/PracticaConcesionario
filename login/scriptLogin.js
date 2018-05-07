$(document).ready(function() {

	$("#botonMensaje").click(function(){

	var emisor = $("#emisor").val();
	var mensaje = $("textarea").val();

	var valor = "emisor="+emisor+"&mensaje="+mensaje;
    var saveme = $.ajax({

            type: "POST",
            url: "guardarMensaje.php",
            data: valor,
            dataType:"html",
            async:true,

    }).responseText;

    alert ("Mensaje enviado");


	});
});