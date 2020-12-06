<?php
/*
* nodos_en_mapa.php
  Isabel Chavez
  En este script se obtiene info de los nodos de la base de datos y se muestra los nodos en un mapa
*/



$info_nodo1=getInfoNodo(1);  // print_r($info_nodo1);
$info_nodo2=getInfoNodo(2);  // print_r($info_nodo2);
$info_nodo3=getInfoNodo(3);  // print_r($info_nodo3);
$info_nodo4=getInfoNodo(4);  // print_r($info_nodo4);

function determinarSemaforo($nodo_id){
  
  $color="";
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  // $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

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
  // $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");
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

<!DOCTYPE html>
<html>
  <head>
    <title>Beacons UABC</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWQpkrVcmS74k-Ow6UnQzAiMn4FLQjZV4&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height:600px;
        /* The height is 400 pixels */
        /* width: 100%; */
        /* The width is the width of the web page */
      }
    </style>

    <style type = "text / css">
   .titulo_ventana{
     color:#005670; 
   }
   .etiquetas {
     color rojo;
     color de fondo: blanco;
     familia de fuentes: "Lucida Grande", "Arial", sans-serif;
     tamaño de fuente: 10px;
     font-weight: negrita;
     alineación de texto: centro;
     ancho: 40px;     
     borde: 2px negro sólido;
     espacio en blanco: nowrap;
   }
 </style>

    <script>
      // Ininializa y agrega el mapa
      function initMap() {
        // The location of Uluru
        const ulauditorio= { lat: 31.82521, lng: -116.599};  

        const ulbiblioteca = { lat: 31.82435, lng: -116.5976};  

        const ulcafeteriauno = { lat: 31.82416, lng: -116.5973};  

        const ulcafeteriados = { lat: 31.8241, lng: -116.5975};    


        // The map, centered el auditorio
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 18,
          center: ulauditorio,
        });

         /*
         *  SECCION  contendido que se mostrara en las ventanas de cada maker
         */
         
         
         const contenido_auditorio=
         <?php 
         // $info_nodo1=getNodos(1); print_r($info_nodo1);
         // for($i=0; $i<=count($info_nodo1);$i++){ 
          
           ?>
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Auditorio</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud: </b>"+<?php echo $info_nodo1['lat'];?>+
          "<b><br>Longitud:</b>"+<?php echo $info_nodo1['lon'];?>+
          "<b><br>Cant. máxima de personas:</b>"+<?php echo $info_nodo1['permitidos'];?>+
          "<b><br>Total dispositivos:</b>" +<?php echo $info_nodo1['total_dispositivos'];?>+
          /* "<b><br>Color semaforo: </b><?php echo $info_nodo1['color'];?>"+ */
          "</p>" +
          '<div id="icono"><div class="row"><div class="col-md-12"><img src="./assets/icons/<?php echo $info_nodo1['color'];?>.png"></div></div></div>' +
          '<br><p><a href="ver_dispositivos.php?nodo=1">Ver dispositivos:</a>' +
          "<br><?php echo date('d/m/Y');?></p>"+
          "</div>" +
          "</div>";
       
         <?php // } ?>

          const infowindow_nodo1 = new google.maps.InfoWindow({
            content:contenido_auditorio,
            maxWidth:330,
           });

          // nodo2

          const contenido_biblioteca=
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Biblioteca</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud: </b>"+<?php echo $info_nodo2['lat'];?>+
          "<b><br>Longitud:</b>"+<?php echo $info_nodo2['lon'];?>+
          "<b><br>Cant. máxima de personas:</b>"+<?php echo $info_nodo2['permitidos'];?>+
          "<b><br>Total dispositivos:</b>"+<?php echo $info_nodo2['total_dispositivos'];?>+
          /* "<b><br>Color semaforo: </b><?php echo $info_nodo2['color'];?>"+ */
          "</p>" +
          '<div id="icono"><div class="row"><div class="col-md-12"><img src="./assets/icons/<?php echo $info_nodo2['color'];?>.png"></div></div></div>' +
          '<br><p><a href="ver_dispositivos.php?nodo=2">Ver dispositivos:</a>' +
          "<br><?php echo date('d/m/Y');?></p>"+
          "</div>" +
          "</div>";

          const infowindow_nodo2 = new google.maps.InfoWindow({
            content:contenido_biblioteca,
            maxWidth:300,
           });

          // NODO 3

          const contenido_cafeteria=
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Cafetería 1</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud: </b>"+<?php echo $info_nodo3['lat'];?>+
          "<b><br>Longitud:</b>"+<?php echo $info_nodo3['lon'];?>+
          "<b><br>Cantidad máxima de personas:</b>"+<?php echo $info_nodo3['permitidos'];?>+
          "<b><br>Total dispositivos:</b>" +<?php echo $info_nodo3['total_dispositivos'];?>+
          /* "<b><br>Color semaforo: </b><?php echo $info_nodo3['color'];?>"+ */
          "</p>" +       
          "</div>" +'<div id="icono"><div class="row"><div class="col-md-12" aling="center"><img src="./assets/icons/<?php echo $info_nodo3['color'];?>.png"></div></div></div>' +
          '<p><a href="ver_dispositivos.php?nodo=2">Ver dispositivos:</a>' +
          "<br><?php echo date('d/m/Y');?></p>"+
          "</div>";

          
           const infowindow_nodo3 = new google.maps.InfoWindow({
            content:contenido_cafeteria,
            maxWidth:300,
           });

           // NODO 4
           const contenido_cafeteria2=
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Cafetería 2</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud: </b>"+<?php echo $info_nodo4['lat'];?>+
          "<b><br>Longitud:</b>"+<?php echo $info_nodo4['lon'];?>+
          "<b><br>Cantidad máxima de personas:</b>"+<?php echo $info_nodo4['permitidos'];?>+
          "<b><br>Total dispositivos:</b>" +<?php echo $info_nodo4['total_dispositivos'];?>+
          /* "<b><br>Color semaforo: </b><?php echo $info_nodo4['color'];?>"+ */
          "</p>" +
          '<div id="icono"><div class="row"><div class="col-md-12"><img src="./assets/icons/<?php echo $info_nodo4['color'];?>.png"></div></div></div>' +
          '<br><p><a href="ver_dispositivos.php?nodo=2">Ver dispositivos:</a>' +
          "<br><?php echo date('d/m/Y');?></p>"+
          "</div>" +
          "</div>";

          const infowindow_nodo4= new google.maps.InfoWindow({
            content:contenido_cafeteria2,
            maxWidth: 300,
           });
         
        /*
        *   TERMINA SECCION del contenido de que se muestra en los popup
        */

        // const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

        const image = "./assets/icons/40x40.png";

        // El marker, posicionado en nodo auditorio
        const markerAuditorio = new google.maps.Marker({
          position: ulauditorio,
          map: map,
          title:"NODO Auditorio UABC",
          label:"Auditorio", 
          icon: image
        });

        const markerBibioteca = new google.maps.Marker({
          position: ulbiblioteca,
          map: map,
          title:"NODO Bibliotec UABC",
          label:"Biblioteca",
          icon: image
        });
         const markerCafeteria1 = new google.maps.Marker({
          position: ulcafeteriauno,
          map: map,
          title:"NODO Cafetería 1 UABC",
          label:"Cafetería 1",
          icon: image
        });

        const markerCafeteria2 = new google.maps.Marker({
          position: ulcafeteriados,
          map: map,
          title:"NODO Cafetería 2 UABC",
          label:"Cafetería 2",
          icon: image
        });


       // ponemos popup
        markerAuditorio.addListener("click", () => {
          infowindow_nodo1.open(map,markerAuditorio);
        });

        markerBibioteca.addListener("click", () => {
          infowindow_nodo2.open(map,markerBibioteca);
        });

        markerCafeteria1.addListener("click", () => {
          infowindow_nodo3.open(map,markerCafeteria1);
        });

        markerCafeteria2.addListener("click", () => {
          infowindow_nodo4.open(map,markerCafeteria2);
        });

     

      } // end init map()


    </script>
  </head>
  <body>
    <h3>UABC Valle Dorado Ensenada, B.C. México</h3>
    <!--The div element for the map -->
    <div id="map"></div>
  </body>
</html>