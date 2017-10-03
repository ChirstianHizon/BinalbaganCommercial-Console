
//ON DOCUMENT LOAD
$(function() {
  createProductTable();
  table =  $('#table_id').DataTable();
});

// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAME ONLY
// 7 - RETRIEVE NAME & STATUS
// 8 - UPDATE STOCK
// 9 - RETRIEVE FOR VIEW ALL

function createProductTable(){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "type":9
    },success: function(result){
      //console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result;
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


function prodselect(clickedElement){
  var id = clickedElement.id;
  $.ajax({
    url: "php/product.php",
    type: "POST",
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":10
    },success: function(result){
      //console.log(result);
      document.getElementById("name").innerHTML = result.name;
      document.getElementById("datetime").innerHTML = result.date +" "+ result.time;
      document.getElementById("category").innerHTML = result.category;
      document.getElementById("price").innerHTML = "₱ "+result.price;
      document.getElementById("description").innerHTML = result.desc;
      document.getElementById("image").src = result.image;
      document.getElementById("status").innerHTML = result.status;
      document.getElementById("level").innerHTML = result.level + " pc/s";
      document.getElementById("optimal").innerHTML = result.optimal + " pc/s";
      document.getElementById("warning").innerHTML = result.warning + " pc/s";
      show('#prd-details');
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
