<?php

    include("../db_connect/db_connect.php");

	$consulta = mysqli_query($connection, "SELECT * FROM mensajes");

?>
	 	<tr>
            <td class="negrita">De</td>
            <td class="negrita">Mensaje</td>
            <td class="negrita">Leído</td>
            <td class="negrita">Fecha</td>
	    </tr>

<?php

	while($filas = mysqli_fetch_array($consulta)){
		$IDu=$filas['id'];
		$emisor=$filas['emisor'];
		$texto=$filas['texto'];
		$leido=$filas['leido'];
		$fecha=$filas['fecha'];


		if($leido == '0'){						//si no se ha leido el mensaje se muestra en negro
			echo "<tr>";
			echo "<td>".$emisor."</td>";
			echo "<td>".$texto."</td>";
			echo "<td>No</td>";
			echo "<td>".$fecha."</td>";
			echo "<td><input type='checkbox' name='check_list[]' value=".$IDu."></td>"; 
		    echo "</tr>";
		}else{									//si se ha leido el mensaje se muestra en gris
			echo "<tr>";
			echo "<td class='gris'>".$emisor."</td>";
			echo "<td class='gris'>".$texto."</td>";
			echo "<td class='gris'>Si</td>";
			echo "<td class='gris'>".$fecha."</td>";
		    echo "</tr>";
		}
	

	}

?>