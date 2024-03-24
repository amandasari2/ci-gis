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
		center: [2.9895338766331863, 99.61138761466728],
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

	const gedung = L.icon({
        iconUrl: '<?= base_url('marker/4.png') ?>',
        iconSize: [35, 45], // size of the icon
        
    });
	//Pemetaan Lokasi
	<?php foreach ($lokasi as $key => $value) { ?>
		L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>],{icon : gedung})
			.bindPopup('<img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" width="150px"><br>' +
				'<b><?= $value['nama_lokasi'] ?></b><br>' +
				'Alamat : <?= $value['alamat_lokasi'] ?><br>')
			.addTo(map);
	<?php } ?>
</script>