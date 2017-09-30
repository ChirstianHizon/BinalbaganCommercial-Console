<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddcat.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
    </div>
</div>
<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
    <div class="table-header"><b>Category Details</b></div>
    <div class="table-container">
      <form id="newCategory" class="formcat">
        <br/>

        <b>Name:</b></br>
        <div class="input-control text" data-role="input">
          <input id="catname" type="text" required>
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br/>
        <br/>

        <b>Description:</b><br/>
        <div class="input-control textarea"
            data-role="input" data-text-auto-resize="true" data-text-max-height="150">
        <textarea id="desc" rows="8" required></textarea>
        </div>

        <br/>
        <br/>
        <button id="catbtn" class="button loading-pulse lighten primary" >Add New Category</button>
        <br/>
        <br/>
      </form>

      <form id="updateCategory" class="formcat">
        <!-- <h3>Update Category</h3>
        <div id="line"></div> -->
        <br/>
        <input readonly='true' class="nodisplay" id="upid" type="numeric" required>

        Category Name:<br/>
        <div class="input-control text" data-role="input">
          <input id="upname" type="text" required>
        </div><br/><br/>
        Category Description:<br/>
        <div class="input-control textarea"
            data-role="input" data-text-auto-resize="true" data-text-max-height="150">
            <textarea id="updesc" rows="8" required></textarea>
        </div><br/><br/>
        <button id="catbtn" class="button loading-pulse lighten primary">Update Category</button>
        <button  id="clear" onclick="return"class="button loading-pulse success">Add a New Category</button>
      </form>
    </div>
  <br/>

</div>
<div id="div2" class="col span_1_of_2">
  <div class="table-header"><b>Add New Product</b><br/></div>
  <div class="table-container">
    <div id="tableidreborn">
    <table id="table_id" class="datatable striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
      <thead>
          <tr>
              <th>Name</th>
              <th style="width:230px;"></th>
          </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>
    <br />
    <br />
    <br />
    </div>
  </div>
  </div>
</div>
<!-- SCRIPTS HERE!! -->
<script src=".admin/.js\inventory\category.js"></script>
<!-- END!! -->
