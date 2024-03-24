<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="from-control" name="latitude" id="Latitude">
        </div>
    </div>
    <br>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="">Longitude</label>
            <input class="from-control" name="longitude" id="Longitude">
        </div>
    </div>
    <br>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="">Posisi</label>
            <input class="from-control" name="posisi" id="Posisi">
        </div>
    </div>

    <div class="col-sm-12">
        <br>
        <div id="map" style="width:100%; height: 100vh"></div>
    </div>
</div>

<div id="map" style="width: 100%; height: 100vh;"></div>
<script>
	const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

	const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
	});

	const map = L.map('map', {
		center: [2.981012513706258, 99.62582872556622],
		zoom: 10,
		layers: [osm]
	});

	const baseLayers = {
		'OpenStreetMap': osm,
		'OpenStreetMap.HOT': osmHOT
	};


	const layerControl = L.control.layers(baseLayers).addTo(map);

	const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	});
	layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');

    //Get Coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");
    var curLocation = [2.9834339468949618, 99.62789939084688];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    //Mengambil Coordinat saat Marker Di Pindah/Geser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation,
        }).bindPopup(position).update();
        $("#Latitudu").val(position.lat);
        $("#Longitude").val(position.lng);
        $("#Posisi").val(position.lat + ', ' + position.lng);
    });

    //Mengambil Coordinat Saat Map Di Click
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        }

        else{
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
        posisi.value = lat + ', ' + lng;
    });

    map.addLayer(marker);
</script>