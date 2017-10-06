//VARIBALES
var category = {
  id:"",
  name:"",
  desc:""
};
var table;
//------------------------END--------------------------------//

//ON DOCUMENT LOAD
$(function() {
  $('.DataTables_sort_icon').remove();
  getAllCategory();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });

  hide ('#updateCategory');
  show ('#newCategory');
});

//ADDS A NEW CATEGORY TO DB
$("#newCategory").submit(function(){
  category.name = document.getElementById("catname").value;
  category.desc = document.getElementById("desc").value;
  // 1 - ADD
  // 2 - UPDATE
  // 3 - DELETE
  // 4 - RETRIEVE ALL
  // 5 - RETRIEVE SPECIFIC
  // 6 - UPDATE
  console.log(category.name);
  $.ajax({
    url: "php/category.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "name":category.name,
      "desc":category.desc,
      "type":1
    },success: function(result){
      if(result){
        document.getElementById("newCategory").reset();
        getAllCategory();
      }
    },error: function(response) {
      console.log(response);
    }
  });
});

//FOR UPDATE CATEGORY
$("#updateCategory").submit(function(){
  category.id = document.getElementById("upid").value;
  category.name = document.getElementById("upname").value;
  category.desc = document.getElementById("updesc").value;
  // 1 - ADD
  // 2 - UPDATE
  // 3 - DELETE
  // 4 - RETRIEVE ALL
  // 5 - RETRIEVE SPECIFIC
  // 6 - UPDATE
  $.ajax({
    url: "php/category.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "id":category.id,
      "name":category.name,
      "desc":category.desc,
      "type":2
    },success: function(result){
      if(result){
        getAllCategory();
      }
    },error: function(response) {
      console.log(response);
    }
  });
});

function getAllCategory(){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/category.php",
    type: "POST",
    async: true,
    data: {
      "type":4
    },success: function(result){
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

function catdelete(clickedElement){
  var id = clickedElement.id;
  var r = confirm("Confirm delete?");
    if (r == true) {
		//delete stuff
		$.ajax({
    url: "php/category.php",
    type: "POST",
    dataType: 'json',
    async: true,
    data: {
      "access":access,
      "id":id,
      "type":3
    },success: function(result){
      //console.log(result.name);
      document.getElementById("upid").value = result.id;
	  getAllCategory();
    },error: function(response) {
      console.log(response);
    }
  });
    } else {
        //do nothing
    }
  
}

function catselect(clickedElement){
  show ('#updateCategory');
  hide ('#newCategory');
  var id = clickedElement.id;
  $.ajax({
    url: "php/category.php",
    type: "POST",
    dataType: 'json',
    async: true,
    data: {
      "access":access,
      "id":id,
      "type":5
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

$('#clear').click(function(){
  hide ('#updateCategory');
  show ('#newCategory');

  document.getElementById("newCategory").reset();
  document.getElementById("updateCategory").reset();
});




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
