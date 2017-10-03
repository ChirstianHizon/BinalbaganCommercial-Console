<link rel="stylesheet" type="text/css" href="admin/css/dashboard.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Dashboard</h2>
    </div>
</div>

<!-- SAMPle -->
<div class="section group">
	<div id="col1"class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-1" class="dash-header-cont">0</div>
      <br/>
      <div class="bar">
          Total Products
      </div>
    </div>
	</div>
	<div id="col2" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-2" class="dash-header-cont">0</div>
      <br/>
      <div class="bar">
          Total Sales
      </div>
    </div>
	</div>
	<div id="col3" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-3"class="dash-header-cont">0</div>
      <br/>
      <div class="bar">
          Total Delivery
      </div>
    </div>
	</div>
	<div id="col4" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-4" class="dash-header-cont">0</div>
      <br/>
      <div class="bar">
          Pending Orders
      </div>
    </div>
	</div>
</div>

<div class="section group">
	<div id="charttitle" class="col span_1_of_2">
    <div id="top_prod_chart" class="chart"></div>
	Top 10 Products
	</div>
	<div id="charttitle" class="col span_1_of_2">
    <div id="cust_traffic_chart" class="chart"></div>
	Customer Traffic
	</div>
</div>

<div class="table-header"><b>Pending Orders</b><i id="1" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-1" class="table-container" >
  <!-- <div id="line"></div> -->
  <table id="pending_id" class="table hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Type</th>
            <th>Date Ordered</th>
            <th>Total Items</th>
            <th>Total Amount</th>
            <!-- <th></th>
            <th></th> -->
        </tr>
    </thead>
    <tbody id="pending-body">
    </tbody>
  </table>
  <br  />
  <br  />
</div>

<div class="table-header"><b>Warning Level </b><i id="2" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-2" class="table-container" >
  <!-- <div id="line"></div> -->
  <table id="warning_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Remaining Stock</th>
            <th style="width:70px;">Action</th>
        </tr>
    </thead>
    <tbody id="warning-body">
    </tbody>
  </table>
  <br  />
  <br  />
</div>

<div class="table-header"><b>Current Sales Statistics</b><i id="4" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-4" class="table-container" >
  <div id="sales_chart" class="chart2"></div>
</div>

<!-- SCRIPTS HERE!! -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="admin/js/dashboard.js"></script>
<!-- END!! -->
