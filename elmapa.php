<!DOCTYPE html>
<html>
  <head>
    <title>Agregando ubicaciones</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWQpkrVcmS74k-Ow6UnQzAiMn4FLQjZV4&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      /* Esta declaración CSS indica que el contenedor del mapa <div> (con id map) debería ocupar el 100% de la altura del cuerpo HTML. */

      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 31.82435, lng:-116.5976};  
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 8,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
  </head>
  <body>
    <h3>Visualizando un mapa</h3>
    <!--The div element for the map -->
    <div id="map"></div>
  </body>
</html>