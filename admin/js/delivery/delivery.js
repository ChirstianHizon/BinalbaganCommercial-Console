var directionsDisplay;
var directionsDisplay2;
var directionsService;

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
  console.log("SCRIPT RUNNING");

  // google.maps.event.addDomListener(window, 'load', initialize);

  inititalizeTables();
  getPendingDelivery();
  getCompletedDelivery();
  getCurrentDelivery();


});
// ------------------------------------- DATA TABLES -------------------------//
var comptb,apptb,routetb,loctb;
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
  routetb = $('#route_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });
  loctb = $('#loc_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });
}


function getOnGoingCoords(orderid) {

  db.collection("Location").where("orderid","==",orderid).orderBy("timestamp", "asc")
  .onSnapshot(function(querySnapshot) {
    counter = 0;
    route = [];
        querySnapshot.forEach(function(doc) {
            // console.log(doc.data().latitude+"| "+doc.data().longitude+"| "+doc.data().timestamp);
            counter++;
            let lat = parseFloat(Math.round(doc.data().latitude * 100) / 100).toFixed(4);
            let lng = parseFloat(Math.round(doc.data().longitude * 100) / 100).toFixed(4);
            route.push([counter,lat+"",lng+""]);

        });
        console.log(route);
         calculateRoute2(directionsService, directionsDisplay2,route);
    });
}


function getCurrentDelivery(){
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":6
    },success: function(result){
      // console.log(result);
      loctb.destroy();
      document.getElementById("loc-body").innerHTML = result.main;
      loctb = $('#loc_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 5,
        "order": [[ 1, "asc" ]],
      });

      getOnGoingCoords(result.orderid);
      // getOnGoingCoords("9000023");

    },error: function(response) {
      console.log(response);
    }
  });
}

//
var delivery_id;
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
      apptb = $('#app_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 5,
        "order": [[ 1, "asc" ]],
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

function getDeliverytbRoute(id){
  delivery_id = id;
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":4
    },success: function(result){
      // console.log(result);
      routetb.destroy();
      document.getElementById("route-body").innerHTML = result.main;
      routetb = $('#route_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 5
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
        "pageLength": 10,
        "order": [[ 1, "desc" ]],
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

function getDeliveryRoute(del_id){
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":del_id,
      "type":3
    },success: function(result){
      console.log(result);
      if(result){
        if(result.COUNTER <= 1){
          alert("No End Route Found");
        }else{
          var route = result.COORDINATES;
          calculateRoute(directionsService, directionsDisplay,route);
        }
      }else{
        alert("NO ROUTE FOUND");
      }

    },error: function(response) {
      console.log(response);
    }
  });
}

function showSpecRoute(id,routeid) {
  $.ajax({
    url: "php/delivery.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "routeid":routeid,
      "type":5
    },success: function(result){
      console.log(result);
      if(result){
        if(result.COUNTER <= 1){
          alert("No End Route Found");
        }else{
          var route = result.COORDINATES;
          calculateRoute(directionsService, directionsDisplay,route);
        }
      }else{
        alert("NO ROUTE FOUND");
      }

    },error: function(response) {
      console.log(response);
    }
  });
}



function vieworder(clickedElement){
  var id = clickedElement.id;
}

function createRoute(clickedElement) {
  var id = clickedElement.id;
  getDeliveryRoute(id);
  getDeliverytbRoute(id);
}

function viewSelectedRoute(clickedElement) {
  var routeid = clickedElement.id;
  showSpecRoute(delivery_id,routeid);
}






























// --------------------------- MAPS API ---------------------------------------//
var current;
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsDisplay2 = new google.maps.DirectionsRenderer();
  directionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(10.194262, 122.862165),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  directionsDisplay.setMap(map);

  current = new google.maps.Map(document.getElementById('current'), {
    zoom: 15,
    center: new google.maps.LatLng(10.194262, 122.862165),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  directionsDisplay2.setMap(current);

}


function calculateRoute(directionsService, directionsDisplay,locations) {
  console.log(locations);
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



function calculateRoute2(directionsService, directionsDisplay2,locations) {

  console.log(locations);
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
        infowindow.open(current, marker);
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
      directionsDisplay2.setDirections(result);
    }else{
      alert('Directions request failed due to ' + status);
    }
  });
}
