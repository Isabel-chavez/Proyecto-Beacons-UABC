<!DOCTYPE html>
<html>
  <head>
    <title>Agregar MAPA CON UNA ubicación</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWQpkrVcmS74k-Ow6UnQzAiMn4FLQjZV4&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height:400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Ininializa y agrega el mapa
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 31.82521, lng: -116.599};  

        const ulbiblioteca = { lat: 31.82435, lng: -116.5976};  

        const ulcafeteriauno = { lat: 31.82416, lng: -116.5973};  

        const ulcafeteriados = { lat: 31.8241, lng: -116.5975};    


        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: uluru,
        });

         
        // const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

        const image = "./assets/icons/40x40.png";

        // The marker, positioned at Uluru
        const markerAuditorio = new google.maps.Marker({
          position: uluru,
          map: map,
          title:"NODO Auditorio UABC",
          icon: image
        });

        const markerBibioteca = new google.maps.Marker({
          position: ulbiblioteca,
          map: map,
          title:"NODO Bibliotec UABC",
          icon: image
        });
         const markerCafeteria1 = new google.maps.Marker({
          position: ulcafeteriauno,
          map: map,
          title:"NODO Cafetería 1 UABC",
          icon: image
        });

        const markerCafeteria2 = new google.maps.Marker({
          position: ulcafeteriados,
          map: map,
          title:"NODO Cafetería 2 UABC",
          icon: image
        });


      }
    </script>
  </head>
  <body>
    <h3>Ubicaciones Google Maps de la UABC Valle Dorado Ensenada, B.C. México</h3>
    <!--The div element for the map -->
    <div id="map"></div>
  </body>
</html>