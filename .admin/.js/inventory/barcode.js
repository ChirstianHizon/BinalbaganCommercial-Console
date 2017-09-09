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
      console.log(result);
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
      "id":"20000072",
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
  bartable.destroy();
  var newbar =
        '<tr id="'+id+'">'+
            '<td> <input id="name" type="text" required ></td>'+
          '<td>'+
            '<button id="'+id+'" onclick="savebarcode(this)"   id="save" name="s">S</button>'+
            '<button id="'+id+'" onclick="addbarcode(this)"    id="add" name="+">+</button>'+
          '</td>'+
        "</tr>";
  var bar = $('#barcode-body').html();
  console.log(bar);
  document.getElementById("barcode-body").innerHTML="";
  document.getElementById("barcode-body").innerHTML=bar+newbar;
  bartable =  $('#barcode_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false,
    "paginate":false
  });
  bartable.destroy();
}

function deletebarcode() {
  alert("delete");
}
function savebarcode() {
  alert("save");
}
function prodselect(clickedElement) {
    var id = clickedElement.id;
    getBarcodeList(id);
}
