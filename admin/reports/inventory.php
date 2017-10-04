<link rel="stylesheet" type="text/css" href="admin/css/reports/inventory.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Inventory Report</h2>
    </div>
</div>

<form onsubmit="searchagain()">
  <div class="section group">
  	<div class="col span_1_of_3">

    	Start Date: <br />
      <div class="input-control text" id="datepickerfrom">
        <input readonly='true' class="datepicker" onchange="fromdatechange()" type="text" id="fromdatepicker" placeholder="From" required>
          <button class="button"><span class="mif-calendar"></span></button>
      </div>

  	</div>
  	<div class="col span_1_of_3">

      End Date: <br />
      <div class="input-control text" id="datepickerto">
        <input readonly='true' class="datepicker" type="text" id="todatepicker" placeholder="To" required>
          <button class="button"><span class="mif-calendar"></span></button>
      </div>

    </div>
  	<div class="col span_1_of_3">

      Supplier<br>
      <div class="input-control select" >
        <select id="supplier" placeholder="optional"required>
        <option value="" disabled selected>No Supplier Available</option>
        </select>
      </div><br>


  	</div>
  </div>
  <button>Search</button>
</form>
<br/>
<div class="table-header"><b>Ready for Pickup</b></div>
<div class="table-container">
<table id="datatb_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Date</th>
      <th>Type</th>
      <th>Employee</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      <th>Supplier</th>

    </tr>
  </thead>
  <tbody id="datatb-body">
  </tbody>
</table>
</div>

<div class="table-header"><b>Ready for Pickup</b></div>
<div class="table-container">
<div id="stock_chart" class="chart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="admin/js/reports/inventory.js"></script>
