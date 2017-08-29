var pending_table,warning_table;
$(function() {
  pending_table = $('#pending_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });
  warning_table = $('#warning_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });
  delivery_table = $('#delivery_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });

  //TABLES INITIALIZE
  initPendingTable();
});

function initPendingTable(){
  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":11
    },success: function(result){
      console.log(result);
      pending_table.destroy();
      document.getElementById("pending-body").innerHTML = result.main;
      pending_table = $('#pending_id').DataTable({
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























//--------------------------- HIDING AND SHOWING OF TABS ---------------------------//
var div1,div2,div3,div4;
div1=div2=div3=div4=true;
function hide(clickedElement){
  x = Number(clickedElement.id);
  var div;
  switch (x) {
  case 1:
  div = document.getElementById('table-1');
  if(div1 == true){
    div1 = false;
  div.style.display = "none";
  }else{
    div1 = true;
    div.style.display = "block";
  }
    break;
  case 2:
  div = document.getElementById('table-2');
  if(div2 == true){
    div2 = false;
  div.style.display = "none";
  }else{
    div2 = true;
    div.style.display = "block";
  }
    break;
  case 3:
  div = document.getElementById('table-3');
  if(div3 == true){
    div3 = false;
  div.style.display = "none";
  }else{
    div3 = true;
    div.style.display = "block";
  }
    break;
  case 4:
  div = document.getElementById('table-4');
  if(div4 == true){
    div4 = false;
  div.style.display = "none";
  }else{
    div4 = true;
    div.style.display = "block";
  }
    break;
  default:
    alert("CANNOT FIND THIS");
    break;
  }
}
//--------------------------------------- END -----------------------------------------//
