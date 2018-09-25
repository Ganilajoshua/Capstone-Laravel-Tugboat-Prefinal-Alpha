$(function () {

    function initMap() {
        var location = new google.maps.LatLng(14.597247, 120.975080);

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        var markerImage = '/others/stisla_admin_v1.0.0/dist/img/marker.png';

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: markerImage
        });

        var contentString = '<div class="info-window">' +
                '<h6>Tug Master Bargepool Inc.</h6>' +
                '<div class="info-content">' +
                '<p>115 Rm 203 J Luna St, Binondo, Manila, 1006 Metro Manila</p>' +
                '<a href="https://www.google.com/maps/place/115+Rm,+203+Juan+Luna+St,+Binondo,+Manila,+1006+Metro+Manila,+Philippines/@14.5972525,120.9728917,17z/data=!3m1!4b1!4m5!3m4!1s0x3397ca109411c381:0x36ce4af4964d4de8!8m2!3d14.5972473!4d120.9750804?hl=en-US">'+
                'View on Google Maps'+
                '</a>' +
                '</div>' + 
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 250
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
            map.setCenter(marker.getPosition());
        });

    }

    google.maps.event.addDomListener(window, 'load', initMap);
});