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
        const uluru = { lat: 31.82521, lng: -116.599};  

        const ulbiblioteca = { lat: 31.82435, lng: -116.5976};  

        const ulcafeteriauno = { lat: 31.82416, lng: -116.5973};  

        const ulcafeteriados = { lat: 31.8241, lng: -116.5975};    


        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 18,
          center: uluru,
        });

         const contenido_auditorio=
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h1 id="firstHeading" class="firstHeading">Nodo 1</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Auditorio</b>, also referred to as <b>Ayers Rock</b>, is a large " +
          "sandstone rock formation in the southern part of the " +
          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
          "south west of the nearest large town, Alice Springs; 450&#160;km " +
          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
          "features of the Uluru - Kata Tjuta National Park. Uluru is " +
          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
          "Aboriginal people of the area. It has many springs, waterholes, " +
          "rock caves and ancient paintings. Uluru is listed as a World " +
          "Heritage Site.</p>" +
          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
          "(last visited June 22, 2009).</p>" +
          "</div>" +
          "</div>";

         

          const infowindow_nodo1 = new google.maps.InfoWindow({
            content:contenido_auditorio,
            maxWidth: 200,
           });

          // nodo2

           const contenido_biblioteca=
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h1 id="firstHeading" class="firstHeading">Nodo 2</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Biblioteca</b>, also referred to as <b>Ayers Rock</b>, is a large " +
          "sandstone rock formation in the southern part of the " +
          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
          "south west of the nearest large town, Alice Springs; 450&#160;km " +
          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
          "features of the Uluru - Kata Tjuta National Park. Uluru is " +
          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
          "Aboriginal people of the area. It has many springs, waterholes, " +
          "rock caves and ancient paintings. Uluru is listed as a World " +
          "Heritage Site.</p>" +
          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
          "(last visited June 22, 2009).</p>" +
          "</div>" +
          "</div>";

          const infowindow_nodo2 = new google.maps.InfoWindow({
            content:contenido_biblioteca,
            maxWidth: 200,
           });

          // NODO 3

           const contenido_cafeteria=
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h1 id="firstHeading" class="firstHeading">Nodo 3</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Cafetería 1</b>, also referred to as <b>Ayers Rock</b>, is a large " +
          "sandstone rock formation in the southern part of the " +
          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
          "south west of the nearest large town, Alice Springs; 450&#160;km " +
          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
          "features of the Uluru - Kata Tjuta National Park. Uluru is " +
          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
          "Aboriginal people of the area. It has many springs, waterholes, " +
          "rock caves and ancient paintings. Uluru is listed as a World " +
          "Heritage Site.</p>" +
          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
          "(last visited June 22, 2009).</p>" +
          "</div>" +
          "</div>";

          const infowindow_nodo3 = new google.maps.InfoWindow({
            content:contenido_cafeteria,
            maxWidth: 200,
           });

           // NODO 4
           const contenido_cafeteria2=
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h1 id="firstHeading" class="firstHeading">Nodo 4</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Cafetería 2</b>, also referred to as <b>Ayers Rock</b>, is a large " +
          "sandstone rock formation in the southern part of the " +
          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
          "south west of the nearest large town, Alice Springs; 450&#160;km " +
          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
          "features of the Uluru - Kata Tjuta National Park. Uluru is " +
          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
          "Aboriginal people of the area. It has many springs, waterholes, " +
          "rock caves and ancient paintings. Uluru is listed as a World " +
          "Heritage Site.</p>" +
          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
          "(last visited June 22, 2009).</p>" +
          "</div>" +
          "</div>";

          const infowindow_nodo4= new google.maps.InfoWindow({
            content:contenido_cafeteria2,
            maxWidth: 200,
           });
         
        // const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

        const image = "./assets/icons/40x40.png";

        // The marker, positioned at Uluru
        const markerAuditorio = new google.maps.Marker({
          position: uluru,
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