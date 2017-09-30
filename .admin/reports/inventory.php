<link rel="stylesheet" type="text/css" href=".admin/.css/reports/inventory.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Inventory Report</h2>
    </div>
</div>

<div id="datepicker">
  <h5><b>Choose Date:</b></h5><br/>
  <b>From</b>
  <form onsubmit="searchagain()">
  <input readonly='true' class="datepicker" onchange="fromdatechange()" type="text" id="fromdatepicker" placeholder="From">
  <b>to</b>
  <input readonly='true' class="datepicker" type="text" id="todatepicker" placeholder="To">
  <button>Search</button>
</form>
</div>

<br/>
<div class="table-header"><b>Ready for Pickup</b></div>
<div class="table-container">
<table id="table_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Date</th>
      <th>Type</th>
      <th>Employee</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody id="table-body">
  </tbody>
</table>
</div>

<div class="table-header"><b>Ready for Pickup</b></div>
<div class="table-container">
<div id="stock_chart" class="chart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src=".admin/.js/reports/inventory.js"></script>
