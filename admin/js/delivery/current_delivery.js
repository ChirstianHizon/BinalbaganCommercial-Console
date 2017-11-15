var connectedRef = firebase.database().ref(".info/connected");
var db = firebase.firestore();
var directionsDisplay;
var directionsService;
connectedRef.on("value", function(snap) {
  if (snap.val() === true) {
    console.log("----Connected to Firebase----");
  }
});

$(function() {
  initDelivery();
  initDataTB();
  initOrderDelivery();
});


var ordertb;
// INIT DATATABLES
function initDataTB() {
  ordertb = $('#order_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });
}

var location;
function initDelivery() {
  db.collection("Delivery").doc("cWX9NNxQRzzXOK99fbBu")
      .onSnapshot(function(doc) {
          var source = doc.metadata.hasPendingWrites ? "Local" : "Server";
          console.log(source, " data: ", doc && doc.data());
          var location = [];
          console.log("SIZE"+doc.data().Routes.length);
          for(var x=0;x<doc.data().Routes.length;x++){
            location.push(["",doc.data().Routes[x].latitude,doc.data().Routes[x].longitude]);
            console.log(doc.data().Routes[x].latitude,doc.data().Routes[x].longitude);
          }
          console.log(location);
          calculateRoute(directionsService, directionsDisplay,location);

          console.log(doc.data().Routes);
          if(!doc.data().completed){
            console.log("Delivery is onGoing");
          }else{
            console.log("Delivery is Completed");
          }
      });
}

function initOrderDelivery() {
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":0
    },success: function(result){
      // console.log(result);
      ordertb.destroy();
      document.getElementById("order-body").innerHTML = result.main;
      ordertb = $('#order_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 10,
        "order": [[ 1, "desc" ]],
      });
    },error: function(response) {
      console.log(response);
    }
  });
}





















// Maps initialize
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
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
      };
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
  // -------------------------- CODE FROM STACK OVERFLOW HAHA :) ---------------//
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









// ---------------------------------- UTILITIES --------------------------//
function hide(elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'none';
  }
}

function show(elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'block';
  }
}
