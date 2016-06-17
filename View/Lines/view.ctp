<div id="LinesAdminView">
    <div class="col-md-2">Title</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['title'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Created</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['created'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Modified</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['modified'];
        ?>&nbsp;
    </div>
    <div id="map" style="width: 100%; height: 600px;"></div>
</div>
<script>
    var nlscmaps = [
        new L.NLSC.PHOTO2(),
        new L.NLSC.B5000(),
        new L.NLSC.MB5000(),
        new L.NLSC.LANDSECT(),
        new L.NLSC.Village(),
        new L.NLSC.LUIMAP(),
    ];
    var overlayMaps = {};
    for (var i in nlscmaps) {
        overlayMaps[nlscmaps[i].name] = nlscmaps[i];
    }
    var baseMaps = {
        '通用版電子地圖': new L.NLSC.EMAP()
    };
    // set up the map
    var map = new L.Map('map', {
        center: new L.LatLng(23.1508773, 120.2054415),
        zoom: 15,
        layers: [baseMaps['通用版電子地圖']]
    })
            .addControl(new L.Control.Scale())
            .addControl(new L.Control.Layers(baseMaps, overlayMaps));


    // Initialise the FeatureGroup to store editable layers
    var viewableLayers = new L.FeatureGroup();
    map.addLayer(viewableLayers);

    L.geoJson(JSON.parse('<?php echo $this->data['Line']['json']; ?>'), {
        onEachFeature: function (feature, layer) {
            viewableLayers.addLayer(layer);
        }
    });
    setTimeout(function () {
        map.fitBounds(viewableLayers.getBounds());
    }, 500);
</script>