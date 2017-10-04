var pendingtable,walkintable,list_table,orderlisttable,modal;
$(function() {
  $("#datepicker").datepicker({
    minDate: currDate,
    dateFormat: 'yy-mm-dd'
  });

  pendingtable = $('#pending_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });

  walkintable = $('#walkin_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });
  orderlisttable = $('#orderlist_id').DataTable({});
  createPickUpTable();
  createPedingTable();
});

function createPickUpTable(){
  document.getElementById("walkin-body").innerHTML = "";
  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":2
    },success: function(result){
      //console.log(result);
      walkintable.destroy();
      document.getElementById("walkin-body").innerHTML = result.main;
      walkintable = $('#walkin_id').DataTable({
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

function createPedingTable(){
  document.getElementById("pending-body").innerHTML = "";
  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":1
    },success: function(result){
      //console.log(result);
      pendingtable.destroy();
      document.getElementById("pending-body").innerHTML = result.main;
      pendingtable = $('#pending_id').DataTable({
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


//--------------------------- FUNCTIONS -------------------------------------//
function vieworderList(clickedElement){
    var orderid = clickedElement.id;

    modal = document.getElementById('viewpending-modal');
    openModal();

    document.getElementById("orderlist-body").innerHTML = "";
    $.ajax({
      url: "php/orders.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        "id":orderid,
        "type":3
      },success: function(result){
        //console.log(result);
        orderlisttable.destroy();
        document.getElementById("orderlist-body").innerHTML = result.main;
        document.getElementById("total").innerHTML = "P "+ result.total;
        document.getElementById("count").innerHTML = result.count+" items/s";
        orderlisttable = $('#orderlist_id').DataTable({
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


//----------------------------------- APPROVAL FUNCTIONS -------------------------//
var orderid;
function approvedOrder(clickedElement){
  orderid = clickedElement.id;

  modal = document.getElementById('approved-modal');
  openModal();

  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "id":orderid,
      "type":4
    },success: function(result){
      console.log(result);
      document.getElementById("app-name").innerHTML = result.customer;
      document.getElementById("app-type").innerHTML = result.type;
      document.getElementById("app-date").innerHTML = result.date;
    },error: function(response) {
      console.log(response);
    }
  });

}

function updateOrder(){
  var date = document.getElementById("pickupdate").value;
  changeformat(date);
  console.log(date);

  if(date == ""){
    alert("Choose Pickup Date");
    return false;
  }
  
  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "date":date,
      "id":orderid,
      "type":5
    },success: function(result){
      console.log(result);
      if(!result.main){
        alert("Insufficient Product Stocked");
      }else{
        document.getElementById("app-form").reset();
        createPickUpTable();
        createPedingTable();
        closeModal();
      }
    },error: function(response) {
      console.log(response.responseText);
    }
  });
}

//--------------------------------------RECeiVE FUNCTIONS ---------------------------//
function receiveOrder(clickedElement){
  document.getElementById("recv-datenow").innerHTML = currDate+" "+currTime;
  orderid = clickedElement.id;
  modal = document.getElementById('received-modal');
  openModal();

  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "id":orderid,
      "type":4
    },success: function(result){
      console.log(result);
      document.getElementById("recv-name").innerHTML = result.customer;
      document.getElementById("recv-type").innerHTML = result.type;
      document.getElementById("recv-date").innerHTML = result.date;
    },error: function(response) {
      console.log(response);
    }
  });

}
function updatereceiveOrder(){

  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "id":orderid,
      "type":6
    },success: function(result){
      console.log(result);
      createPickUpTable();
      closeModal();
    },error: function(response) {
      console.log(response);
    }
  });

}

//------------------------------------- MODAL FUNCTIONS------------------------ //
function closeModal(){
  orderid = "";
  modal.style.display = "none";
}
function openModal(){
  modal.style.display = "block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
};

//---------------------------------------- UTILITIES --------------------------------//
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function get2decimal(int){
  return parseFloat(Math.round(int * 100) / 100).toFixed(2);
}
function changeformat(inputDate) {

inputDate = inputDate.replace(".", "-");
inputDate = inputDate.replace(".", "-");

  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    var day = date.getDate().toString();
    var month = (date.getMonth() + 1).toString();
    // Months use 0 index.

    return date.getFullYear() + '-' +
    (month[1] ? month : '0' + month[0]) + '-' +
    (day[1] ? day : '0' + day[0]);
  }
}
function revertformat(inputDate) {
  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    var day = date.getDate().toString();
    var month = (date.getMonth() + 1).toString();
    // Months use 0 index.

    return (month[1] ? month : '0' + month[0]) + '/' +
    (day[1] ? day : '0' + day[0]) + '/'+
    date.getFullYear() ;
  }
}
