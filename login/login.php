<?php
   $user = $_GET['user'];
   $password = $_GET['password'];

   if (($user == "admin") AND ($password == "admin1234")) {
      echo "Bienvenido ".$user;
   } else {
      echo "¡Usuario o contraseña incorrectos!";
      echo '<br><a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a>';
   }
?>