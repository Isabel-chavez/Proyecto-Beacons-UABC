<?php

  function determinarSemaforo($nodo_id){
  
  $color="";
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  //$mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

  $query=$mysqli->query("SELECT cantidad_personas FROM nodos where estado='Activo' AND id=$nodo_id"); 
  
   while($fila=$query->fetch_assoc()){ 
     $permitidos=$fila["cantidad_personas"];               // echo "<br>total personas permitidas:".$permitidos;
   } 

 
   $total_dispositivos=getCantidadDispositivos($nodo_id);   // echo "<br>total dispositos: ".$total_dispositivos;
   $mitad=round($permitidos/2);                             // echo "<br>la MITAD=$mitad";  


    if(((int)$total_dispositivos>=(int)$permitidos)){
       $color="rojo";                                       // echo "<br>es ROJO";
    }else{
      

     if(((int)$total_dispositivos >=(int)$mitad)){
            $color="amarillo";                              // echo "<br>es AMARILLO"; 
       }else
         {
           $color="verde";                                  // echo "<br>es VERDE";
         }

    }
  
    return $color;
} // end function

function getInfoNodo($nodo_id){
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  //$mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");
  $query = $mysqli->query("SELECT * FROM nodos where estado='Activo' AND id=$nodo_id"); 
  
  while($fila=$query->fetch_assoc()){ 
    $datos['nodo_id']=$fila["id"];                           // echo "<br>NODO:$id";
    $datos['nombre']=$fila["nombre"];
    $datos['lat']=$fila["lat"];
    $datos['lon']=$fila["lon"];
    $datos['f_instalacion']=$fila["fecha_instalacion"];
    $datos['f_registro']=$fila["fecha_registro"];
    $datos['permitidos']=$fila["cantidad_personas"];         // echo "<br>permitidos:$permitidos";
    $lamitad=$fila["cantidad_personas"]/2;
    $total_dispositivos=getCantidadDispositivos($nodo_id);   // echo "<br>TOTAL dispositivos conectados".$total_dispositivos;
    $datos['total_dispositivos']=$total_dispositivos;
    $datos['color']=determinarSemaforo($nodo_id);            // echo "<br>color:$color";
    
    
   } //end while4

   return $datos; 

}


 /*
 * Se obtiene la cantidad de dispositivos conectados en un nodo en particular
   parameto: nodo  //es el identificador del nodo
 */
function getCantidadDispositivos($nodo){
   
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
 // $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

 $resultado=$mysqli->query("SELECT count(conexion_id) as cant FROM conexiones_beacons  where estado_conexion='CONECTADO' AND nodo_id=$nodo");
  
  while($fila=$resultado->fetch_assoc()){ 
    $tot_connectados=$fila["cant"];    
   
   }  
   return $tot_connectados;
 }

?>