<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventorysuppprices.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Suppliers Prices</h1>
    </div>
</div>

<div class="section group">
	<div class="col span_1_of_2">

    <div class="table-header"><b>Price</b><br/></div>
    <div class="table-container" style="padding-bottom:10px;">
      <b class="titles">Product Name:</b><span id="prodname">NO PRODUCT SELECTED</span><br /><br />
      <b class="titles">Current Price:</b><span id="currprice">N/A </span><br /><br />
      <br/>
      </br/>
      <b>Supplier</b><br />
      <div class="input-control select" >
        <select id="supplier" onchange="displayDetails()"placeholder="Supplier" required>
          <option value="" disabled selected>Add a New Supplier</option>
        </select><br /><br />
      </div><br /><br />

      <!-- <b class="titles">Supplier Name:</b><span id="suppname">NO SUPPLIER SELECTED</span><br /><br /> -->
      <form onsubmit="return subSuppPrice()">
        <b>Price</b><br />
        <div class="input-control text" data-role="input">
          <input id="price" type="number" min="0.01" step="0.01" placeholder="Set Price" required>
        </div><br/><br />
        <button class="button loading-pulse primary">Save Price</button>
      </form>
    </div>


    <div class="table-header"><b>Price List</b><br/></div>
    <div class="table-container">
      <table id="supp_id" class="datatable striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="supp-body">
        </tbody>
      </table>
    </div>

	</div>
	<div class="col span_1_of_2">
    <div class="table-header"><b>Product List</b><br/></div>
    <div class="table-container">
      <table id="prod_id" class="datatable striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th style="width:100px;"></th>
            </tr>
        </thead>
        <tbody id="prod-body">
        </tbody>
      </table>
    </div>
	</div>
</div>





<!-- SCRIPTS HERE!! -->
<script src=".admin/.js\inventory\supplier-prices.js"></script>
<!-- END!! -->
