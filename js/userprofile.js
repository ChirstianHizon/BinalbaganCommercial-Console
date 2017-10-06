var storageRef = firebase.storage().ref();
var connectedRef = firebase.database().ref(".info/connected");
connectedRef.on("value", function(snap) {
  if (snap.val() === true) {
    console.log("----Connected to Firebase----");
  }
});


$(function() {


});

var file;

function getimage(event) {
  file = event.target.files[0];
  console.log(file);
}
var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var id = document.getElementById("uid");

var currfname,currlname;
function editmode() {
  show('#filegroup');
  show('#btnsave');
  show('#btncancel');
  hide('#btnedit');

  currfname = fname.value;
  currlname = lname.value;


  fname.disabled = false;
  lname.disabled = false;

}

function cancel() {

  hide('#filegroup');
  hide('#btnsave');
  hide('#btncancel');
  show('#btnedit');

  fname.value = currfname;
  lname.value = currlname;
  document.getElementById("fname").disabled = false;
  document.getElementById("lname").disabled = false;
}

function save() {
  var userid = id.value;
  var newfname = fname.value;
  var newlname = lname.value;
  var newimage = file;

  if(newimage == null){

    $.ajax({
      url: "php/employee.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        "access": access,
        "id": userid ,
        "fname":newfname,
        "lname":newlname,
        "image":newimage,
        "type": 5
      },
      success: function(result) {
        console.log(result);

        currfname = newfname;
        currlname = newlname;

        cancel();
      },
      error: function(response) {
        console.log(response);
      }
    });

  }else{
    var uploadTask = storageRef.child('accounts/' + file.name + newfname).put(file);
    uploadTask.on('state_changed', function(snapshot) {
        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log('Upload is ' + progress + '% done');
      }, function(error) {
        // Handle unsuccessful uploads
      }, function() {
        var url = uploadTask.snapshot.downloadURL;
        $.ajax({
          url: "php/employee.php",
          type: "POST",
          async: true,
          dataType: "json",
          data: {
            "access": access,
            "id": userid,
            "fname":newfname,
            "lname":newlname,
            "image":url,
            "type": 5
          },
          success: function(result) {
            console.log(result);

            document.getElementById("image").src=result.image;

            currfname = newfname;
            currlname = newlname;

            cancel();
          },
          error: function(response) {
            console.log(response);
          }
        });

      }
    );
  }

}


function openchangepass() {
  show('#passforms');
  hide('#changepass');

}
function cancelpass() {
  document.getElementById("formsofpass").reset();
  hide('#passforms');
  show('#changepass');
}

function newpassword() {

  var newpassx = document.getElementById("newpass");
  var conpass = document.getElementById("conpass");
  var userid = document.getElementById("uid");

  if(newpass.value != conpass.value){
    alert("Password Mismatch");
    return false;
  }else{
    $.ajax({
      url: "php/employee.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        "access": access,
        "id": userid.value,
        "pass":newpass.value,
        "type": 6
      },
      success: function(result) {
        // console.log(result);
        document.getElementById("formsofpass").reset();
        hide('#passforms');
        show('#changepass');
      },
      error: function(response) {
        console.log(response);
      }
    });
  }

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
