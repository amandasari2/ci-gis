<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="from-control" name="latitude" id="Latitude">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="">Longitude</label>
            <input class="from-control" name="longitude" id="Longitude">
        </div>
    </div>

    <div class="col-sm-6">
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
    var circle = L.circle([2.9834339468949618, 99.62789939084688], {
            radius: 500,
            color: 'green',
            fillcalor: 'green',
            fillOpacity: 0.5
        })
        .addTo(map);

    var marker = L.marker([2.9834339468949618, 99.62789939084688], {
        draggable: true,
    });

    //Mengambil Coordinat saat Marker Di Pindah/Geser
    marker.on('dragend', function(event) {
        var latlng = event.target.getLatLng();
        var distance = latlng.distanceTo(circle.getLatLng());
        if (distance <= circle.getRadius()) {
            //Jika Coordinat Di Dalam Radius Lingkaran
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ', ' + latlng.lng;
        } else {
            //Jika Coordinat Di Laur Radius Lingkaran
            alert('Maaf, Titik Coordinat Yang Di Ambil Berada Di Luar Jangkauan!');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }



    });

    //Mengambil Coordinat Saat Map Di Click
    map.on('click', function(event) {
        var latlng = event.latlng;
        var distance = latlng.distanceTo(circle.getLatLng());

        if (distance <= circle.getRadius()) {
            //Jika Coordinat Di Dalam Radius Lingkaran
            if (!marker) {
                marker = L.marker(event.latlng).addTo(map);
            } else {
                marker.setLatLng(event.latlng);
            }
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ', ' + latlng.lng;
        } else {
            //Jika Coordinat Di Laur Radius Lingkaran
            alert('Maaf, Titik Coordinat Yang Di Ambil Berada Di Luar Jangkauan!');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }
    });

    map.addLayer(marker);
</script>