<link rel="stylesheet" type="text/css" href="admin/css/sales/saleslist.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Sales List</h2>
    </div>
</div>
<div id="datepicker">
  <h5><b>Choose Date:</b></h5><br/>
  <form onsubmit="return false;">

    <div class="section group">

    	<div class="col span_1_of_2">

        <div class="input-control text" id="datepickerfrom">
          <input readonly='true' class="datepicker" type="text" id="fromdatepicker" placeholder="From">
            <button class="button"><span class="mif-calendar"></span></button>
        </div>

    	</div>
    	<div class="col span_1_of_2">


        <div class="input-control text" id="datepickerto">
          <input readonly='true' class="datepicker" type="text" id="todatepicker" placeholder="To">
            <button class="button"><span class="mif-calendar"></span></button>
        </div>

    	</div>
    </div>




    <button id="btncreatereport" onclick="searchagain()" class="button primary"> Search </button>
  </form>
</div>
<br />
<div class="table-header"><b>Sales List</b></div>
<div class="table-container">
<table id="table_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Date</th>
      <th style="width:200px;" >Name</th>
      <th style="width:60px;">Type</th>
      <th>Items Purchased</th>
      <th>Total Amount</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="table-body">
  </tbody>
</table>
<br />
<br />
<b><h4>Total Transaction: </h4></b><h3><span id="t-trans"></span></h3>
<b><h4>Total Items: </h4></b><h3><span id="t-items"></span></h5>
<b><h4>Total Amount: </h4></b><h3>P <span id="t-price"></span></h3>
<br />
<br />
<br />
</div>




<!-- END CHECKOUT -->
<div id="saleslist-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Purchsed Items</h2>
    </div>
    <div class="modal-body">
      <!-- <h3><b>Purchase Summary</b></h3>
      <div id="line"></div> -->
      <table id="list_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody id="list-table-body">
        </tbody>
      </table>
      <br/>
      <br/>
      <h4 class="inline"><b>Total:</b></h4><i id="total" class="total">0.00</i>
      <br/>
      <h4 class="inline"><b>Total Items:</b></h4><i id="count" class="total">0.00</i>
      <br/>
      <br/>
      <br/>
    </div>
  </div>
</div>
<!-- END MODAL -->


<!-- SCRIPTS HERE!!! -->
<script src="admin/js/sales/saleslist.js"></script>
