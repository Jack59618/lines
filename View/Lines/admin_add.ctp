<div id="LinesAdminAdd">
    <?php echo $this->Form->create('Line', array('type' => 'file')); ?>
    <div class="Lines form">
        <?php
        echo $this->Form->input('Line.title', array(
            'label' => 'Title',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->hidden('Line.json');
        ?>
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
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
    var editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);

    // Initialise the draw control and pass it the FeatureGroup of editable layers
    var drawControl = new L.Control.Draw({
        draw: {
            polyline: {
                shapeOptions: {
                    color: '#f30000',
                    weight: 10
                }
            },
            polygon: false,
            circle: false,
            rectangle: false,
            marker: false
        },
        edit: {
            featureGroup: editableLayers
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function (e) {
        editableLayers.addLayer(e.layer);
        $('#LineJson').val(JSON.stringify(editableLayers.toGeoJSON()));
    });

    map.on('draw:edited', function (e) {
        $('#LineJson').val(JSON.stringify(editableLayers.toGeoJSON()));
    });
    
    map.on('draw:deleted', function (e) {
        $('#LineJson').val('');
    });
</script>