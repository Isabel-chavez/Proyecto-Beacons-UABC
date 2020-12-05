<! DOCTYPE html> <head> <meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no" /> <meta http-equiv = "content-type" content = "text / html; charset = UTF-8 " /> <title> Usando MySQL y PHP con Google Maps </title> <style> / * Siempre establezca la altura del mapa explícitamente para definir el tamaño del        elemento div * que contiene el mapa. * / # mapa { altura : 100% ; } / * Opcional: Hace que la página de muestra llene la ventana.
  
       
      
    
    
      

      
         
      
      
, cuerpo { altura : 100% ; margen : 0 ; acolchado : 0 ; } </style> </head> <html> <body> <div id = "map" > </div> <script> var customLabel = {         restaurant : {           label : 'R' },         bar : {           label : ' B ' } };
         
         
         
      
    
  


  
     

    
       
 
 
        
 
 
        
      

         
        mapa = nuevo google . mapas . Map ( document . GetElementById ( 'map' ), {           center : new google . Maps . LatLng (- 33.863276 , 151.207977 ),           zoom : 12 }); var infoWindow = nuevo google . mapas . InfoWindow ; 
        // Cambie esto dependiendo del nombre de su archivo PHP o XML          
         downloadUrl  ('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWQpkrVcmS74k-Ow6UnQzAiMn4FLQjZV4&callback=initMap">
    </script>
  </body>
</html>