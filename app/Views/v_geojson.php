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

    
    //geoJSON
    $.getJSON("<?= base_url('provinsi/11.geojson') ?>", function(data){
        L.geoJSON(data,{
            style : function(feature) {
                return{
                    color: 'red',
                    fillOpacity: 1.0
                }
            }
        })
        .bindPopup("<img src='<?= base_url('gambar/aceh.jpg') ?>''widht='90%'> <br>" +
            "<b>Provinsi Aceh</b> <br>" +
            "Penduduk : 10.000.000 <br>" +
            "Luas : 58.377 KM")
        .addTo(map);
    });

    $.getJSON("<?= base_url('provinsi/12.geojson') ?>", function(data){
        L.geoJSON(data,{
            style : function(feature) {
                return{
                    color: 'green',
                    fillOpacity: 1.0
                }
            }
        }).addTo(map)
    });

    $.getJSON("<?= base_url('provinsi/13.geojson') ?>", function(data){
        L.geoJSON(data,{
            style : function(feature) {
                return{
                    color: 'blue',
                    fillOpacity: 1.0
                }
            }
        }).addTo(map)
    });
    $.getJSON("<?= base_url('provinsi/14.geojson') ?>", function(data){
        L.geoJSON(data,{
            style : function(feature) {
                return{
                    color: 'yellow',
                    fillOpacity: 1.0
                }
            }
        }).addTo(map)
    });
</script>