<?php


$nombreNodo = utf8_decode($_POST['nombreNodo']);  			// echo "ELnombreNodo".$nombreNodo;
$latitud = $_POST['latitud'];        			// echo "latitud".$latitud;
$longitud =$_POST['longitud'];      			// echo "longitud".$longitud;
$estado =  $_POST['estado'];          			// echo "estado".$estado;
$fecha =  $_POST['fechaInstalacion'];           // echo "fechaInstalacion= ".$fecha;  
$fechaInstalacion= $_POST['fechaFormateada'];   // echo "fechaFormateada: ".$fechaInstalacion;  
$fechaHoy=date("d/m/Y");   
$numPersonas=$_POST['numPerson'];               // echo "<br>fecha".$fechaHoy; exit(1);
// $password = md5($_POST['password']);


$mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");


// $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

$resultado = $mysqli->query("INSERT INTO nodos(id,nombre,lat,lon,estado,fecha_registro,fecha_instalacion,cantidad_personas) VALUES (0,'$nombreNodo','$latitud','$longitud','$estado',now(),'$fechaInstalacion',$numPersonas)");



echo $resultado;


?>