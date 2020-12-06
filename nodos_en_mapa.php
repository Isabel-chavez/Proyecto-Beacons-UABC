<?php

$color_nodo1=determinarSemaforo(1);  echo "<br>color nodo1:$color_nodo1";
$nodos=getNodos(); print_r($nodos);

function determinarSemaforo($nodo_id){
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  $query= $mysqli->query("SELECT cantidad_personas FROM nodos where estado='Activo' AND id=$nodo_id"); 

   while($fila=$query->fetch_assoc()){ 
     $permitidos=$fila["cantidad_personas"];
   } 

   $lamitad=$permitidos/2;
   $total_dispositivos=getCantidadDispositivos($nodo_id); 
    if($total_dispositivos<$permitidos){
      $color="verde";
    }elseif($total_dispositivos>$permitidos){
       $color="rojo";
    }elseif($total_dispositivos<$lamitad){
       $color="amarillo";
    }
    return $color;

}
function getNodos(){
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  $query = $mysqli->query("SELECT * FROM nodos where estado='Activo' "); 
  
  while($fila=$query->fetch_assoc()){ 
    $datos['nodo_id']=$fila["id"];                                    // echo "<br>NODO:$id";
    $datos['nombre']=$fila["nombre"];
    $datos['lat']=$fila["lat"];
    $datos['lon']=$fila["lon"];
    $datos['f_instalacion']=$fila["fecha_instalacion"];
    $datos['f_registro']=$fila["fecha_registro"];
    $datos['permitidos']=$fila["cantidad_personas"];             // echo "<br>permitidos:$permitidos";
    $lamitad=$fila["cantidad_personas"]/2;
    $total_dispositivos=getCantidadDispositivos($fila["id"]);   // echo "<br>TOTAL dispositivos conectados".$total_dispositivos;

    $datos['total_dispositivos']=$total_dispositivos;
    if($total_dispositivos<$fila["cantidad_personas"]){
      $color="verde";
    }elseif($total_dispositivos>$fila["cantidad_personas"]){
       $color="rojo";
    }elseif($total_dispositivos<$lamitad){
       $color="amarillo";
    }

    $datos['color']=$color;   echo "<br>color:$color";
    
    return $datos;
   }  

}
/*
 $total_nodo1=getCantidadDispositivos(1);  
 $total_nodo2=getCantidadDispositivos(2); 
 $total_nodo3=getCantidadDispositivos(3);   
 $total_nodo4=getCantidadDispositivos(4);  
 */

 /*
 * Se obtiene la cantidad de dispositivos conectados en un nodo en particular
   parameto: nodo  //es el identificador del nodo
 */
 function getCantidadDispositivos($nodo){
   
  $mysqli = new mysqli("localhost","chavez", "phoenix", "beacons");
  // $mysqli = new mysqli("localhost","geoconst_ichavez", "Miclave2020","geoconst_beacons");

  $resultado = $mysqli->query("SELECT count(conexion_id) as cant FROM conexiones_beacons  where estado_conexion='CONECTADO' AND nodo_id=$nodo");
  
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
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Auditorio</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud:</b>31.82521 <br>" +
          "<b><br>Longitud:</b>-116.599<br>" +
          "<b><br>Cantidad máxima de personas:</b>100"+
          "<b><br>Total de personas:</b>" +<?php echo getCantidadDispositivos(1);?>+
          "</p>" +
          '<p><a href="ver_dispositivos.php?nodo=1">Ver dispositivos:</a>' +
         "<br>(05 Diciembre 2020).</p>" +
          "</div>" +
          "</div>";

         

          const infowindow_nodo1 = new google.maps.InfoWindow({
            content:contenido_auditorio,
            maxWidth:330,
           });

          // nodo2

           const contenido_biblioteca=
          '<div id="content">' +
          '<h2 id="firstHeading" class="firstHeading titulo_ventana">Beacon Biblioteca</h2>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud:</b>31.82435 <br>" +  
          "<b><br>Longitud:</b>-116.5976<br>" +
          "<b><br>Cantidad máxima de personas:</b>80"+
          "<b><br>Total de personas:</b>" +<?php echo getCantidadDispositivos(2);?>+
          "</p>" +
          '<p><a href="ver_dispositivos.php?nodo=2">Ver dispositivos:</a>' +
         "<br>(05 Diciembre 2020).</p>" +
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
          "<p><b>Latitud:</b>31.82416<br>" +  
          "<b><br>Longitud:</b>-116.5973<br>" +
          "<b><br>Cantidad máxima de personas:</b>40"+
          "<b><br>Total de personas:</b>" +<?php echo getCantidadDispositivos(3);?>+
          "</p>" +
          '<p><a href="ver_dispositivos.php?nodo=3">Ver dispositivos:</a>' +
         "<br>(05 Diciembre 2020).</p>" +
          "</div>" +
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
          "<p><b>Latitud: 31.8241</b><br>" +  
          "<b><br>Longitud: -116.5975</b><br>" +
          "<b><br>Cantidad máxima de personas: </b>60"+
          "<b><br>Total de personas:</b>" +<?php echo getCantidadDispositivos(4);?>+
          "</p>" +
          '<p><a href="ver_dispositivos.php?nodo=4">Ver dispositivos:</a>' +
         "<br>(05 Diciembre 2020).</p>" +
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