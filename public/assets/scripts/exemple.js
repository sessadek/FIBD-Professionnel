function InitialiserCarte() {

    var map = L.map('mapleaf').setView([45.655002, 0.148877], 17);

    // create the tile layer with correct attribution
    var tuileUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

    var attrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';

    var osm = L.tileLayer(tuileUrl, {
        minZoom: 8,
        maxZoom: 17,
        attribution: attrib
    });

    osm.addTo(map);

    var marker = L.marker([45.655002, 0.148877]).addTo(map);
}

$(document).ready(function(){
    InitialiserCarte();
});
