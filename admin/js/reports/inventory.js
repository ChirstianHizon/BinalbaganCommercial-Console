var start,end,supplier,datatb;
var arrayData = [
  ['DATE', 'IN', 'OUT'],
  ['000-00-00', 0, 0],
];
$(function() {
  $("#datepickerfrom").datepicker({
    dateFormat: 'yy-mm-dd'
  });

  $("#datepickerto").datepicker({
    dateFormat: 'yy-mm-dd'
  });

  datatb = $('#datatb_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bFilter": false ,
    "bInfo" : false,
    "pageLength": 10
  });

  var start = document.getElementById("fromdatepicker").value= currDate;
  var end = document.getElementById("todatepicker").value= currDate;
  generateSuppliers();


 google.charts.load('current', {'packages':['corechart']});

});

function fromdatechange(){
  var from = document.getElementById("fromdatepicker").value;
  // console.log(from);

  $("#todatepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
}
function searchagain(){
  supplier = document.getElementById("supplier").value;
  start = document.getElementById("fromdatepicker").value;
  end = document.getElementById("todatepicker").value;

  createTable(start,end,supplier);
  getChartData(start,end,supplier);
}
var doc;
$(function() {

});
function createTable(_start,_end,_supplier){
  console.log(_start);

  $.ajax({
    url: "php/product_log.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "todate":_end,
      "fromdate":_start,
      "supplier":_supplier,
      "type":1
    },success: function(result){
     console.log(result);

     datatb.destroy();
     document.getElementById("datatb-body").innerHTML = "";
     if(result.status != null){
        document.getElementById("datatb-body").innerHTML = result.main;
        // $('#datatb-body').html(result.main);

     }
     datatb = $('#datatb_id').DataTable({
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

function getChartData(_start,_end,_supplier){
  $.ajax({
    url: "php/product_log.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "todate":_end,
      "fromdate":_start,
      "supplier":_supplier,
      "type":2
    },success: function(result){
     console.log(result);
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
    legend: {'position':'top','alignment':'center'},
    backgroundColor: '#EEEEEE',
    height: 350,
    'chartArea': {top: 35,'width': '80%', 'height': '70%'},
    animation:{duration: 1000,easing: 'out',startup: true},
    vAxis: {
      viewWindow:{
        min:0
      }
    }
  };

var chart = new google.visualization.ColumnChart(document.getElementById('stock_chart'));
  chart.draw(data, options);
}

$(window).resize(function(){
  stockChart();
});






function generateSuppliers(){
  var supplier = document.getElementById("supplier");
  supplier.innerHTML = '';
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "access":access,
      "type":6
    },success: function(result){
      // console.log(result.main);
      supplier.innerHTML = "<option value=\"ALL\">ALL</option>"+result.main;

      start = document.getElementById("fromdatepicker").value;
      end = document.getElementById("todatepicker").value;
      supplier = supplier.value;
      // console.log(supplier);

     createTable(start,end,supplier);
     getChartData(start,end,supplier);


    },error: function(response) {
      console.log(response);
    }
  });
}
