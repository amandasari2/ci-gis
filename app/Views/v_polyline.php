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

    L.polyline([
        [2.9686849615595077, 99.62192342086854],
        [2.961837543586863, 99.65613423684454],
        [3.0107055501405102, 99.62524345819395],
        [2.9904554226174476, 99.62515441751644],
        [2.987155436120777, 99.6124085606852]
    ], {
        color: 'red',
        weight: 6
    }).addTo(map);
</script>