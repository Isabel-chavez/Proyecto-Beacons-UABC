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
        height:525px;
        /* The height is 400 pixels */
        /* width: 100%; */
        /* The width is the width of the web page */
      }
    </style>

    <style type = "text / css">
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


        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 18,
          center: ulauditorio,
        });

         const contenido_auditorio=
          '<div id="content">' +
          '<h1 id="firstHeading" class="firstHeading">Beacon Auditorio</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud:</b>31.82521 <br>" +
          "<b><br>Longitud:</b>-116.599<br>" +
          "<b><br>Cantidad máxima de personas:</b>20"+
          "<b><br>Total de personas:</b>15" +
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
          '<h1 id="firstHeading" class="firstHeading">Beacon Biblioteca</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud:</b>31.82435 <br>" +  
          "<b><br>Longitud:</b>-116.5976<br>" +
          "<b><br>Cantidad máxima de personas:</b>20"+
          "<b><br>Total de personas:</b>15" +
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
          '<h1 id="firstHeading" class="firstHeading">Beacon Cafetería 1</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud:</b>31.82416<br>" +  
          "<b><br>Longitud:</b>-116.5973<br>" +
          "<b><br>Cantidad máxima de personas:</b>20"+
          "<b><br>Total de personas:</b>10" +
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
          '<h1 id="firstHeading" class="firstHeading">Beacon Cafetería 2</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Latitud: 31.8241</b><br>" +  
          "<b><br>Longitud: -116.5975</b><br>" +
          "<b><br>Cantidad máxima de personas: </b>20"+
          "<b><br>Total de personas:</b>10" +
          "</p>" +
          '<p><a href="ver_dispositivos.php?nodo=4">Ver dispositivos:</a>' +
         "<br>(05 Diciembre 2020).</p>" +
          "</div>" +
          "</div>";

          const infowindow_nodo4= new google.maps.InfoWindow({
            content:contenido_cafeteria2,
            maxWidth: 300,
           });
         
        // const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

        const image = "./assets/icons/40x40.png";

        // The marker, positioned at Uluru
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