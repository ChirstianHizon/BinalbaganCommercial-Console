var storageRef = firebase.storage().ref();
var connectedRef = firebase.database().ref(".info/connected");
connectedRef.on("value", function(snap) {
  if (snap.val() === true) {
    console.log("----Connected to Firebase----");;
  }
});

var file;
function getimage(event){
  file = event.target.files[0];
  //console.log(file);
  var reader  = new FileReader();
  reader.onload = function(e)  {
    var image = document.createElement("img");
    image.src = e.target.result;
    document.getElementById("image").src = reader.result;
 }
 reader.readAsDataURL(file);
}
//--------------------------- IMAGE SELECTOR AND VIEW ---------------------------//


var table;

$(function() {
table =  $('#table_id').DataTable({
  "responsive": true,
  "bFilter": false,
  "bLengthChange": false,
  "ordering": false,
  "bInfo" : false,
  "pageLength": 999999
});
createTable();
});

function createTable(){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "../php/employee.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":3
    },success: function(result){
      console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result.main;
      table =  $('#table_id').DataTable({
        "responsive": true,
        "bFilter": false,
        "bLengthChange": false,
        "ordering": false,
        "bInfo" : false,
        "pageLength": 999999
      });
    },error: function(response) {
      console.log(response);
    }
  });
}


function viewaccount(clickedElement){
  userid = clickedElement.id;

  $.ajax({
    url: "../php/employee.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "id":userid,
      "type":4
    },success: function(result){
      //console.log(result);
      document.getElementById("username").innerHTML = result.username;
      document.getElementById("firstname").innerHTML = result.firstname;
      document.getElementById("lastname").innerHTML = result.lastname;
      document.getElementById("emp_type").innerHTML =result.type;
      document.getElementById("datestamp").innerHTML =result.datestamp;
      document.getElementById("view-image").src = result.image;

    },error: function(response) {
      console.log(response);
    }
  });

  modal = document.getElementById('viewaccount-modal');
  openModal();
}

function editaccount(clickedElement){
  userid = clickedElement.id;

  $.ajax({
    url: "../php/employee.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "id":userid,
      "type":4
    },success: function(result){
      console.log(result);
      document.getElementById("uname").value = result.username;
      document.getElementById("fname").value =result.firstname;
      document.getElementById("lname").value =result.lastname;
      document.getElementById("type").selectedIndex =result.realtype;
      document.getElementById("edit-image").src = result.image;

    },error: function(response) {
      console.log(response);
    }
  });

  modal = document.getElementById('editaccount-modal');
  openModal();
}


//------------------------------------- MODAL FUNCTIONS------------------------ //
function closeModal(){
  modal.style.display = "none";
}
function openModal(){
  modal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
        document.getElementById("form-addtocart").reset();
        document.getElementById("form-changecart").reset();
        document.getElementById("form-final-checkout").reset();

    }
}
