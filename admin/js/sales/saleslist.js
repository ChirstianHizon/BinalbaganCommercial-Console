var table,list_table,start,end;
var modal="";
$(function() {
  $("#datepickerfrom").datepicker({ dateFormat: 'yy-mm-dd' });
  $("#datepickerto").datepicker({ dateFormat: 'yy-mm-dd' });

  // var start = document.getElementById("fromdatepicker").value= currDate;
  // var end = document.getElementById("todatepicker").value= currDate;
  // console.log(start + ' | '+end);


  list_table = $('#list_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });
  table = $('#table_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "bFilter": false,
    "pageLength": 10
  });

  createSalesTable(start,end);
});

function searchagain(){
  start = document.getElementById("fromdatepicker").value;
  end = document.getElementById("todatepicker").value;
  createSalesTable(start,end);
}

function createSalesTable(start,end){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "start":start,
      "end":end,
      "type":1
    },success: function(result){
      console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result.main;
      table =  $('#table_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bInfo" : false,
        "pageLength": 10
      });
      document.getElementById("t-trans").innerHTML=result.trans;
      document.getElementById("t-items").innerHTML=result.items;
      document.getElementById("t-price").innerHTML='P '+result.amount;
    },error: function(response) {
      console.log(response);
    }
  });
}

function viewsalesList(clickedElement){
    var salesid = clickedElement.id;

    $.ajax({
      url: "php/sales.php",
      type: "POST",
      async: true,
      dataType: "json",
      data: {
        "access":access,
        "id":salesid,
        "type":2
      },success: function(result){
        console.log(result);
        list_table.destroy();
        document.getElementById("list-table-body").innerHTML = result.main;
        document.getElementById("total").innerHTML = "P "+addCommas(result.total);
        document.getElementById("count").innerHTML = result.count + " Item/s";
        modal = document.getElementById('saleslist-modal');
        openModal();
        list_table = $('#list_id').DataTable({
          "responsive": true,
          "bLengthChange": false,
          "bInfo" : false,
          "bFilter": false,
          "pageLength": 5
        });
      },error: function(response) {
        console.log(response);
      }
    });
}



//------------------------------------- MODAL FUNCTIONS------------------------ //
function closeModal(){
  modal.style.display = "none";
}
function openModal(){
  modal.style.display = "block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
};

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
function changeformat(inputDate) {
  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    var day = date.getDate().toString();
    var month = (date.getMonth() + 1).toString();
    // Months use 0 index.

    return date.getFullYear() + '-' +
    (month[1] ? month : '0' + month[0]) + '-' +
    (day[1] ? day : '0' + day[0]);
  }
}
function revertformat(inputDate) {
  var date = new Date(inputDate);
  if (!isNaN(date.getTime())) {
    var day = date.getDate().toString();
    var month = (date.getMonth() + 1).toString();
    // Months use 0 index.

    return (month[1] ? month : '0' + month[0]) + '/' +
    (day[1] ? day : '0' + day[0]) + '/'+
    date.getFullYear() ;
  }
}
