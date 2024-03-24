<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="">Posisi</label>
            <input class="from-control" name="posisi" id="Posisi">
        </div>
    </div>
</div>
<br>

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

    const baseLayers = {
        'OpenStreetMap': osm,
        'OpenStreetMap.HOT': osmHOT
    };

    //Geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert('Geolocation Tidak Support Pada Browser Yang Anda Gunakan!')
    }

    function showPosition(position) {
        document.getElementById("Posisi").value = position.coords.latitude + "," + position.coords.longitude;

        //Menampilkan Posisi Pada Map
        const map = L.map('map', {
            center: [position.coords.latitude, position.coords.longitude],
            zoom: 15,
            layers: [osm]
        });

        const layerControl = L.control.layers(baseLayers).addTo(map);

        const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });
        layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');

        //Marker Posisi user/perangkat
        L.Marker([position.coords.latitude, position.coords.longitude]).addTo(map)
        .bindPopup('Posisi Anda!')
        .openPopup();
    }
</script>