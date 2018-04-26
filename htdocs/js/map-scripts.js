
(function($){
    "use strict";
    /* Map */
    function initialize_map() {
        var myLatLng = new google.maps.LatLng(51.0994200,6.9473200); // 51.09942!4d6.94732
        var mapOptions = {
            zoom: 12,
            center: myLatLng,
            disableDefaultUI: true,
            scrollwheel: true,
            navigationControl: true,
            mapTypeControl: true,
            scaleControl: false,
            draggable: true,
            styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":1}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
        };
        var mapElement = document.getElementById('map-canvas');

        var map = new google.maps.Map(mapElement, mapOptions);

        // add a marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.0994200,6.9473200),
            map: map,
            icon: 'images/icons/map-marker.png',
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize_map);
})(jQuery);
