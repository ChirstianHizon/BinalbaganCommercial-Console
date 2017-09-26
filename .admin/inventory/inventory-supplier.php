<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddsupp.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
    </div>
</div>
<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
    <form id="newSupplier" class="formcat">
      <h3>Add New Suppliery</h3>
      <div id="line"></div>
      <br/>
      <b>Supplier Name:</b></br>
      <input id="suppname" type="text" required><br/><br/>
      <b>Supplier Description:</b><br/>
      <textarea id="suppdesc" rows="8" required></textarea><br/><br/>
      <button >Add New Supplier</button>
    </form>

    <form id="updateSupplier" class="formcat">
      <h3>Update Supplier</h3>
      <div id="line"></div>
      <br/>
      <input readonly='true' class="nodisplay" id="upid" type="numeric" required>
      Supplier Name:<br/>
      <input id="upname" type="text" required><br/><br/>
      Supplier Description:<br/>
      <textarea id="updesc" rows="8" required></textarea><br/><br/>
      <button >Update Supplier Details</button>
    </form>
    <br/>
    <button  id="clear" >Clear</button>
  </div>


<div id="div2" class="col span_1_of_2">
  <table id="table_id" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>
  </div>
</div>
<!-- SCRIPTS HERE!! -->
<script src=".admin/.js\inventory\supplier.js"></script>
<!-- END!! -->
