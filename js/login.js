window.onload = function() {
console.log("--- test ---");
$("#loginform").submit(function(event){
    event.preventDefault();
});
$("#loginform").submit(function(event){
  var uname = document.getElementById("uname").value,
  pass = document.getElementById("pass").value;

  $.ajax({
    url: "php/login.php",
    type: "POST",
    dataType: "json",
    data: {
      "uname":uname,
      "pass":pass,
      "type":1,
      "access":"Binalbagan_Commercial_WEB_Access"
    },success: function(result){
      console.log(result);
      if(result.status){
        window.location = 'index.php';
      }else{
        alert("INCORRECT DATA");
      }
    },error: function(response) {
      console.log(response);
    }
  });
});
};
