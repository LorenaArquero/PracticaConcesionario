$(document).ready(function() {

	$("#buttonTodos").on("click", function() {
        $.ajax({
        	type: "GET",
            url: "obtenerTodosMensajes.php",
            dataType: "html",
            success: function(response){                    
            	$("#listaMensajes").html(response); 
        	}

        });

     });

	$("#buttonNoLeidos").on("click", function() {
        $.ajax({
        	type: "GET",
            url: "obtenerMensajesNoLeidos.php",
            dataType: "html",
            success: function(response){                    
            	$("#listaMensajes").html(response); 
        	}

        });

     });
  
});
