<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Map */

get_header();
?>
<div class="map-container" id="map"></div>
<div class="address">

</div>
<style>
div#marker-count > span {
    background: #b0218d;
    border-radius: 50%;
    display: flex;
    height: 50px;
    width: 50px;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    font-size:20px;
    color:#fff;
    padding:15px;
}
.leaflet-container a.btn-hover {
    color: #fff;
}
.leaflet-popup-content-wrapper {
    border-radius: 0;
    text-align: center;
}

.leaflet-popup-content {
    width: 240px !important;
    margin: 0 !important;
    padding: 15px;
}
.leaflet-popup-content p {
    margin: 0;
    margin-bottom: 15px;
}
</style>
<script>

let markerIcon =
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path fill="THEFILL" id="Color" d="M24.354,13.496l-7.108,15.116C16.837,29.473,15.937,30,15,30s-1.836-0.527-2.227-1.388L5.645,13.496C5.137,12.421,5,11.191,5,10C5,4.473,9.473,0,15,0c5.526,0,10,4.473,10,10C25,11.191,24.863,12.421,24.354,13.496z"/><circle fill="white" cx="15" cy="10" r="5"><animate attributeName="opacity" values="1; 0.2; 1" dur="3s" repeatCount="indefinite" /></circle></svg>';

let markerAdata =
    "data:image/svg+xml;utf-8," + markerIcon.replace("THEFILL", "%23ee0000");
let markerBdata =
    "data:image/svg+xml;utf-8," + markerIcon.replace("THEFILL", "%2300ee00");

let markerIconA = L.icon({
  iconUrl: '<?php echo IMG.'marker.png'; ?>',
  iconSize: [32, 49],
  iconAnchor: [15, 30],
  popupAnchor: [0, -28]
});

let markerIconB = L.icon({
  iconUrl: markerBdata,
  iconSize: [50, 50],
  iconAnchor: [15, 30],
  popupAnchor: [0, -28]
});

let counterA = 
            [
                <?php 
                $records = array('post_type'=>'alumni_record','post_status' =>array( 'publish', 'draft'));
                $query = new WP_Query($records);
                if($query->have_posts()):
                while($query->have_posts()) : $query->the_post();
                $latitude = get_field('latitude');
                $longitude = get_field('longitude');
                echo '{"lat":'.$latitude.',"lon":'.$longitude.',},';
                endwhile;
                wp_reset_postdata();
                endif;
                ?>
            ];

let counterB = [];
var myMap;
myMap = L.map("map", {attributionControl: false});
//L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(myMap);
 if("") {
    var myStyle = {
    "fillColor": "#fafafa",
    "fillOpacity": 1,
    "opacity" : 0

    };
    var waterStyle = {
        "fillColor": "#d9d9d9",
        "fillOpacity": 1,
        "opacity" : 0
    };
    var geojsonFeature = "";
    for(var i=0; i<geojsonFeature.length; i++) {
        L.geoJSON(geojsonFeature[i], {style: (geojsonFeature[i].type === 'land' ? myStyle : waterStyle)}).addTo(myMap);
    }

}

L.tileLayer.provider('Stamen.TonerLite').addTo(myMap);

var markersA = L.markerClusterGroup({
  polygonOptions: { stroke:false, fill: false, fillColor: "var(--marker-a-color)", fillOpacity: 0.45 ,},
  iconCreateFunction: function(cluster) {
    return new L.DivIcon({
      html: "<div id='marker-count'><span>" + cluster.getChildCount() + "</span></div>",
      className: "customMarkerCluster countA",
      iconSize: new L.Point(40, 40)
    });
  }
});

var markersB = L.markerClusterGroup({
    polygonOptions: { stroke:false, fill: false, fillColor: "var(--marker-b-color)", fillOpacity: 0.45 },
  iconCreateFunction: function(cluster) {
    return new L.DivIcon({
      html: "<div id='marker-count'><span>" + cluster.getChildCount() + "</span></div>",
      className: "customMarkerCluster countB",
      iconSize: new L.Point(40, 40)
    });
  }
});

counterA.forEach( a => {
    var marker = L.marker(new L.LatLng(a.lat, a.lon), { title: "", icon: markerIconA });
    marker.bindPopup('<p class="verification_needed_heading">You need to be logged in to see the results </p><p><a href="/login" class="btn-hover color-2">Sign In / Sign Up </a></p><p>Why do I need to login?</p><p>This platform is for alumni, students and faculty of Dar. By logging in, you will help us authenticate your identity to use this platform. </p>');
    markersA.addLayer(marker);    
  });

counterB.forEach( b => {
    var marker = L.marker(new L.LatLng(b.lat, b.lon), { title: new Date(b.time).toString(), icon: markerIconB });
    marker.bindPopup(new Date(b.time).toString());
    markersB.addLayer(marker);    
  });


myMap.addLayer(markersA);
myMap.addLayer(markersB);

var overlayMaps = {
    "<span style='color: var(--marker-a-color)'>Red lights</span>": markersA,
  "<span style='color: var(--marker-b-color)'>Green lights</span>": markersB
};

var myStyle = {
"fillColor": "#fafafa",
"fillOpacity": 1,
"opacity" : 0

};
var waterStyle = {
    "fillColor": "#d9d9d9",
    "fillOpacity": 1,
    "opacity" : 0
};
var geojsonFeature = "";
for(var i=0; i<geojsonFeature.length; i++) {
    L.geoJSON(geojsonFeature[i], {style: (geojsonFeature[i].type === 'land' ? myStyle : waterStyle)}).addTo(myMap);
}

L.control.layers(null, overlayMaps, {collapsed:false}).addTo(myMap);

zoomToFit( myMap, counterA, counterB, 12)

// Custom control


L.Control.MyControl = L.Control.extend({
  onAdd: function(map) {
    var el = L.DomUtil.create('button', 'leaflet-bar custom-button');
    el.title="Fit All";
    el.innerHTML = '⛶';
    L.DomEvent.on(el, 'click', ()=>{zoomToFit( myMap, counterA, counterB, 30) })
    return el;
  },

  onRemove: function(map) {
    L.DomEvent.off('click');
  }
});

L.control.myControl = function(opts) {
  return new L.Control.MyControl(opts);
}

L.control.myControl({
  position: 'topleft',
}).addTo(myMap);


function zoomToFit(map, a, b, padding){
  let arr=a.concat(b);
  let area = L.latLngBounds(arr);
  map.fitBounds(area, { padding: [padding, padding] });
}

</script>
<?php get_footer(); ?>