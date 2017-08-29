$(function() {
  console.log("--- JS CONNECTED ---");
  $(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
 createTable();
});

function fromdatechange(){
  var from = document.getElementById("fromdatepicker").value;
  console.log(from);

  $("#todatepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
}

function createTable(){

  $.ajax({
    url: "php/product_log.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":1
    },success: function(result){
      // console.log(result);
      var type = "";
      switch (result.type) {
        case 0:
          type = "IN";
          break;
        case 1:
          type = "OUT"
          break;
        default:

      }
    },error: function(response) {
      console.log(response);
    }
  });

}
