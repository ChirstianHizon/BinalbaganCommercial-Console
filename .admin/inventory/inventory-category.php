<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddcat.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
    </div>
</div>
<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
  <form id="newCategory" class="formcat">
    <h3>Add a New Category</h3>
    <div id="line"></div>
    <br/>
    <b>Category Name:</b></br>
    <input id="catname" type="text" required><br/><br/>
    <b>Category Description:</b><br/>
    <textarea id="desc" rows="8" required></textarea><br/><br/>
    <button >Add New Category</button>
  </form>

  <form id="updateCategory" class="formcat">
    <h3>Update Category</h3>
    <div id="line"></div>
    <br/>
    <input readonly='true' class="nodisplay" id="upid" type="numeric" required>
    Category Name:<br/>
    <input id="upname" type="text" required><br/><br/>
    Category Description:<br/>
    <textarea id="updesc" rows="8" required></textarea><br/><br/>
    <button >Update Category</button>
  </form>
  <br/>
  <button  id="clear" >Clear</button>
</div>
<div id="div2" class="col span_1_of_2">
    <div id="tableidreborn">
    <table id="table_id" class="display" width="100%" cellspacing="0">
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
</div>
<!-- SCRIPTS HERE!! -->
<script src=".admin/.js\inventory\category.js"></script>
<!-- END!! -->
