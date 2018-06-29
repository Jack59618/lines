<?php
if (!isset($url)) {
    $url = array();
}
?>
<?php echo $this->Form->create("",['type'=>'get']) //input for search
?> 
 <?php
 echo '<br><b><font size="5">DateBegin </font></b>';
 echo $this->Form->date('DateBegin');

 echo '<br><br><b><font size="5">DateEnd </font></b>&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo $this->Form->date('DateEnd');

 echo $this->form->submit('Search');?>
<?php echo $this->form->end();?>


<!--Output search results -->
<table class="table table-bordered" id="LinesSearchTable"> <!--Output text information of lines -->
    <thead>
    <tr>
    <th><?php echo $this->Paginator->sort('Line.title', 'Title', array('url' => $url)); ?></th>
    <th><?php echo $this->Paginator->sort('Line.date_begin', 'Date Begin', array('url' => $url)); ?></th>
    <th><?php echo $this->Paginator->sort('Line.date_end', 'Date End', array('url' => $url)); ?></th>
   </tr>
<tbody>
<?php foreach ($lines as $line): ?>
<tr>
	<td><?php echo $line['Line']['title'];?></td>
        <td><?php echo $line['Line']['date_begin'];?></td>
        <td><?php echo $line['Line']['date_end'];?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<div id="LinesAdminSearch">



    <div class="col-md-9">&nbsp;<?php
        echo $this->Form->hidden('Line.json');
        ?>&nbsp;
    </div>
    <div id="map" style="width: 100%; height: 600px;"></div>
</div>


<script>	//Output graph information of lines		
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
    
    <?php foreach ($lines as $line): ?>
    var color = 'hsl(' + Math.round(Math.random() * 359) + ',100%,20%)';//different color for different lines
    var myStyle = {
    	"color": color,
    	"weight": 5,
    	"opacity": 0.65
    };
    L.geoJson(JSON.parse('<?php echo $line['Line']['json']; ?>'), {
	style: myStyle,
        onEachFeature: function (feature, layer) {
            viewableLayers.addLayer(layer);
        }
    });
    <?php endforeach;?>
    setTimeout(function () {
        map.fitBounds(viewableLayers.getBounds());
    }, 500);
</script>
