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
      var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        attribution: '© Google Maps',
        maxZoom: 20,
    });

    var peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        maxZoom: 18,
        id: 'mapbox/outdoors-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q'
    });

    var peta5 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta6 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });

    var peta7 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://carto.com/attributions">CARTO</a>'
    });

    var peta8 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Map data &copy; <a href="https://www.arcgis.com/">ArcGIS</a>'
    });

    var peta9 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
    });

    var peta10 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
    });

    const map = L.map('map', {
        center: [2.9834339468949618, 99.62789939084688],
        zoom: 13,
        layers: [peta4]
    });

    const baseLayers = {
        'Default': peta4,
        'Gmaps': peta2,
        'Satellite': peta3,
        'OSM-Mapbox': peta1,
        'OSM': peta5,
        'Dark OSM': peta6,
        'Carto OSM': peta7,
        'ArcGis': peta8,
        'Gmaps Marker': peta9,
        'Light Marker': peta10
    };
    const layerControl = L.control.layers(baseLayers).addTo(map);
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