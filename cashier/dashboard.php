<link rel="stylesheet" type="text/css" href="cashier/css/dashboard.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Dashboard</h2>
    </div>
</div>


<div class="section group">
	<div class="col span_1_of_3">
    <div class="dash-header">
      <div id="head-1" class="dash-header-cont">0</div>
      <br/>
      <b>Items Sold</b>
    </div>
	</div>
	<div class="col span_1_of_3">
    <div class="dash-header">
      <div id="head-2" class="dash-header-cont">0</div>
      <br/>
      <b>Total Transactions</b>
    </div>
	</div>
	<div class="col span_1_of_3">
    <div class="dash-header">
      <div id="head-3"class="dash-header-cont">0</div>
      <br/>
      <b>Total Sales</b>
    </div>
	</div>
</div>
<br/>
<br/>
<div class="section group">
	<div id="charttitle" class="col span_1_of_2">

	<div id="sales_chart" class="chart"></div>
  Top Products
	</div>
	<div id="charttitle" class="col span_1_of_2">

  <div id="traffic_chart" class="chart"></div>
    Customer Traffic
	</div>
</div>
<br/>

<div class="table-header"><b>Current Transactions</b><i id="1" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-1" class="table-container" >
  <table id="trans_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sales No.</th>
            <th>Total Items</th>
            <th>Total Amount</th>
            <th>Time</th>
            <th style="width:70px;">Action</th>
        </tr>
    </thead>
    <tbody id="trans-body">
    </tbody>
  </table>
</div>

<!-- SCRIPTS HERE!! -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="cashier/js/dashboard.js"></script>
<!-- END!! -->
