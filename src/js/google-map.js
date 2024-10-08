(function () {
	'use strict';
	$(document).ready(function () {

		if ($('.contact').length) {

			google.maps.event.addDomListener(window, 'load', init);

			var zoom = $('.subpage.contact .top-type-map').data('zoom');
			var lat = $('.subpage.contact .top-type-map').data('lat');
			var lng = $('.subpage.contact .top-type-map').data('lng');

				function init() {
					var mapOptions = {
						zoom: zoom,
						center: new google.maps.LatLng(lat, lng),
						disableDefaultUI: true,
						styles: [{
							"featureType": "all",
							"elementType": "labels.text.fill",
							"stylers": [{ "saturation": 36 }, { "color": "#000000" }, { "lightness": 40 }]
						}, {
							"featureType": "all",
							"elementType": "labels.text.stroke",
							"stylers": [{ "visibility": "on" }, { "color": "#000000" }, { "lightness": 16 }]
						}, {
							"featureType": "all",
							"elementType": "labels.icon",
							"stylers": [{ "visibility": "off" }]
						}, {
							"featureType": "administrative",
							"elementType": "geometry.fill",
							"stylers": [{ "color": "#000000" }, { "lightness": 20 }]
						}, {
							"featureType": "administrative",
							"elementType": "geometry.stroke",
							"stylers": [{ "color": "#000000" }, { "lightness": 17 }, { "weight": 1.2 }]
						}, {
							"featureType": "landscape",
							"elementType": "geometry",
							"stylers": [{ "color": "#000000" }, { "lightness": 20 }]
						}, {
							"featureType": "poi",
							"elementType": "geometry",
							"stylers": [{ "color": "#000000" }, { "lightness": 21 }]
						}, {
							"featureType": "road.highway",
							"elementType": "geometry.fill",
							"stylers": [{ "color": "#000000" }, { "lightness": 17 }]
						}, {
							"featureType": "road.highway",
							"elementType": "geometry.stroke",
							"stylers": [{ "color": "#000000" }, { "lightness": 29 }, { "weight": 0.2 }]
						}, {
							"featureType": "road.arterial",
							"elementType": "geometry",
							"stylers": [{ "color": "#000000" }, { "lightness": 18 }]
						}, {
							"featureType": "road.local",
							"elementType": "geometry",
							"stylers": [{ "color": "#000000" }, { "lightness": 16 }]
						}, {
							"featureType": "transit",
							"elementType": "geometry",
							"stylers": [{ "color": "#000000" }, { "lightness": 19 }]
						}, {
							"featureType": "water",
							"elementType": "geometry",
							"stylers": [{ "color": "#952d2d" }, { "lightness": 17 }]
						}]
					};

					var mapElement = document.querySelector('.top-map');
					var map = new google.maps.Map(mapElement, mapOptions);

					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(lat, lng),
						map: map,
						//icon: 'full url',
					});
				}

		}

	});
}(jQuery));