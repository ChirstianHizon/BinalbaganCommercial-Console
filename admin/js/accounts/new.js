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

function createNewEmployee(){
  document.getElementById("status").innerHTML ="";
  var fname = document.getElementById("fname").value,
  lname = document.getElementById("lname").value,
  uname = document.getElementById("uname").value,
  pass = document.getElementById("pass").value,
  repass = document.getElementById("repass").value,
  emptype = document.getElementById("type").value,
  image = "";
  if(fname == null || fname =="" || lname == null || lname =="")
  {
    alert("Fill Up Empty Fields");
    return false;
  }

  if(repass == null || pass == null || repass != pass){
    document.getElementById("status").innerHTML = "<i>Passwords does Not Match</i>";
    return false;
  }

  $.ajax({
    url: "php/employee.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "uname":uname,
      "type":1
    },success: function(result){
      if(result){
        //console.log(result);
        if(!result.main){
          document.getElementById("status").innerHTML = "<i>Username Already Used</i>";
          return false;
        }else{
          if(file == null){
            $.ajax({
              url: "php/employee.php",
              type: "POST",
              async: true,
              dataType: "json",
              data: {
                "uname":uname,
                "pass":pass,
                "fname":fname,
                "lname":lname,
                "emptype":emptype,
                "image":image,
                "type":2
              },success: function(result){
                if(result){
                  //console.log("HAHAHA");
                }
              },error: function(response) {
                console.log(response);
              }
            });
          }else{
            // if file has data inside
            var uploadTask = storageRef.child('employee/'+file.name+uname).put(file);
            uploadTask.on('state_changed', function(snapshot){
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
            }, function(error) {
            // Handle unsuccessful uploads
            }, function() {
              image = uploadTask.snapshot.downloadURL;
              $.ajax({
                url: "php/employee.php",
                type: "POST",
                async: true,
                dataType: "json",
                data: {
                  "access":access,
                  "uname":uname,
                  "pass":pass,
                  "fname":fname,
                  "lname":lname,
                  "emptype":emptype,
                  "image":image,
                  "type":2
                },success: function(result){
                  if(result){
                    document.getElementById("newEmployee").reset();
                    document.getElementById("image").src = "";
                    alert("Employee Added");
                  }
                },error: function(response) {
                  console.log(response);
                }
              });
            });

          }
        }
      }
    },error: function(response) {
      console.log(response);
    }
  });

}

function checkUname(uname){




}

function addEmployee(uname,pass,fname,emptype,image) {



}
