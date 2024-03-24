<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Jarak (*Meter)</label>
            <input class="from-control" name="jarak" id="Jarak">
        </div>
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
        zoom: 15,
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

    //Geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            //Rute
            var routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude), //Lokasi user
                    L.latLng(3.01473713487083, 99.61494410382551) //Lokasi Tujuan
                ]
            }).addTo(map);
            //Mengambil Jarak
            routingControl.on('routesfound', function(e) {
                var routes = e.routes;
                var summary = routes[0].summary;
                var totalDistance = summary.totalDistance;
                //Kirim Nilai Jaraknya ke Elemen Input
                document.getElementById('Jarak').value = totalDistance;
                animasiCar(routes[0]);
            });
            //Membuat Animasi Perjalanan
            function animasiCar(route) {
                var iconMobil = L.icon({
                    iconUrl: '<?= base_url('marker/mobil.png') ?>',
                    iconSize: [30, 40], // size of the icon
                });

                var mobil = L.marker([route.coordinates[0].lat, route.coordinates[0].lng], {
                    icon: iconMobil
                }).addTo(map);

                var index = 0;
                var maxIndex = route.coordinates.length - 1;

                function animate() {
                    mobil.setLatLng([route.coordinates[index].lat, route.coordinates[index].lng]);
                    index++;
                    if (index > maxIndex) {
                        index = 0;
                    }
                    setTimeout(animate, 200);
                }
                animate();
            }
        });
    } else {
        alert('Geolocation Tidak Support Pada Browser Yang Anda Gunakan!')
    }
</script>