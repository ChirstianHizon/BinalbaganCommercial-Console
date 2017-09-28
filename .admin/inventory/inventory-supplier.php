<link rel="stylesheet" type="text/css" href=".admin/.css/inventory/inventoryaddsupp.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Suppliers</h1>
    </div>
</div>
<div class="section group">
  <!-- FORMS -->
  <div id="div1" class="col span_1_of_2">
    <div class="table-header"><b>Supplier Details</b></div>
    <div class="table-container">
    <form id="newSupplier" class="formcat">
      <!-- <h3>Add New Suppliery</h3>
      <div id="line"></div> -->
      <!-- <br/> -->
      <b>Supplier Name:</b></br>
      <div class="input-control text" data-role="input">
        <input id="suppname" type="text" required>
      </div><br/><br/>
      <b>Supplier Description:</b><br/>
      <div class="input-control textarea"
          data-role="input" data-text-auto-resize="true" data-text-max-height="150">
        <textarea id="suppdesc"required></textarea>
      </div><br/><br/>
      <button id="supbtn" class="button loading-pulse primary">Add New Supplier</button>
    </form>

    <form id="updateSupplier" class="formcat">
      <!-- <h3>Update Supplier</h3>
      <div id="line"></div> -->
      <!-- <br/> -->
      <input readonly='true' class="nodisplay" id="upid" type="numeric" required>
      Supplier Name:<br/>
      <div class="input-control text" data-role="input">
        <input id="upname" type="text" required>
      </div><br/><br/>

      Supplier Description:<br/>
      <div class="input-control textarea"
          data-role="input" data-text-auto-resize="true" data-text-max-height="150">
      <textarea id="updesc" rows="8" required></textarea>
      </div><br/><br/>
      <button id="supbtn" class="button loading-pulse primary">Update Supplier Details</button>
      <button  id="clear" onclick="return" class="button loading-pulse success" >Close</button>
    </form>
    <br/>

    </div>
  </div>


<div id="div2" class="col span_1_of_2">
  <div class="table-header"><b>Supplier Details</b></div>
  <div class="table-container">
  <table id="table_id" class="datatable striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th style="width:210px;"></th>
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
<!-- SCRIPTS HERE!! -->
<script src=".admin/.js\inventory\supplier.js"></script>
<!-- END!! -->
