<!DOCTYPE html>
<html>
<head>
 <title> INSERTAR MAPA EN GOOGLE MAPS</title>


 <script src="http://maps.googleapis.com/maps/api/js"> </script>

 <script>

 function init(){
    var mapOption = {
     center: new google.maps.LatLng(31.8249986,-116.5985307),
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
    };
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

  }
/*
  function init2(){
   var mapOption = {
     center: new google.maps.LatLng(-12.06244,-77.12272),
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

   // Marcador 1
   var marker = new google.maps.Marker({
      position: { lat: -12.06244, lng: -77.12272 }, // coodernadas del marcador 1
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker.setMap(map);

   // Marcador 2
   var marker2 = new google.maps.Marker({
      position: { lat: -12.06444, lng: -77.12472 }, // coordenadas del marcador 2
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker2.setMap(map);
}
*/
  google.maps.event.addDomListener(window, 'load', init);

 </script>


  </head>
  <body>

  <div id="map" style="width:1000px; height: 800px; border: solid; border-color: #00FFFF  "></div>


</body>
</html>﻿