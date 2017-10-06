<link rel="stylesheet" type="text/css" href="admin/css/inventory/inventoryupdateprod.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Product Levels</h1>
    </div>
</div>

<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
    <div class="table-header"><b>Add Product Stock</b></div>
    <div class="table-container">
  <form id="updateProduct" onsubmit="updatestocks()">

    <!-- <input id="search" type="text" placeholder="Enter Barcode / Product Name"><br><br>
    <div id="line"></div> -->
    <br/>
    Product Name: <b id="pname">Choose a Product</b><br/>
    Current Level: <b id="level">Choose a Product</b><br/>
    Status: <b id="status">Choose a Product</b><br/><br/>
    <div id="line"></div>
    <br/>
    <input readonly='true' class="nodisplay" id="id" type="text" placeholder="id do not edit" required>
    <input readonly='true' class="nodisplay" id="levelin" type="text" placeholder="id do not edit" required>
    <br />
    <b>Enter Stock Amount</b>
    <div class="input-control text">
      <input id="currlevel" type="number" step="1" min="1" placeholder="Enter Stocks to Add"required>
    </div><br><br><br />

    <b>Supplier</b><br />
    <div class="input-control select" >
      <select id="supplier" placeholder="Supplier" required>
        <option value="" disabled selected>Add a New Supplier</option>
      </select><br /><br />
    </div>
    <br />
    <br />
    <br />
    <button class="button primary" id="btnupdate">Update Level</button>
  </form>
</div>
  </div>
  <!-- TABLE BELOW -->
  <div id="div2" class="col span_1_of_2">
    <div class="table-header"><b>Product List</b></div>
    <div class="table-container">
      <div class="input-control text">
        <input id="search" class="tbsearch" type="search" placeholder="Search a Product">
      </div>
  <div id="tableidreborn">
  <table id="table_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th style="width:70px;"></th>
        </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>
  </div>
  </div>
  <br/>
  <br />
  <br />
</br/>
</div>
</div>
<!-- SCRIPTS HERE!!! -->
<script src="admin/js/inventory/update-prod.js"></script>

<?php

$prod = (isset($_GET['prod']) && $_GET['prod'] != '') ? $_GET['prod'] : '';
if ($prod != '') {
    echo "<script>prodautoselect(".$prod.");</script>";
}

 ?>
