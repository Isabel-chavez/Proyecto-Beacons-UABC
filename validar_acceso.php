<?php

  echo "VALIDAREMOS EL LOGIN<br>";
  $email =$_POST['user_email'];        echo "emaial:".$email;
  $password=$_POST['user_clave'];      echo "<br>Password:".$password;

  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  // $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

  $resultado = $mysqli->query("SELECT * FROM usuarios_beacons WHERE correo='$email' and clave='$password'");
  $cantidad_registros = $resultado->num_rows;

 
     if($cantidad_registros !=1)
	   echo "Son correctos los datos";
     else
       echo "Datos Incorrectos!!";
   

/*
   while($fila=$resultado->fetch_assoc()){ 
   	$correo=$fila["correo"];
   	$passwd=$fila["clave"];
   }	
*/
 
?>