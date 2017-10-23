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
  initWarningTable();
  getheaderContent();

});

window.onload = function () {
  google.charts.load('current', {'packages':['corechart']});
  getTopProdChartData();
  getTotalCustTrafficChartData();
  getSalesStatChartData();
};

function initPendingTable(){
  $.ajax({
    url: "php/orders.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":11
    },success: function(result){
      // console.log(result);
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

function initWarningTable(){
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":13
    },success: function(result){
      // console.log(result);
      warning_table.destroy();
      document.getElementById("warning-body").innerHTML = result.main;
      warning_table = $('#warning_id').DataTable({
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


function btnupdate(id){
  window.location = 'index.php?mod=invenupdtprod&prod='+id;
}

function getheaderContent(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":6
    },success: function(result){
      // console.log(result);
      document.getElementById("head-1").innerHTML=addCommas(result.PRODUCT_COUNT);
      document.getElementById("head-2").innerHTML="P "+addCommas(result.SALES_TOTAL);
      document.getElementById("head-3").innerHTML=addCommas(result.DELIVERY_TOTAL);
      document.getElementById("head-4").innerHTML=addCommas(result.PENDING_COUNT);

    },error: function(response) {
      console.log(response);
    }
  });
}
var topprod_arrayData,custtrafficData,salesData;
function getTopProdChartData(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":7
    },success: function(result){
      // console.log(result);
      topprod_arrayData = result;
      google.charts.setOnLoadCallback(TopProdChart);
    },error: function(response) {
      console.log(response);
    }
  });
}

function getTotalCustTrafficChartData(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":8
    },success: function(result){
      console.log(result);
      custtrafficData=result;
      google.charts.setOnLoadCallback(CustomerTrafficChart);
    },error: function(response) {
      console.log(response);
    }
  });
}

function getSalesStatChartData(){
  $.ajax({
    url: "php/sales.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":9
    },success: function(result){
      console.log(result);
      salesData=result;
      google.charts.setOnLoadCallback(SalesChart);
    },error: function(response) {
      console.log(response);
    }
  });
}

// GOOGLE CHARTS
function TopProdChart() {
  var data = google.visualization.arrayToDataTable(topprod_arrayData);
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
    var chart = new google.visualization.ColumnChart(document.getElementById('top_prod_chart'));
    var formatter = new google.visualization.NumberFormat(
    {suffix: ' sold', negativeColor: 'red', negativeParens: true});
    formatter.format(data, 1);

    chart.draw(data, options);
  }

  function CustomerTrafficChart() {
    var data = google.visualization.arrayToDataTable(custtrafficData);
    var options = {
      legend: {'position':'top','alignment':'center'},
      'chartArea': {'width': '80%', 'height': '75%'},
      backgroundColor: '#EEEEEE',
      height: 350,
      animation:{duration: 1000,easing: 'out',startup: true}
    };
    var chart = new google.visualization.LineChart(document.getElementById('cust_traffic_chart'));
    var formatter = new google.visualization.NumberFormat(
    {prefix: 'P ', negativeColor: 'red', negativeParens: true});
    formatter.format(data, 1);
    chart.draw(data, options);
  }

  function SalesChart() {
    var today = new Date();
    var yyyy = today.getFullYear();
    var data = google.visualization.arrayToDataTable(salesData);
    var options = {
      legend: {'position':'top','alignment':'center'},
      'chartArea': {'width': '80%', 'height': '75 %'},
      backgroundColor: '#EEEEEE',
      height: 300,
      animation:{duration: 1000,easing: 'out',startup: true}
    };
    var chart = new google.visualization.LineChart(document.getElementById('sales_chart'));
    var formatter = new google.visualization.NumberFormat(
      {prefix: 'P', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1);
      chart.draw(data, options);
    }

    // -------------- FOR CHART RESIZING----------------//
    $(window).resize(function(){
      TopProdChart();
      CustomerTrafficChart();
      SalesChart();
    });























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
