$(function () {
    L.geoJson(JSON.parse($('#LineJson').val()), {
        onEachFeature: function (feature, layer) {
            layer.on('click', popEdit);
            editableLayers.addLayer(layer);
        }
    });
    setTimeout(function () {
        map.fitBounds(editableLayers.getBounds());
    }, 500);
})