
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



















