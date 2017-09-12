var directionsDisplay;
var directionsService;

$(function() {
  console.log("SCRIPT RUNNING");

  inititalizeTables();
  getPendingDelivery();

  google.maps.event.addDomListener(window, 'load', initialize);
});


// ------------------------------------- DATA TABLES -------------------------//
var comptb,apptb
function inititalizeTables() {
  apptb = $('#app_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });
  comptb = $('#complete_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });

}
function getPendingDelivery(){
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":1
    },success: function(result){
      // console.log(result);
      apptb.destroy();
      document.getElementById("app-body").innerHTML = result.main;
      warning_table = $('#app_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 10
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

function getCompletedDelivery(){
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":2
    },success: function(result){
      // console.log(result);
      comptb.destroy();
      document.getElementById("complete-body").innerHTML = result.main;
      comptb = $('#complete_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 10
      });
    },error: function(response) {
      console.log(response);
    }
  });
}



function vieworder(clickedElement){
  var id = clickedElement.id;
  // alert(id);
  var route = [];
  route.push(['Main', 10.194262, 122.862165, 1]);
  route.push(['STOP', 10.195583, 122.860611, 2]);
  route.push(['STOP 2', 10.194955, 122.858232, 3]);
  route.push(['END',  10.194506, 122.856299, 4]);
  calculateRoute(directionsService, directionsDisplay,route);
}

function createRoute() {

}






























// --------------------------- MAPS API ---------------------------------------//

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(10.194262, 122.862165),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  directionsDisplay.setMap(map);

}


function calculateRoute(directionsService, directionsDisplay,locations) {
  // CALCULATES AND GATHERS ALL ROUTES
  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  request = {
    travelMode: google.maps.TravelMode.DRIVING
  };
  for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));

    if (i == 0) request.origin = marker.getPosition();
    else if (i == locations.length - 1) request.destination = marker.getPosition();
    else {
      if (!request.waypoints) request.waypoints = [];
      request.waypoints.push({
        location: marker.getPosition(),
        stopover: true
      });
    }
  }

  // DISPLAY ROUTE
  directionsService.route(
    request,
    function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
    }else{
      alert('Directions request failed due to ' + status);
    }
  });
}
