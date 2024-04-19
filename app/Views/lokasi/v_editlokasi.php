<div class="row">
    <div class="col-sm-8">

        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php 
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
            ?>
            <?php $errors = validation_errors() ?>
            <?php echo form_open_multipart('Lokasi/updateData/'. $lokasi['id_lokasi']) ?>
            <div class="form-group">
                <label>Nama Lokasi</label>
                <input class="from-control" name="nama_lokasi" value="<?= $lokasi['nama_lokasi'] ?>">
                <p class="text-danger"><?= isset($errors['nama_lokasi']) == isset($errors['nama_lokasi']) ? validation_show_error('nama_lokasi') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Alamat Lokasi</label>
                <input class="from-control" name="alamat_lokasi" value="<?= $lokasi['alamat_lokasi'] ?>">
                <p class="text-danger"><?= isset($errors['alamat_lokasi']) == isset($errors['alamat_lokasi']) ? validation_show_error('alamat_lokasi') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input class="from-control" name="latitude" id="Latitude" value="<?= $lokasi['latitude'] ?>">
                <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude']) ? validation_show_error('latitude') : '' ?></p>
            </div>

            <div class="form-group">
                <label for="">Longitude</label>
                <input class="from-control" name="longitude" id="Longitude" value="<?= $lokasi['longitude'] ?>">
                <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude']) ? validation_show_error('longitude') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Foto Lokasi</label>
                <input type="file" class="from-control" name="foto_lokasi" accept="image/*">
                <p class="text-danger"><?= isset($errors['foto_lokasi']) == isset($errors['foto_lokasi']) ? validation_show_error('foto_lokasi') : '' ?></p>
                <img src="<?= base_url('foto/'.$lokasi['foto_lokasi']) ?>" width="200px">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="<?= base_url('Lokasi/index') ?>" class="btn btn-success">Kembali</a>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

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
        center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>],
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

    //Get Coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var curLocation = [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>];
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
    });

    map.addLayer(marker);
</script>