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

    L.polygon([
        [2.9813001241887833, 99.64126373509892],
        [2.9798885049327954, 99.64119747581215],
        [2.9794363452569983, 99.6499437016649],
        [2.9811677849604643, 99.64960136201663],
        [2.9813221807252908, 99.64136312402906],
    ], {
        color: 'green',
        fillOpacity: 1
    }).addTo(map);

    L.polygon([
        [2.978829789268149, 99.63892257360243],
        [2.976806095621974, 99.6389336168169],
        [2.9767840389949862, 99.64099869792102],
        [2.978680907301048, 99.64113121649454],
        [2.9787911902416044, 99.63898883288918],
    ], {
        color: 'red',
        fillOpacity: 0.6
    }).addTo(map);
</script>