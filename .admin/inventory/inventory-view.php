<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryview.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product List</h1>
    </div>
</div>


<div id="dttable">
  <table id="table_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Level</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>
</div>
<!--
  INCLUDE IN CSS
-->
<style>
.item-prod{
  margin-left:20px;
}
.inlinemagic{
  display: inline;
}
.inlinemagicdate{
  display: inline;
  float:right;
}
#prd-details{
  display: none;
}
</style>
<div id="prd-details">
  <br/>
  <br/>
  <br/>
  <h2 class="inlinemagic"><b id="name">Sample Product</b></h2>
  <i class="inlinemagicdate" id="datetime">2017/01/01 12:01:21</i>
  <div style="border-top:1px solid black;width:100%;"></div>
  <h4>Product Details:</h4>
  <div style="width:60%;border:1px solid gray;width:100%;padding:10px;border-radius:8px;">
    <div>
      <h4>Category:</h4>
      <h4 class="item-prod"><b id="category">Test</b></h4>
    </div>
    <div>
      <h4>Price:</h4>
      <h4 class="item-prod"><b id="price">12.00</b></h4>
    </div>
    <div>
      <h4>Description:</h4>
      <h4 class="item-prod"><b id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b></h4>
    </div>
  </div>

  <div style="width:60%;border:1px solid gray;width:100%;padding:10px;border-radius:8px;">
    <div>
      <h4>Image:</h4>
      <img id="image"src="" alt="Mountain View" style="width:304px;height:228px;">
    </div>
  </div>

  <h4>Product Levels:</h4>
  <div style="border:1px solid gray;width:100%;padding:10px;border-radius:8px;">
    <div>
      <h4>Status:</h4>
      <h4 class="item-prod"><b id="status">100 pc/s</b></h4>
    </div>
    <div>
      <h4>Current Level:</h4>
      <h4 class="item-prod"><b id="level">100 pc/s</b></h4>
    </div>
    <div>
      <h4>Optimal Level:</h4>
      <h4 class="item-prod"><b id="optimal">400 pc/s</b></h4>
    </div>
    <div>
      <h4>Warning Level:</h4>
      <h4 class="item-prod"><b id="warning">200 pc/s</b></h4>
    </div>
  </div>
</div>
<br/>
<br/>

<!-- SCRIPTS HERE!!! -->
<script src=".admin/.js\inventory\view-prod.js"></script>
<!-- END!!! -->
