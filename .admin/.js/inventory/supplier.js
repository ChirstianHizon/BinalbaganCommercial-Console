$(function() {
  $('.DataTables_sort_icon').remove();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
  getSupplier();
  hide ('#updateSupplier');
  show ('#newSupplier');
});

$('#clear').click(function(){
  hide ('#updateSupplier');
  show ('#newSupplier');

  document.getElementById("newSupplier").reset();
  document.getElementById("updateSupplier").reset();
});


$("#newSupplier").submit(function(){
  var name = document.getElementById("suppname").value;
  var desc = document.getElementById("suppdesc").value;
  console.log(name);
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "name":name,
      "desc":desc,
      "type":4
    },success: function(result){
      if(result.main){
        document.getElementById("newSupplier").reset();
        getSupplier();
      }
    },error: function(response) {
      console.log(response);
    }
  });
});

$("#updateSupplier").submit(function(){
  var id = document.getElementById("upid").value;
  var name = document.getElementById("upname").value;
  var desc = document.getElementById("updesc").value;
  // 1 - ADD
  // 2 - UPDATE
  // 3 - DELETE
  // 4 - RETRIEVE ALL
  // 5 - RETRIEVE SPECIFIC
  // 6 - UPDATE
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "name":name,
      "desc":desc,
      "type":3
    },success: function(result){
      if(result.main){
        getSupplier();
      }
    },error: function(response) {
      console.log(response);
    }
  });
});


function getSupplier(){
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType:"json",
    data: {
      "access":access,
      "type":1
    },success: function(result){
      console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result.main;
       table =  $('#table_id').DataTable({
         "responsive": true,
         "bFilter": false,
         "bLengthChange": false,
         "ordering": false,
         "bInfo" : false
       });
      document.getElementById("newSupplier").reset();
    },error: function(response) {
      console.log(response);
    }
  });
}

function selectSupplier(clickedElement){
  show ('#updateSupplier');
  hide ('#newSupplier');
  var id = clickedElement.id;
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    dataType: 'json',
    async: true,
    data: {
      "access":access,
      "id":id,
      "type":2
    },success: function(result){
      //console.log(result.name);
      document.getElementById("upid").value = result.id;
      document.getElementById("upname").value = result.name;
      document.getElementById("updesc").value = result.desc;
    },error: function(response) {
      console.log(response);
    }
  });
}

function deleteSupplier(clickedElement){
  var id = clickedElement.id;
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    dataType: 'json',
    async: true,
    data: {
      "access":access,
      "id":id,
      "type":5
    },success: function(result){
      //console.log(result.name);
      alert("Delete Sucessful");
      getSupplier();
    },error: function(response) {
      console.log(response);
    }
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
