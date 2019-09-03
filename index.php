<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 40%;
        width: 100%;
      }
    </style>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <title>Potat0 Maps</title>
  </head>
  <body>
    <h2>Navigieren: </h2>
    <form action="formmailer.php" method="post" id="myForm">
      <label>Longtiude
        <input type="text" name="Coordinates" id="coords1">
      </label>
      <label>Lattiude
        <input type="text" name="Coordinates" id="coords2">
      </label>
      <label><input type="submit" value="Absenden" /><label>
    </form>
    <div id="map" class="map"></div>
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([14.2454676, 51.4390602]),
          zoom: 19
        })
      });
      document.getElementById('myForm').onsubmit = function () {
        
        let long = document.getElementById('coords1');
        let lat = document.getElementById('coords2');
          console.log("Long: " + long + " Lat: " + lat);
          map.getView().setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
          map.getView().setZoom(19);
          return true;
      }
    </script>
  </body>
</html>
