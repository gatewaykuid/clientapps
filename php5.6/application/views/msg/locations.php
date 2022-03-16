<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <span>Lng</span><br>
    <input type="" id="lng" name=""><br>
    <span>Lat</span><br>
    <input type="" id="lat" name=""><br>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCSI0E6zK_fZODC_hSZbuoEM7WdfEwpXYo&libraries=places"></script>
    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(-7.803164, 110.3398252),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                var lng = e.latLng.lng();
                var lat = e.latLng.lat();
                document.getElementById("lng").value = lng;
                document.getElementById("lat").value = lat;
            });
        }
    </script>
    <div id="dvMap" style="width: 500px; height: 500px">
    </div>
</body>
</html>