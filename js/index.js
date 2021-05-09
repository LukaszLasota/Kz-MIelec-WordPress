import "normalize.css";
import "../scss/style.scss";

import "./scripts.js";
import "./scroll.js";


//    var map;
//         var mapStyleJson = [{
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#f5f5f5"
//             }]
//         }, {
//             "elementType": "labels.icon",
//             "stylers": [{
//                 "visibility": "off"
//             }]
//         }, {
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#616161"
//             }]
//         }, {
//             "elementType": "labels.text.stroke",
//             "stylers": [{
//                 "color": "#f5f5f5"
//             }]
//         }, {
//             "featureType": "administrative.land_parcel",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#bdbdbd"
//             }]
//         }, {
//             "featureType": "poi",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#eeeeee"
//             }]
//         }, {
//             "featureType": "poi",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#757575"
//             }]
//         }, {
//             "featureType": "poi.park",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#e5e5e5"
//             }]
//         }, {
//             "featureType": "poi.park",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#9e9e9e"
//             }]
//         }, {
//             "featureType": "road",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#ffffff"
//             }]
//         }, {
//             "featureType": "road.arterial",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#757575"
//             }]
//         }, {
//             "featureType": "road.highway",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#dadada"
//             }]
//         }, {
//             "featureType": "road.highway",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#616161"
//             }]
//         }, {
//             "featureType": "road.local",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#9e9e9e"
//             }]
//         }, {
//             "featureType": "transit.line",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#e5e5e5"
//             }]
//         }, {
//             "featureType": "transit.station",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#eeeeee"
//             }]
//         }, {
//             "featureType": "water",
//             "elementType": "geometry",
//             "stylers": [{
//                 "color": "#c9c9c9"
//             }]
//         }, {
//             "featureType": "water",
//             "elementType": "labels.text.fill",
//             "stylers": [{
//                 "color": "#9e9e9e"
//             }]
//         }];


//         function initMap() {

//             var myLatlng = new google.maps.LatLng(50.2994002442285, 21.448126879399094);
//             // 50.0322743,21.9959429,15 

//             map = new google.maps.Map(document.getElementById('map'), {
//                 center: myLatlng,
//                 styles: mapStyleJson,
//                 zoom: 16,
//                 mapTypeControl: true
//             });
                          
//               var infoWindow = new google.maps.InfoWindow({
//                 content: name
//               });

//               let marker = new google.maps.Marker({
//                 visible: true,
//                 position: myLatlng,
//                 map: map,
//                 animation: google.maps.Animation.DROP,
//                 title: "Kościół Zielonoświątkowy Zbór w Mielcu"
//             });
                     
//          }