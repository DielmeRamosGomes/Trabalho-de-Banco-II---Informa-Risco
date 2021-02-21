<!DOCTYPE html>
<html>
  <head>
    <title>Mapa</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <meta charset="utf-8">

  <!-- INCLUINDO JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <!-- INCLUINDO ANIMATE CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <!-- INCLUINDO MATERIALIZE CSS-->
  <link rel="stylesheet" href="assets/css/materialize.min.css">
  <!-- INCLUINDO WOW JavaScript -->
  <script src="assets/js/wow.min.js" type="text/javascript"></script>
  <!-- INCLUINDO MATERIALIZE JavaScript -->
  <script src="assets/js/materialize.min.js"></script>
  <!--ICONES MATERIALIZE -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Meus imports -->
  <!-- INCLUINDO  CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- INCUINDO JavaScript -->
  <script type="text/javascript" src="assets/js/function.js"></script>


    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .campo{
        width: 300px;
        height: 20px;
        border: 1px solid #ddd;
        margin-top: 5px;
        box-sizing: border-box;
        padding-left: 10px;
      }

      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }

      #target {
        width: 345px;
      }

    </style>
  </head>
  <body>


    <!-- COMEÇO DO MENU -->

  <div class="navbar-fixed cover">
    <nav>
      <div class="nav-wrapper" id="menu">
        <div class="conj-texto-imagem">
          <a href="index.html" class="brand-logo">
            <b class="txt">InformaRisco</b>
          </a>
        </div>
        <a href="#" class="sidenav-trigger" data-target="mobile-nav">
                <i class="material-icons">menu</i>
            </a>
        <ul class="right hide-on-med-and-down">
          <li><a class="item-menu" href="#red-sobrenos"><b>COMO FUNCIONA</b></a></li>
          <li><a class="item-menu" href="cadastro.php"><b>ENTRE</b></a></li>
         <!-- <li><a class="item-menu" href="#red-contato"><b>CONTATO</b></a></li> -->
        </ul>
      </div>
    </nav>  
  </div>
  <!-- FIM DO MENU -->
      <div>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <input id="pac-input" class="controls" type="text" placeholder="Caixa de Pesquisa"/>
    </div>

    <div id="map"></div>
    <script>
        var customLabel = {
        crime: {
          label: 'C'
        }
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-22.118568, -51.409165),
          zoom: 16,
          streetViewControl: false
          
        });
      
      var infoWindow = new google.maps.InfoWindow;
      var geocoder = new google.maps.Geocoder();

// Change this depending on the name of your PHP or XML file
downloadUrl('resultado_mapa.php', function(data) {
  var xml = data.responseXML;
  var markers = xml.documentElement.getElementsByTagName('marker');
  Array.prototype.forEach.call(markers, function(markerElem) {
    var id = markerElem.getAttribute('id');
    var name = markerElem.getAttribute('name');
    var address = markerElem.getAttribute('address');
    var type = markerElem.getAttribute('type');
    var time1 = markerElem.getAttribute('horaOcorrencia');
    var date1 = markerElem.getAttribute('dataOcorrencia');
    var genero1 = markerElem.getAttribute('generoVitima');
    var fezbo1 = markerElem.getAttribute('fezBO');
    var nomeObjeto1 = markerElem.getAttribute('nomeObjeto');
    var point = new google.maps.LatLng(
        parseFloat(markerElem.getAttribute('lat')),
        parseFloat(markerElem.getAttribute('lng')));

    var infowincontent = document.createElement('div');
    var strong = document.createElement('strong');
    strong.textContent = name
    infowincontent.appendChild(strong);
    infowincontent.appendChild(document.createElement('br'));

    var tipo = document.createElement('tipo');
    tipo.textContent = type
    infowincontent.appendChild(tipo);
    infowincontent.appendChild(document.createElement('br'));

    var text = document.createElement('text');
    text.textContent = address
    infowincontent.appendChild(text);
    infowincontent.appendChild(document.createElement('br'));

    var hora = document.createElement('hora');
    hora.textContent = time1
    infowincontent.appendChild(hora);
    infowincontent.appendChild(document.createElement('br'));
      
    var dat = document.createElement('dat');
    dat.textContent = date1
    infowincontent.appendChild(dat);
    infowincontent.appendChild(document.createElement('br'));

    var genero = document.createElement('genero');
    genero.textContent = genero1
    infowincontent.appendChild(genero);
    infowincontent.appendChild(document.createElement('br'));

    var fezbo = document.createElement('fezbo');
    fezbo.textContent = fezbo1
    infowincontent.appendChild(fezbo);
    infowincontent.appendChild(document.createElement('br'));

    var nomeOb = document.createElement('nomeOb');
    nomeOb.textContent = nomeObjeto1
    infowincontent.appendChild(nomeOb);
    infowincontent.appendChild(document.createElement('br'));

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

// Create the search box and link it to the UI element.
const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );
      
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLQ9tQtFBR_zUM5tyBNh6JX3z-PuCVUg&callback=initMap&libraries=places&v=weekly">
    ></script>

    <!-- COMEÇO DO RODAPÉ -->
  
  <footer class="page-footer" id="red-contato">
  
    <div class="footer-copyright">
      <div class="container">
        <center>Desenvolvido por Dielme e Paulo</center>
      </div>
    </div>
  </footer>
  <!-- FIM DO RODAPÉ -->


  </body>
</html>