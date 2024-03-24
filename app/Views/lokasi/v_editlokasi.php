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

            <a href="<?= base_url('Lokasi/index') ?>" class="btn btn-danger">Edit</a>
            <a href="" class="btn btn-success">Kembali</a>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

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
        center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>],
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