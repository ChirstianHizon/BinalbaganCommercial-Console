var start,end;
var arrayData = [
  ['DATE', 'IN', 'OUT'],
  ['000-00-00', 0, 0],
];
$(function() {

  $(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  var start = document.getElementById("fromdatepicker").value= currDate;
  var end = document.getElementById("todatepicker").value= currDate;
 createTable(start,end);
 getChartData(start,end);
 table = $('#table_id').DataTable({
   "responsive": true,
   "bLengthChange": false,
   "bFilter": false ,
   "bInfo" : false,
   "pageLength": 10
 });

 google.charts.load('current', {'packages':['corechart']});

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
 getChartData(start,end);
}

function createTable(start,end){
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
    //  console.log(result);
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

function getChartData(start,end){
  $.ajax({
    url: "php/product_log.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "todate":end,
      "fromdate":start,
      "type":2
    },success: function(result){
    //  console.log(result);
     arrayData = result;
      google.charts.setOnLoadCallback(stockChart);
    },error: function(response) {
      console.log(response);
    }
  });
}
function stockChart() {
  var data = google.visualization.arrayToDataTable(arrayData);

  var options = {
    title: 'Stock Movement',
    hAxis: {title: 'Date', titleTextStyle: {color: 'red'}}
 };

var chart = new google.visualization.ColumnChart(document.getElementById('stock_chart'));
  chart.draw(data, options);
}

$(window).resize(function(){
  stockChart();
});
