var mymap = L.map('mapid').setView([35.886,14.403], 15.93);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}',
{
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1,
  accessToken:'pk.eyJ1IjoiY3Jpc3RpbmFjMDIiLCJhIjoiY2tvOGQ1cDhlMmx3MTJwcGdnZWl0bTI1bCJ9.DKjVK8c1xJGFOxzCDqqSbA'
}).addTo(mymap);

var marker = L.marker([35.8868104667887, 14.402148517294169]).addTo(mymap);

function onMapClick(e) {
  marker.bindPopup("<b>La Nourriture de Fantaisie</b>").openPopup();
}

mymap.on('click', onMapClick);
