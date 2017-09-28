<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddprod.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
</div>

<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
  <!-- <div id="line"></div> -->
  <div class="table-header"><b>Add New Product</b><br/></div>
  <div class="table-container">
  <form id="newProduct" >
    <h4>Details</h4>
    <div id="line"></div><br/>

    Name<br>
    <div class="input-control text" data-role="input">
      <input type="text" id="newname" placeholder="Enter Product Name"required>
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div><br>

    Category<br>
    <div class="input-control select" >
      <select id="category" placeholder="optional"required>
      <option value="" disabled selected>No Catgory Available</option>
      </select>
    </div><br>

    Price<br>
    <div class="input-control text">
      <input id="price" type="number" step="0.01" min="1"required><br>
    </div><br>


    Description:<br>
    <div class="input-control textarea"
        data-role="input" data-text-auto-resize="true" data-text-max-height="150">
        <textarea id="desc" required></textarea>
    </div><br>



    <br/>
    <h4>Levels</h4>
    <div id="line"></div><br/>


    Available Stock:<br>
    <div class="input-control text">
      <input id="level" type="number" step="1"  min="0" required>
    </div><br>


    Optimal Level:<br>
    <div class="input-control text">
      <!-- <input id="newoptimal" type="number" step="1" min="0" onchange="setminWarning()" required><br> -->
      <input id="newoptimal" type="number" step="1" min="0" required>
    </div><br>


    Warning Level:<br>
    <div class="input-control text">
      <input id="warning" type="number" step="1" min="0" required>
    </div><br>

    Image:<br>
    <div class="input-control file" data-role="input">
    <input type="file" id="fileUpload" alt="Choose Product Image" onchange="getimage(event)" >
    <button class="button"><span class="mif-folder"></span></button>
    </div><br>


    <button id="btnadd" class="button loading-pulse lighten primary">Add New Product</button>

  </form>
  <!--  -->

  <form id="updateProduct">
    <input class="nodisplay" id="updateid" type="text" name="firstname" required>
    <input class="nodisplay" id="updateimglink" type="text" name="firstname" required>
    <h4>Product Details</h4>
    <div id="line"></div><br/>

    Name:<br>
    <div class="input-control text">
      <input id="updatename" type="text" name="firstname" required>
    </div><br>

    Category:<br>
    <div class="input-control select" >
      <select id="updatecategory" placeholder="optional"required>
      <option value="" disabled selected>No Catgory Available</option>
      </select>
    </div><br>

    Price:<br>
    <div class="input-control text">
      <input id="updateprice" type="number" step="0.01"required>
    </div><br>

    Description:<br>
    <div class="input-control textarea"
        data-role="input" data-text-auto-resize="true" data-text-max-height="150">
        <textarea id="updatedesc" rows="4" required></textarea>
    </div><br>


    <h4>Product Levels</h4>

    Optimal Level:<br>
    <div class="input-control text">
    <input id="updateoptimal" type="number" onchange="setminWarning()" step="1" min="0" required>
    </div><br>

    Warning Level:<br>
    <div class="input-control text">
    <input id="updatewarning" type="number" step="1" min="0" required>
    </div><br>

    <h4>Image Settings</h4>
    Image:<br>
    <div class="input-control file" data-role="input">
      <input type="file" id="updatefileUpload" alt="Choose Product Image" onchange="getimage(event)" >
      <button class="button"><span class="mif-folder"></span></button>
    </div><br>


    <button id="btnupdate" class="button loading-pulse bg-green primary">Update</button>

    <br />
    <br />
    <button id="clear" class="button warning">Add New Product</button>
  </form>
  </br/>

    </div>
  </div>
  <div id="div2" class="col span_1_of_2">
    <div class="table-header"><b>Product List</b></div>
    <div class="table-container">
    <table id="table_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
      <thead>
          <tr>
              <th>Name</th>
              <th style="width:185px;"></th>
          </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
    <br />
    <br />
    </div>
  </div>
</div>
<!-- SCRIPTS HERE!!! -->
<script src=".admin/.js\inventory\add-prod.js"></script>
