var start,end;
$(function() {
  console.log("--- JS CONNECTED ---");
  $(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  var start = document.getElementById("fromdatepicker").value= currDate;
  var end = document.getElementById("todatepicker").value= currDate;
 createTable(start,end);
 table = $('#table_id').DataTable({
   "responsive": true,
   "bLengthChange": false,
   "bFilter": false ,
   "bInfo" : false,
   "pageLength": 10
 });
});

function fromdatechange(){
  var from = document.getElementById("fromdatepicker").value;
  console.log(from);

  $("#todatepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
}
function searchagain(){
  start = document.getElementById("fromdatepicker").value;
  end = document.getElementById("todatepicker").value;
  createTable(start,end);
}

function createTable(start,end){
  console.log("start");
  $.ajax({
    url: "php/product_log.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "todate":end,
      "fromdate":start,
      "type":1
    },success: function(result){
     console.log(result);
     table.destroy();
     document.getElementById("table-body").innerHTML = result.main;
     table = $('#table_id').DataTable({
       "responsive": true,
       "bLengthChange": false,
       "bFilter": false ,
       "bInfo" : false,
       "pageLength": 10
     });
    },error: function(response) {
      console.log(response);
    }
  });

}
