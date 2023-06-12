var setIntervalAsync = SetIntervalAsync.dynamic.setIntervalAsync;

async function getBoats(){
    const response = await fetch(
        '/get/boats',
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['data'];
}

async function getLogs(){
    const response = await fetch(
        '/get/logs',
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['logs'];
}

var map = L.map('map', {
    center: [13.452718551354815,121.8406105041504],
    zoom: 12
});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var legend = L.control({ position: "topright" });
legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.classList.add('flex', 'flex-col', 'p-2', 'w-40', 'bg-white');
    div.innerHTML = `
        <p class="font-sans font-medium text-gray-700 text-sm text-center mb-3">Legend</p>
        <div class="flex flex-row space-x-2">
            <i class="w-4 h-4 bg-green-500"></i>
            <span class="font-sans font-normal text-gray-700 text-sm">Safe Zone</span>
        </div>
        <div class="flex flex-row space-x-2">
            <i class="w-4 h-4 bg-yellow-500"></i>
            <span class="font-sans font-normal text-gray-700 text-sm">Warning Zone</span>
        </div>
        <div class="flex flex-row space-x-2">
            <i class="w-4 h-4 bg-red-500"></i>
            <span class="font-sans font-normal text-gray-700 text-sm">Restricted Zone</span>
        </div>
        <div class="flex flex-row space-x-2 ml-1">
            <img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png" class="w-2.5 h-4">
            <span class="font-sans font-normal text-gray-700 text-sm translate-x-0.5">Boat w/ Tracker</span>
        </div>
        <div class="flex flex-row space-x-2 ml-1">
            <img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-grey.png" class="w-2.5 h-4">
            <span class="font-sans font-normal text-gray-700 text-sm translate-x-0.5">Boat w/o Tracker</span>
        </div>
    `;
    return div;
};
legend.addTo(map);

var trueRestrictedZoneLatlngs = [
    [13.26305556,121.86722222],
    [13.26000000,121.87472222],
    [13.25416667,121.87805556],
    [13.24722222,121.86277778],
    [13.23944444,121.87472222],
    [13.23527778,121.86444444],
    [13.21222222,121.81361111],
    [13.22777778,121.79527778],
    [13.23694444,121.80000000],
    [13.26305556,121.86722222]
];

var trueWarningZoneLatlngs = [
    [13.265300, 121.867265],
    [13.262038, 121.877111],
    [13.254787, 121.879781],
    [13.247209, 121.862817],
    [13.238013, 121.877454],
    [13.233541, 121.866061],
    [13.209014, 121.813251],
    [13.228084, 121.791167],
    [13.238853, 121.797048],
    [13.265300, 121.867265]
];

var safeZoneLatlngs = [
    [13.272996,121.904990],
    [13.274902,121.889975],
    [13.274651,121.887742],
    [13.277241,121.881473],
    [13.280690,121.877521],
    [13.285797,121.865202],
    [13.296155,121.858674],
    [13.319041,121.847165],
    [13.333072,121.838404],
    [13.342593,121.821399],
    [13.348272,121.818822],
    [13.351445,121.819337],
    [13.366143,121.822601],
    [13.375662,121.823288],
    [13.37335681995441,121.76427751779559], //Boundary to Warning
    [13.13423696608018,121.87067538499835], // End
    [13.210341,121.905062],
    [13.244097,121.896473],
    [13.259135,121.896816],
    [13.272996,121.904990]
];

var warningZoneLatlngs = [
    [13.37335681995441,121.76427751779559],
    [13.375705337808071,121.73946708440782], // Boundary to Restricted
    [13.171408506275938,121.7829751968384],
    [13.130605137771843,121.85990631580354], // End
    [13.13423696608018,121.87067538499835],
];

var restrictedZoneLatlngs = [
    [13.129918,121.861199],
    [13.171373,121.782869],
    [13.375205,121.739581],
    [13.382413,121.678100],
    [13.358697,121.678794],
    [13.245768,121.664376],
    [13.205469,121.665495],
    [13.145966,121.692292],
    [13.115875,121.719089],
    [13.094474,121.758254],
    [13.129918,121.861199]
];

var safeBoundaryLatlngs = [
    [13.272996,121.904990],
    [13.274902,121.889975],
    [13.274651,121.887742],
    [13.277241,121.881473],
    [13.280690,121.877521],
    [13.285797,121.865202],
    [13.296155,121.858674],
    [13.319041,121.847165],
    [13.333072,121.838404],
    [13.342593,121.821399],
    [13.348272,121.818822],
    [13.351445,121.819337],
    [13.366143,121.822601],
    [13.375662,121.823288],  
];

var warningBoundaryLatlngs1 = [
    [13.371444,121.764972],
    [13.24757545088348,121.82017207145692]
];

var warningBoundaryLatlngs2 = [
    [13.21827704623894,121.83321297168733],
    [13.135375,121.870143]
];

var restrictedBoundaryLatlngs = [
    [13.129918,121.861199],
    [13.171373,121.782869],
    [13.375205,121.739581],    
];

var mscSafeBoundaryLatlngs = [
    [13.4556508614325,121.8441268801689],
    [13.454111792370277,121.8431666493416]  
];

var mscWarningBoundaryLatlngs = [
    [13.455473477705906,121.8445774912835],
    [13.453908321482844,121.843381226063], 
];

var mscRestrictedBoundaryLatlngs = [
    [13.45537149830728,121.8447518348694],
    [13.453814167227632,121.84350192546846]
];

var mscSafeZoneLatlngs = [
    [13.4556508614325,121.8441268801689],
    [13.454111792370277,121.8431666493416],
    [13.453908321482844,121.843381226063],
    [13.455473477705906,121.8445774912835]
];

var mscWarningZoneLatlngs = [
    [13.455473477705906,121.8445774912835],
    [13.453908321482844,121.843381226063],
    [13.453814167227632,121.84350192546846],
    [13.45537149830728,121.8447518348694]
];

var mscRestrictedZoneLatlngs = [
    [13.45537149830728,121.8447518348694],
    [13.453814167227632,121.84350192546846],
    [13.452635320212039,121.8451943993568],
    [13.454304828693445,121.8462941050531]
];

var trueWarningZone = L.polygon(trueWarningZoneLatlngs, {color: 'yellow'}).bindPopup('<b>Warning Zone</b><br>Marine Life Sanctuary').addTo(map);
var trueRestrictedZone = L.polygon(trueRestrictedZoneLatlngs, {color: 'red'}).bindPopup('<b>Restricted Area</b><br>Marine Life Sanctuary').addTo(map);

var safeZone = L.polygon(safeZoneLatlngs, {color: 'green', weight: 0, fillOpacity: 0}).bindPopup('<b>Safe Zone</b><br>Gasan\'s Water').addTo(map);
var warningZone = L.polygon(warningZoneLatlngs, {color: 'yellow', weight: 0, fillOpacity: 0}).bindPopup('<b>Warning Zone</b><br>Marine Life Sanctuary').addTo(map);
var restrictedZone = L.polygon(restrictedZoneLatlngs, {color: 'red', weight: 0, fillOpacity: 0}).bindPopup('<b>Restricted Area</b><br>Marine Life Sanctuary').addTo(map);

var safeBoundary = L.polyline(safeBoundaryLatlngs, {color: 'green'}).addTo(map);
var warningBoundary1 = L.polyline(warningBoundaryLatlngs1, {color: 'yellow'}).addTo(map);
var warningBoundary2 = L.polyline(warningBoundaryLatlngs2, {color: 'yellow'}).addTo(map);
var restrictedBoundary = L.polyline(restrictedBoundaryLatlngs, {color: 'red'}).addTo(map);

var mscSafeZone = L.polygon(mscSafeZoneLatlngs, {color: 'green', weight: 0, fillOpacity: 0}).bindPopup('<b>Safe Zone</b><br>Marine Life Sanctuary').addTo(map);
var mscWarningZone = L.polygon(mscWarningZoneLatlngs, {color: 'yellow', weight: 0, fillOpacity: 0}).bindPopup('<b>Warning Zone</b><br>Marine Life Sanctuary').addTo(map);
var mscRestrictedZone = L.polygon(mscRestrictedZoneLatlngs, {color: 'red', weight: 0, fillOpacity: 0}).bindPopup('<b>Restricted Area</b><br>Marine Life Sanctuary').addTo(map);

var mscSafeBoundary = L.polyline(mscSafeBoundaryLatlngs, {color: 'green'}).addTo(map);
var mscWarningBoundary = L.polyline(mscWarningBoundaryLatlngs, {color: 'yellow'}).addTo(map);
var mscRestrictedBoundary = L.polyline(mscRestrictedBoundaryLatlngs, {color: 'red'}).addTo(map);

var greyIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-grey.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

var redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

var markers = [];

getBoats().then(boats => {
    for(let boat in boats){
        console.log(boats[boat]);
        if(boats[boat]['latitude'] != null && boats[boat]['longitude']){
            let latlng = L.latLng(boats[boat]['latitude'], boats[boat]['longitude']);
            let marker = L.marker(latlng)
                .bindPopup(`
                    <img src=images/boat.jfif class="w-full"> 
                    <br>Boat ID: ${boats[boat]['id']}
                    <br>Name: ${boats[boat]['name']}
                    <br>License: ${boats[boat]['license']}
                    <br>Type: ${boats[boat]['type']}
                    <br>Color: ${boats[boat]['color']}
                    <br>Owner: ${boats[boat]['owner']['name']}
                    <br>Contact No: ${boats[boat]['owner']['contact']}
                    <br>Address: ${boats[boat]['owner']['barangay']}
                    <br>Tracker Serial: ${boats[boat]['tracker'] != null ? boats[boat]['tracker']['serial'] : 'None'}`)
                .bindTooltip(boats[boat]['name'], {direction: 'right'})
            if(boats[boat]['tracker'] != null){
                marker.setIcon(redIcon).addTo(map)
            }
            else{
                marker.setIcon(greyIcon).addTo(map)
            }
            markers[boat] = marker;
        }   
    }
});

function updateMarkers(){
    getBoats().then(boats => {
        console.log(boats);
        for(let boat in boats){
            if(boat in markers){
                let latlng = L.latLng(boats[boat]['latitude'], boats[boat]['longitude']);
                markers[boat].setLatLng(latlng);
                if(boats[boat]['tracker'] != null){
                    markers[boat].setIcon(redIcon);
                }
                else{
                    markers[boat].setIcon(greyIcon);
                }
            }
            else{
                if(boats[boat]['latitude'] != null && boats[boat]['longitude']){
                    let latlng = L.latLng(boats[boat]['latitude'], boats[boat]['longitude']);
                    let marker = L.marker(latlng)
                        .bindPopup(`
                            <img src=images/boat.jfif height=130px> 
                            <br>Boat ID: ${boats[boat]['id']}
                            <br>Name: ${boats[boat]['name']}
                            <br>License: ${boats[boat]['license']}
                            <br>Type: ${boats[boat]['type']}
                            <br>Color: ${boats[boat]['color']}
                            <br>Owner: ${boats[boat]['owner']['name']}
                            <br>Contact No: ${boats[boat]['owner']['contact']}
                            <br>Address: ${boats[boat]['owner']['barangay']}`)
                        .bindTooltip(boats[boat]['name'], {direction: 'right'})
                    if(boats[boat]['tracker'] != null){
                        marker.setIcon(redIcon).addTo(map)
                    }
                    else{
                        marker.setIcon(greyIcon).addTo(map)
                    }
                    markers.push(marker);
                }     
            }
        }
    });
}

const logsHolder = document.getElementById('logs');
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
function updateLogs(){
    getLogs().then(logs => {
        logsHolder.innerHTML = '';
        for(let log in logs){
            let date = new Date(logs[log]['created_at'])
            logsHolder.innerHTML += `<p class="font-sans font-semibold text-sm text-gray-800">
                        ${months[date.getMonth()]} ${date.getDay()}, ${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()} 
                        <span class="font-normal text-gray-600"> 
                            - ${logs[log]['boat_info'][0]['name']} entered ${logs[log]['status']} zone
                        </span>
                    </p>`;
        }
    });
}

setIntervalAsync(() => {
    if(markers.length == 0){
        return;
    }
    updateMarkers();
    updateLogs();
}, 1000);