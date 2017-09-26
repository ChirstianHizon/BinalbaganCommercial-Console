var table,bartable;
$(function() {
  $('.DataTables_sort_icon').remove();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
  bartable =  $('#barcode_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false,
    "paginate":false
  });
  getProductList();
});
var current_prod;
function getProductList() {
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":12
    },success: function(result){
      // console.log(result);
      document.getElementById("table_id").innerHTML= result.main;
      table.destroy();
      table =  $('#table_id').DataTable({
        "responsive": true,
        "bFilter": false,
        "bLengthChange": false,
        "ordering": false,
        "bInfo" : false
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

function getBarcodeList(id) {
  $.ajax({
    url: "php/barcode.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":1
    },success: function(result){
      console.log(result);
      bartable.destroy();
      document.getElementById("barcode-body").innerHTML="";
      document.getElementById("barcode-body").innerHTML= result.main;
      bartable =  $('#barcode_id').DataTable({
        "responsive": true,
        "bFilter": false,
        "bLengthChange": false,
        "ordering": false,
        "bInfo" : false,
        "paginate":false
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

function addbarcode(clickedElement) {
  var id = clickedElement.id;
}

function deletebarcode(clickedElement) {
  var id = clickedElement.id;
  $.ajax({
    url: "php/barcode.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":3
    },success: function(result){
       console.log(result);
       if(result.main){
         getBarcodeList(current_prod);
       }
    },error: function(response) {
      console.log(response);
    }
  });
}
function savebarcode() {
  alert("save");
}
function prodselect(clickedElement) {
    var id = clickedElement.id;
    current_prod = id;
    $.ajax({
      url: "php/product.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        "access":access,
        "id":id,
        "type":7
      },success: function(result){
        // console.log(result);
        document.getElementById("btnnewbarcode").disabled = false;
        document.getElementById("prodname").innerHTML = result.name;
      },error: function(response) {
        console.log(response);
      }
    });
    document.getElementById("barid").value=id;
    getBarcodeList(id);
}

$("#newbarform").submit(function(){
  var prodid = document.getElementById("barid").value;
  var newbar = document.getElementById("newbarcode").value;
  $.ajax({
    url: "php/barcode.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "prdid":prodid,
      "code":newbar,
      "type":2
    },success: function(result){
       console.log(result);
       if(result.main){
         document.getElementById("newbarform").reset();
         getBarcodeList(prodid);
       }else{
         alert("Barcode Already Exists");
       }
    },error: function(response) {
      console.log(response);
    }
  });
});
