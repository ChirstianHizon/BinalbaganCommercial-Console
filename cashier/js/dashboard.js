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

  google.charts.load('current', {'packages':['corechart']});
  getsalesChartData();
  gettrafficChartData();
});

function initTransactionTable(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
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
    },error: function(response) {
      console.log(response);
    }
  });
}



var sales_arrayData,traffic_arrayData;
function getsalesChartData(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":4
    },success: function(result){
     console.log(result);
     sales_arrayData = result;
     google.charts.setOnLoadCallback(salesChart);
    },error: function(response) {
      console.log(response);
    }
  });
}

function gettrafficChartData(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":5
    },success: function(result){
     console.log(result);
     traffic_arrayData = result;
     google.charts.setOnLoadCallback(trafficChart);
    },error: function(response) {
      console.log(response);
    }
  });
}

//GOOLGE CHARTS
function salesChart() {
  var data = google.visualization.arrayToDataTable(sales_arrayData);
  var options = {
    'legend': {'position': 'bottom'},
    'chartArea': {'width': '80%', 'height': '75%'},
    backgroundColor: '#EEEEEE',
    height: 350,
    animation:{duration: 1000,easing: 'out',startup: true}
  };
  var formatter = new google.visualization.NumberFormat(
  {suffix: ' pc/s', negativeColor: 'red', negativeParens: true});
  formatter.format(data, 1);
 var chart = new google.visualization.ColumnChart(document.getElementById('sales_chart'));
  chart.draw(data, options);
}

function trafficChart() {
  var data = google.visualization.arrayToDataTable(traffic_arrayData);
  var options = {
    'legend': {'position': 'bottom'},
    'chartArea': {'width': '80%', 'height': '75%'},
    backgroundColor: '#EEEEEE',
    height: 350,
    animation:{duration: 1000,easing: 'out',startup: true}
  };
 var chart = new google.visualization.LineChart(document.getElementById('traffic_chart'));
  chart.draw(data, options);
}

$(window).resize(function(){
  salesChart();
  trafficChart();
});

















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
