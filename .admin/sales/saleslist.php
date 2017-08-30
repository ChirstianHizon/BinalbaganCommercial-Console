<link rel="stylesheet" type="text/css" href=".admin/.css/sales/saleslist.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Sales List</h2>
    </div>
</div>
<div id="datepicker">
  <h5><b>Choose Date:</b></h5><br/>
  <b>From</b>
  <input readonly='true' class="datepicker" type="text" id="fromdatepicker" placeholder="From">
  <b>to</b>
  <input readonly='true' class="datepicker" type="text" id="todatepicker" placeholder="To">
  <input id="btncreatereport"type="button" value="Search " onclick="searchagain()" >
</div>
<br/>
<br/>
<table id="table_id" class="display" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Sales No.</th>
      <th>Date</th>
      <th>Name</th>
      <th>Transaction Type</th>
      <th>Items Purchased</th>
      <th>Total Amount</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="table-body">
  </tbody>
</table>


<!-- END CHECKOUT -->
<div id="saleslist-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Sales List Items</h2>
    </div>
    <div class="modal-body">
      <h3><b>Purchase Summary</b></h3>
      <div id="line"></div>
      <table id="list_id" class="display" width="100%" cellspacing="0">
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
<script src=".admin/.js\sales\saleslist.js"></script>
