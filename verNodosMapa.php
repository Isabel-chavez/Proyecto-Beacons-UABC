<!DOCTYPE html>
<html>
<head>
 <title> INSERTAR MAPA EN GOOGLE MAPS</title>


 <script src="http://maps.googleapis.com/maps/api/js"> </script>

 <script>
/*
 function init(){
    var mapOption = {
     center: new google.maps.LatLng(31.82521,- -116.599),
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
    };
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

  }
  */

  function init2(){
   var mapOption = {
     center: new google.maps.LatLng(31.82521, -116.599),
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

   // Marcador 1
   var marker = new google.maps.Marker({ 
      position: { lat: 31.82435, lng:-116.5976}, // coodernadas del marcador 1
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker.setMap(map);

   // Marcador 2
   var marker2 = new google.maps.Marker({ 31.82416, 
      position: { lat: 31.82416, lng: -116.5973}, // coordenadas del marcador 2
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker2.setMap(map);
}

  google.maps.event.addDomListener(window, 'load', init2);

 </script>


  </head>
  <body>

  <div id="map" style="width:1000px; height: 800px; border: solid; border-color: #00FFFF  "></div>


</body>
</html>﻿