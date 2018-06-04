
function initMap() {
  var uluru = {lat: -34.5326849, lng: -58.501497};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: uluru,
    styles: [
      {elementType: 'geometry', stylers: [{color: '#ffffff'}]},
      {
        featureType: 'road',
        elementType: 'geometry',
        stylers: [
          {
            color: '#dddddd'
          }
        ]
      },
      {
        featureType: 'poi',
        elementType: 'labels.text.fill',
        stylers: [
          {
            color: '#000000'
          }
        ]
      },
      {
        featureType: 'poi.business',
        elementType: 'labels.icon',
        stylers: [
          {
            visibility: "off"
          }
        ]
      },
      {
        featureType: 'water',
        elementType: 'geometry',
        stylers: [
          {
            color: '#e6e9ed'
          }
        ]
      },
      {
        featureType: 'road.arterial',
        elementType: 'geometry',
        stylers: [
          {
            visibility: 'off'
          }
        ]
      },
      {
        featureType: 'administrative',
        elementType: 'labels.text.fill',
        stylers: [
          {
            color: '#626262'
          }
        ]
      },
      {
        featureType: 'road',
        elementType: 'labels.icon',
        stylers: [
          {
            visibility: 'off'
          }
        ]
      },
    ]
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}
