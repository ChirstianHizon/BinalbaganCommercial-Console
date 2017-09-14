<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddprod.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add New Product</h1>
    </div>
</div>

<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
  <div id="line"></div>
  <form id="newProduct">
    <h4>Product Details</h4>
    <div id="line"></div><br/>
    Product Name:<br>
    <input id="newname" type="text" name="firstname" required><br>
    Product Category:<br>
    <select id="category" placeholder="optional"required>
    <option value="" disabled selected>No Catgory Available</option>
    </select><br>
    Product Price:<br>
    <input id="price" type="number" step="0.01"required><br>
    Description:<br>
    <textarea id="desc" rows="4" required></textarea><br>
    <br/><h4>Product Levels</h4>
    <div id="line"></div><br/>
    Current Level:<br>
    <input id="level" type="number" step="1"  min="0" required><br>
    Optimal Level:<br>
    <!-- <input id="newoptimal" type="number" step="1" min="0" onchange="setminWarning()" required><br> -->
    <input id="newoptimal" type="number" step="1" min="0" required><br>
    Warning Level:<br>
    <input id="warning" type="number" step="1" min="0" required><br>
    <h4>Image Settings</h4>
    Image:<br>
    <input type="file" id="fileUpload" alt="Choose Product Image" onchange="getimage(event)" ><br>
    <button id="btnadd">Add New Product</button>
  </form>
  <!--  -->

  <form id="updateProduct">
    <input class="nodisplay" id="updateid" type="text" name="firstname" required>
    <input class="nodisplay" id="updateimglink" type="text" name="firstname" required>
    <h4>Product Details</h4>
    <div id="line"></div><br/>
    Product Name:<br>
    <input id="updatename" type="text" name="firstname" required><br>
    Product Category:<br>
    <select id="updatecategory" placeholder="optional"required>
    <option value="" disabled selected>No Catgory Available</option>
    </select><br>
    Product Price:<br>
    <input id="updateprice" type="number" step="0.01"required><br>
    Description:<br>
    <textarea id="updatedesc" rows="4" required></textarea><br>
    <h4>Product Levels</h4>
    Optimal Level:<br>
    <input id="updateoptimal" type="number" onchange="setminWarning()" step="1" min="0" required><br>
    Warning Level:<br>
    <input id="updatewarning" type="number" step="1" min="0" required><br>
    <h4>Image Settings</h4>
    Image:<br>
    <input type="file" id="updatefileUpload" alt="Choose Product Image" onchange="getimage(event)" ><br>
    <button id="btnupdate">Update Product</button>
  </form>
</br/>
  <button id="clear">Clear</button><br/><br/>
  </div>
  <div id="div2" class="col span_1_of_2">
    <div id="line"></div>
  <div id="tableidreborn">
    <table id="table_id" class="display" width="100%" cellspacing="0">
      <thead>
          <tr>
              <th>Name</th>
              <th style="width:70px;">Delete</th>
          </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
    </div>
  </div>
</div>
<!-- SCRIPTS HERE!!! -->
<script src=".admin/.js\inventory\add-prod.js"></script>
