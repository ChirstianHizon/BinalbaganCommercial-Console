<link rel="stylesheet" type="text/css" href="cashier/css/sales/pos.css" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Point of Sales</h2>
    </div>
</div>

<div id="functionbar" >
  <div id="searchbar">
    <input id="insearch" onkeyup="searchtb()" type="search" placeholder="Enter Name/Barcode" list="list" data-minchars="3" data-maxitems="5">
    <datalist id="list">
      <option value="test">test</option>
    </datalist>
  </div>
</div>


<div class="section group">
  <div class="col span_1_of_2">
    <div class="table-header"><b>Product List</b></div>
    <div class="table-container">
    <table id="table_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>category</th>
          <th>Price</th>
          <th id="head"></th>
        </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
    <br />
    <br />
  </div>
  <div class="table-header" style="background-color:black;"><b><h4 style="padding:0;margin:0;margin-bottom:3px;">Total:</h4></b></div>
    <div id="totalamount">
      <b id="sales-total">P 0.00</b>
    </div>
  </div>


  <div class="col span_1_of_2">
    <div class="table-header"><b>Cart List</b></div>
    <div class="table-container">
    <table id="cart_id" class="table striped hovered cell-hovered border " width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th style="width:50px;"></th>
        </tr>
      </thead>
      <tbody id="cart-table-body">
      </tbody>
    </table>
  </div>
  <div id="checkout">
    <button id="btncheckout" class="button success"autofocus>CHECK OUT</button>
  </div>
</div>
</div>

<div id="addtocart-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Add to Cart</h2>
    </div>
    <div class="modal-body">
      <h3><b>Product Name: </b></h3>
      <div id="line"></div>
      <h2><i id="add-name">-NAME-</i></h2>
      <h3><b>Product Price: </b></h3>
      <div id="line"></div>
      <h2><i>₱ <i id="add-price">-Price-</i></i></h2>
      <br/>
      <h3><b>Customer Order:</b></h3>
      <div id="line"></div>
      <br/>
      <form id="form-addtocart" class="modalform">
        <input id="add-cart-input" type="number" min="1" step="1" placeholder="INSERT ORDER" autofocus></input><h2><b> pc/s</b></h2>
    </div>
    <div class="modal-footer">
      <button id="add">Add to Cart</button>
      </form>
    </div>
  </div>
</div>
<!-- END ADD MODAL -->

<!-- Change Cart Modal -->
<div id="changecart-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Edit Cart Content</h2>
    </div>
    <div class="modal-body">
      <h3><b>Product Name: </b></h3>
      <div id="line"></div>
      <h2><i id="change-name">-NAME-</i></h2>
      <h3><b>Product Price: </b></h3>
      <div id="line"></div>
      <h2><i>₱ <i id="change-price">-PRICE-</i></i></h2>
      <br/>
      <h3><b>Customer Order:</b></h3>
      <div id="line"></div>
      <br/>
      <form id="form-changecart" class="modalform">
        <input id="change-cart-input" type="number" min="1" step="1" placeholder="INSERT ORDER" autofocus></input><h2><b> pc/s</b></h2>
    </div>
    <div class="modal-footer">
      <button id="add">Add to Cart</button>
      </form>
    </div>
  </div>
</div>
<!-- END CHANGE MODAL -->

<!-- Checkout Modal -->
<div id="checkout-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Check Out</h2>
    </div>
    <div class="modal-body">
      <h3><b>Customer Cash</b></h3>
      <div id="line"></div>
      <br/>
      <h4><b>Total:</b></h4><i id="checkout-total" >0.00</i>
      <form id="form-checkout" class="modalform" onsubmit="finalCheckout();">
        <h2><b> P </b></h2><input onclick="this.select()" id="checkout-cash-input" type="number" min="1" step=".01" placeholder="Input Customer's Cash" autofocus required></input>
    </div>
    <div class="modal-footer">
      <button id="add">Submit</button>
      </form>
    </div>
  </div>
</div>
<!-- END CHECKOUT -->
<div id="final-checkout-modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span onclick="closeModal()" class="close">&times;</span>
      <h2>Review Items</h2>
    </div>
    <div class="modal-body">
      <h3><b>Cart Summary</b></h3>
      <div id="line"></div>
      <table id="checkout_id" class="display" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody id="checkout-table-body">
        </tbody>
      </table>
      <h4 class="inline"><b>Total:</b></h4><i id="total" >0.00</i>
      <h4 class="inline"><b>Cash:</b></h4><i id="cash" >0.00</i>
      <h4 class="inline"><b>Change:</b></h4><i id="change">0.00</i>
      <!-- TODO: CREATE A CLICKBOX IF THE USER WOULD WANT TO GENERATE A RECIEPT -->
      <form id="form-final-checkout" class="modalform" onsubmit="finalsubmit()">
        <br/>
      <input id="cbReciept" type="checkbox" name="genReciept" value="true">
      <label for="genReciept">Generate Receipt</label>
    </div>
    <div class="modal-footer">
      <button id="add">Submit</button>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL -->







<!-- SCRIPTS HERE!! -->
<script src="cashier/js/sales/pos.js"></script>
