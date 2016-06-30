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

var map, editableLayers, drawControl;

$(function () {
    map = new L.Map('map', {
        center: new L.LatLng(23.1508773, 120.2054415),
        zoom: 15,
        layers: [baseMaps['通用版電子地圖']]
    })
            .addControl(new L.Control.Scale())
            .addControl(new L.Control.Layers(baseMaps, overlayMaps));

    editableLayers = new L.FeatureGroup();
    map.addLayer(editableLayers);

    drawControl = new L.Control.Draw({
        draw: {
            polyline: {
                shapeOptions: {
                    color: '#f30000',
                    weight: 10
                }
            },
            circle: false,
            rectangle: false
        },
        edit: {
            featureGroup: editableLayers
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function (e) {
        e.layer.on('click', popEdit);
        editableLayers.addLayer(e.layer);
        saveResult();
    });

    map.on('draw:edited', function (e) {
        saveResult();
    });

    map.on('draw:deleted', function (e) {
        $('#LineJson').val('');
    });

})


function popEdit() {
    if (!this.feature) {
        this.feature = {
            type: 'Feature',
            properties: {
                name: ''
            }
        };
    }
    var objName = this.feature.properties['name'];
    if (typeof objName === 'undefined') {
        objName = this.feature.properties['name'] = '';
    }
    this.bindPopup('<input type="text" value="' + objName + '" onchange="updateName(this, ' + this._leaflet_id + ');">');
}

function updateName(obj, targetId) {
    var inputName = $(obj).val();
    editableLayers.eachLayer(function (layer) {
        if (layer._leaflet_id === targetId) {
            layer.feature.properties['name'] = inputName;
        }
    });
    saveResult();
}

function saveResult() {
    $('#LineJson').val(JSON.stringify(editableLayers.toGeoJSON()));
}