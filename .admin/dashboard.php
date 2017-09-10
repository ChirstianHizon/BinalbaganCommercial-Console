<link rel="stylesheet" type="text/css" href=".admin/.css/dashboard.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"></h2>
    </div>
</div>

<!-- SAMPle -->
<div class="section group">
	<div id="col1"class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-1" class="dash-header-cont">0</div>
      <br/>
      <b>Total Products</b>
    </div>
	</div>
	<div id="col2" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-2" class="dash-header-cont">0</div>
      <br/>
      <b>Total Sales</b>
    </div>
	</div>
	<div id="col3" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-3"class="dash-header-cont">0</div>
      <br/>
      <b>Total Delivery</b>
    </div>
	</div>
	<div id="col4" class="col span_1_of_4">
    <div class="dash-header">
      <div id="head-4" class="dash-header-cont">0</div>
      <br/>
      <b>Pending Orders</b>
    </div>
	</div>
</div>

<div class="section group">
	<div class="col span_1_of_2">
    <div id="top_prod_chart" class="chart"></div>
	Top 10 Products
	</div>
	<div class="col span_1_of_2">
    <div id="cust_traffic_chart" class="chart"></div>
	Customer Traffic
	</div>
</div>

<div class="table-header"><b>Pending Orders</b><i id="1" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-1" class="table-container" >
  <div id="line"></div>
  <table id="pending_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Type</th>
            <th>Date Ordered</th>
            <th>Total Items</th>
            <th>Total Amount</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody id="pending-body">
    </tbody>
  </table>

</div>

<div class="table-header"><b>Warning Level </b><i id="2" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-2" class="table-container" >
  <div id="line"></div>
  <table id="warning_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Level</th>
            <th style="width:70px;">Action</th>
        </tr>
    </thead>
    <tbody id="warning-body">
    </tbody>
  </table>
</div>

<div class="table-header"><b>Pending Orders</b><i id="3" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-3" class="table-container" >
  <div id="line"></div>
  <table id="delivery_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Order No.</th>
            <th>Driver</th>
            <th>Customer</th>
            <th>Total Items</th>
            <th>Total Amount</th>
            <th style="width:70px;">Action</th>
        </tr>
    </thead>
    <tbody id="delivery-body">
    </tbody>
  </table>
</div>

<div class="table-header"><b>Current Sales Statistics</b><i id="4" onclick="hide(this)" class="btnhide">-</i></div>
<div id="table-4" class="table-container" >
  <div id="sales_chart" class="chart"></div>
  <br/>
  Sales Statistics For the Year <?php echo DATE("Y")?>
  <div id="line"></div>
</div>

<!-- SCRIPTS HERE!! -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src=".admin/.js/dashboard.js"></script>
<!-- END!! -->
