function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 46.5, lng: 2.29},
        scrollwheel: false,
        zoom: 5
    });

    var infowindow = new google.maps.InfoWindow({
        'content': '...'
    });

    for (var i = 0; i < markers.length; i++) {
        marker = markers[i];

        var m = new google.maps.Marker({
            position: {
                lat: marker.lat,
                lng: marker.lng
            },
            map: map,
            title: marker.name,
            html: '<div><a href="' + marker.url + '">' + marker.name + '</a></div>'
        });

        google.maps.event.addListener(m, 'click', function () {
            infowindow.setContent(this.html);
            infowindow.open(map, this);
        });
    }
}
