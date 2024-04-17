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