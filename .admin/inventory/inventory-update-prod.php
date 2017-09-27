<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryupdateprod.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Product Levels</h1>
    </div>
</div>


<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
  <form id="updateProduct" onsubmit="updatestocks()">

    <input id="search" type="text" placeholder="Enter Barcode / Product Name"><br><br>
    <div id="line"></div>
    <br/>
    Product Name: <b id="pname">Choose a Product</b><br/>
    Current Level: <b id="level">Choose a Product</b><br/>
    Status: <b id="status">Choose a Product</b><br/><br/>
    <div id="line"></div>
    <br/>
    <input readonly='true' class="nodisplay" id="id" type="text" placeholder="id do not edit" required>
    <input readonly='true' class="nodisplay" id="levelin" type="text" placeholder="id do not edit" required>
    <h4>Product Details</h4>
    <input id="currlevel" type="number" step="1" min="1" placeholder="Enter Stocks to Add"required><b>pc/s</b><br><br>

    <h4>Supplier Details</h4>
    <select id="supplier" placeholder="Supplier" required>
    <option value="" disabled selected>Add a New Supplier</option>
  </select><br /><br />
    <button id="btnupdate">Update Level</button>
  </form>
  </div>
  <!-- TABLE BELOW -->
  <div id="div2" class="col span_1_of_2">
  <div id="tableidreborn">
  <table id="table_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>
  </div>
  </div>
</div>
<!-- SCRIPTS HERE!!! -->
<script src=".admin/.js\inventory\update-prod.js"></script>
