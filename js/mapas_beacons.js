// javascript para manejo del mapa de google maps
function init(){
   var mapOption = {
     center: new google.maps.LatLng(-12.06244,-77.12272),
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

   // Marcador 1
   var marker = new google.maps.Marker({
      position: { lat: 31.82521, lng: -116.599 }, // coodernadas del marcador 1
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker.setMap(map);

   // Marcador 2
   var marker2 = new google.maps.Marker({
      position: { lat: 31.82435, lng: -116.5976 }, // coordenadas del marcador 2
      icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
   });
   marker2.setMap(map);
}