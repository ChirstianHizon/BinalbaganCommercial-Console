<link rel="stylesheet" type="text/css" href="admin/css/sales/orders.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Orders</h2>
    </div>
</div>

<div class="table-header"><b>Pending Orders List</b></div>
<div class="table-container">
<table id="pending_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <!-- <th>No.</th> -->
      <th>Date</th>
      <th>Name</th>
      <th>Transaction</th>
      <th>Items Purchased</th>
      <th>Total Amount</th>
      <th style="width:100px;"></th>
    </tr>
  </thead>
  <tbody id="pending-body">
  </tbody>
</table>
</div>

<br/>
<div class="table-header"><b>Ready for Pickup</b></div>
<div class="table-container">
<table id="walkin_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Transaction</th>
      <th>Items Purchased</th>
      <th>Total Amount</th>
      <th>Pickup Date</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="walkin-body">
  </tbody>
</table>
</div>


<div id="viewpending-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Ordered Items</h2>
    </div>
    <div class="modal-body">
      <!-- <h5>Customer Name:</h5>
      <h5>Transaction Type:</h5>
      <h5>Date Ordered:</h5>
      <br/>
      <h4>Purchased Items:</h4> -->

      <table id="orderlist_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price Ordered</th>
            <th>Ordered Qty</th>
            <th>Avail Qty</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody id="orderlist-body">
        </tbody>
      </table>
      <br />
      <br />
      <h4 class="inline"><b>Address:</b></h4><i id="address" class="total"></i>
      <br />
      <h4 class="inline"><b>Total:</b></h4><i id="total" class="total">0.00</i>
      <br/>
      <br/>
      <h4 class="inline"><b>Total Items:</b></h4><i id="count" class="total">0.00</i>
      <br/>
    </div>
    <div class="modal-footer">
      <button onclick="closeModal()" id="red">Close</button><br/>
      </form>
    </div>
  </div>
</div>


<div id="approve-edit-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Ordered Items</h2>
    </div>
    <div class="modal-body">
      <h5>Customer Name:</h5>
      <h5>Transaction Type:</h5>
      <h5>Date Ordered:</h5>
      <br/>
      <h4>Purchased Items:</h4>

      <table id="orderlist_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price </th>
            <th>Quantity</th>
            <th>Stock Qty</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody id="orderlist-body">
        </tbody>
      </table>
      <br />
      <br />
      <h4 class="inline"><b>Total:</b></h4><i id="total" class="total">0.00</i>
      <br/>
      <br/>
      <h4 class="inline"><b>Total Items:</b></h4><i id="count" class="total">0.00</i>
      <br/>
    </div>
    <div class="modal-footer">
      <button onclick="closeModal()" id="red">Close</button><br/>
      </form>
    </div>
  </div>
</div>

<div id="approved-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Approve Order</h2>
    </div>
    <div class="modal-body">
      <h5>Customer Name:</h5>
      <b id="app-name"></b>
      <h5>Transaction Type:</h5>
      <b id="app-type"></b>
      <h5>Date Ordered:</h5>
      <b id="app-date"></b>
      <br/>
      <form id="app-form" onsubmit="updateOrder()">
      <h5>Set Pick Up Date:</h5>
      <div class="input-control text" id="datepicker">
          <input readonly='true' class="datepicker" type="text" id="pickupdate" placeholder="Set Pick Up Date" required>
          <button class="button"><span class="mif-calendar"></span></button>
      </div>
      <h3>*Once Approved the Status Cannot be Changed</h3>
    </div>
    <div class="modal-footer">
      <button id="app">Approve</button><br/>
      </form>
    </div>
  </div>
</div>

<div id="received-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Receive Order</h2>
    </div>
    <div class="modal-body">
      <h5>Customer Name:</h5>
      <b id="recv-name"></b>
      <h5>Transaction Type:</h5>
      <b id="recv-type"></b>
      <h5>Date Ordered:</h5>
      <b id="recv-date"></b>
      <br/>
      <form id="recv-form" onsubmit="updatereceiveOrder()">
      <h5>Received Date:</h5>
      <b id="recv-datenow">00-00-00</b>
    </div>
    <div class="modal-footer">
      <button id="add">Order Received</button><br/>
      </form>
    </div>
  </div>
</div>

<!-- SCRIPTS HERE!!! -->
<script src="admin/js/sales/orders.js"></script>
