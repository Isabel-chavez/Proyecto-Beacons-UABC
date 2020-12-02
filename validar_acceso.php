<?php

  // echo "VALIDAREMOS EL LOGIN<br>";
  $email =$_POST["user_email"];        // echo "emaial:".$email;
  $password=$_POST["user_clave"];      // echo "<br>Password:".$password;

  // $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

  $resultado = $mysqli->query("SELECT * FROM usuarios_beacons WHERE correo='$email' and clave='$password'");
  $cantidad_registros = $resultado->num_rows;

  while($fila=$resultado->fetch_assoc()){ 
   	$correo=$fila["correo"];   // echo "<br><br>correo:".$correo;
   	$passwd=$fila["clave"];    // echo "<br>pass:".$passwd;
   	$rol=$fila["rol"];         // echo "<br>rol:".$rol;
   }	
 
     if($cantidad_registros>=1){
	   // echo "<br><br><b>Son correctos los datos!!!!</b>";
	   header("Location: home.php?rol=$rol");
     }else{
       // echo "<br>Datos Incorrectos!!";
       header("Location: index.php?e=0");
      }
   


  

 
?>