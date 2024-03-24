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


    // Marker nambahkan gambar, nama, alamat
    L.marker([2.983948232898107, 99.63157938147909])
        .bindPopup("<img src='<?= base_url('gambar/ponsel.jpg') ?>''widht='90%'> <br>" +
            "<b>Ponsel</b> <br>" +
            "Alamat : Pangkal Titi <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);
    L.marker([2.9782454290869524, 99.63702106734398])
        .bindPopup("<img src='<?= base_url('gambar/pos.jpg') ?>''widht='90%'> <br>" +
            "<b>Pos Indonesia</b> <br>" +
            "Alamat : Parasamya <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);
    L.marker([2.973760317935702, 99.62846357154478])
        .bindPopup("<img src='<?= base_url('gambar/rumah.jpg') ?>''widht='90%'> <br>" +
            "<b> Rumah Imam Bonjol</b> <br>" +
            "Alamat : Imam Bonjol <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);
    L.marker([2.98018493095606, 99.62618764181096])
        .bindPopup("<img src='<?= base_url('gambar/sekolah.jpg') ?>''widht='90%'> <br>" +
            "<b>Sekolah Dasar</b> <br>" +
            "Alamat : Diponegoro <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);
    L.marker([2.9743058053076474, 99.64248329890302])
        .bindPopup("<img src='<?= base_url('gambar/warung.jpg') ?>''widht='90%'> <br>" +
            "<b>Warung</b> <br>" +
            "Alamat : Kota Kisaran <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);

    //custom marker
    const marker1 = L.icon({
        iconUrl: '<?= base_url('marker/bulat.png') ?>',
        iconSize: [35, 45], // size of the icon
        
    });
    L.marker([2.9826196602093553, 99.62827490015674], {
        icon: marker1
    }).addTo(map);
    
    const marker2 = L.icon({
        iconUrl: '<?= base_url('marker/2.png') ?>',
        iconSize: [35, 45], // size of the icon
        
    });
    L.marker([2.9862839454912273, 99.62735222028917], {
        icon: marker2
        
    })
    .bindPopup("<img src='<?= base_url('gambar/pos.jpg') ?>''widht='90%'> <br>" +
            "<b>Pos Indonesia</b> <br>" +
            "Alamat : Parasamya <br>" +
            "Kec : Kisaran Barat")
        .addTo(map);

    const marker3 = L.icon({
        iconUrl: '<?= base_url('marker/3.png') ?>',
        iconSize: [35, 45], // size of the icon
        
    });
    L.marker([2.9856946607033175, 99.62347911045391], {
        icon: marker3
    }).addTo(map);
</script>