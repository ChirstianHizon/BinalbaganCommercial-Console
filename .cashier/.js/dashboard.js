var trans_table;
$(function() {
  trans_table = $('#trans_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10,
    "bPaginate": false
  });

  //TABLES INITIALIZE
  initTransactionTable();
});

function initTransactionTable(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":3
    },success: function(result){
      console.log(result);
      trans_table.destroy();
      document.getElementById("head-1").innerHTML = result.totalqty;
      document.getElementById("head-2").innerHTML = result.count;
      document.getElementById("head-3").innerHTML = "P "+addCommas(get2decimal(result.totalsales));

      document.getElementById("trans-body").innerHTML = result.main;
      trans_table = $('#trans_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false ,
        "bInfo" : false,
        "pageLength": 10,
        "bPaginate": false
      });
        trans_table.buttons().remove();
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
  div = document.getElementById('table-1');
  if(div1 == true){
    div1 = false;
  div.style.display = "none";
  document.getElementById('1').innerHTML="+";
  }else{
    div1 = true;
    div.style.display = "block";
    document.getElementById('1').innerHTML="-";
  }
}
//--------------------------------------- END -----------------------------------------//



//---------------------------------------- UTILITIES --------------------------------//
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function get2decimal(int){
  return parseFloat(Math.round(int * 100) / 100).toFixed(2);
}
