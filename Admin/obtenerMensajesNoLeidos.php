<?php

    include("../db_connect/db_connect.php");

	$consulta = mysqli_query($connection, "SELECT * FROM mensajes WHERE leido ='0'");

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

	
		echo "<tr>";
		echo "<td>".$emisor."</td>";
		echo "<td>".$texto."</td>";
		echo "<td>No</td>";
		echo "<td>".$fecha."</td>";
		echo "<td><input type='checkbox' name='check_list[]' value=".$IDu."></td>"; 
	    echo "</tr>";
	

	}

?>