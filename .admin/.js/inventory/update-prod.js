//ON DOCUMENT LOAD
$(function() {
  createProductTable();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
  generateSuppliers();
});

$('#search').on( 'keyup', function () {
    table.columns( 0 ).search( this.value ).draw();
    //console.log(this.value);
} );

// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAME ONLY
// 7 - RETRIEVE NAME & STATUS

function createProductTable(){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "type":6
    },success: function(result){
      //console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result;
     table =  $('#table_id').DataTable({
       "responsive": true,
       "bLengthChange": false,
       "ordering": false,
       "bInfo" : false
     });
    },error: function(response) {
      console.log(response);
    }
  });
}
var newid,id;
function prodselect(clickedElement){
  if(newid != null){
      id = newid;
  }else{
      id = clickedElement.id;
  }
  $.ajax({
    url: "php/product.php",
    type: "POST",
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":7
    },success: function(result){
      //console.log(result);
      document.getElementById("updateProduct").reset();
      document.getElementById("id").value = result.id;
      document.getElementById("levelin").value = result.level;
      prodname = result.name;
      document.getElementById("pname").innerHTML = result.name;
      document.getElementById("level").innerHTML = result.level + " pc/s";
      document.getElementById("status").innerHTML = result.status;
      newid = null;
    },error: function(response) {
      console.log(response);
    }
  });
}
var prodname;
function prodautoselect(id){
  console.log(id);
  $.ajax({
    url: "php/product.php",
    type: "POST",
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":7
    },success: function(result){
      //console.log(result);
      document.getElementById("updateProduct").reset();
      document.getElementById("id").value = result.id;
      document.getElementById("levelin").value = result.level;
      document.getElementById("pname").innerHTML = result.name;
      document.getElementById("level").innerHTML = result.level + " pc/s";
      document.getElementById("status").innerHTML = result.status;
      newid = null;
    },error: function(response) {
      console.log(response);
    }
  });
}

function updatestocks(){
  var id = document.getElementById("id").value;
  var levelin = document.getElementById("levelin").value;
  var currlevel = document.getElementById("currlevel").value;
  var supplier = document.getElementById("supplier").value;
  if( id == null || id == "" || currlevel == null || currlevel == ""){
    alert("Choose a Product first");
    return false;
  }
  document.getElementById("btnupdate").disabled = true;
  // 1 - ADD
  // 2 - UPDATE
  // 3 - DELETE
  // 4 - RETRIEVE ALL
  // 5 - RETRIEVE SPECIFIC
  // 6 - RETRIEVE NAME ONLY
  // 7 - RETRIEVE NAME & STATUS
  // 8 - UPDATE STOCK
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "id":id,
      "level":Number(currlevel),
      "add":Number(levelin),
      "supplier": supplier,
      "type":8
    },success: function(result){
      if(result){
        console.log(result);
        newid = id;
        prodselect();
        document.getElementById("updateProduct").reset();
        document.getElementById("btnupdate").disabled = false;
        createProductTable();
        StockAdded(prodname,levelin);
      }
    },error: function(response) {
      console.log(response);
    }
  });
}

function generateSuppliers(){
  var supplier = document.getElementById("supplier");
  supplier.innerHTML = '';
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "access":access,
      "type":6
    },success: function(result){
      console.log(result.main);
      supplier.innerHTML = result.main;
    },error: function(response) {
      console.log(response);
    }
  });
}







// ------------------------------------ NOTIFICATIONS
function StockAdded(name,qty) {
  $.Notify({
      caption: 'Stock Added Successfully',
      content: qty+ ' has been added to '+name,
      type: 'success'
  });
}












// ---------------------------------- UTILITIES --------------------------//
function hide (elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'none';
  }
}

function show (elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'block';
  }
}
