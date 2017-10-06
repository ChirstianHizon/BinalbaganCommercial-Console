<link rel="stylesheet" type="text/css" href="admin/css/accounts/employee.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Customer Accounts</h1>
    </div>
</div>

  <table id="table_id" class="table hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact #</th>
            <th class="center">Date Added</th>
            <th width="120px;"></th>
        </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
  </table>

  <!-- MODALS GO HERE -->

  <div id="viewaccount-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span onclick="closeModal()" class="close">&times;</span>
        <h2>Customer Details</h2>
      </div>
      <div class="modal-body"><br/>
        <img id="view-image" width="100" height="100" alt="No Image"><br/>

        <br/>
        <div id="line"></div>
        <h5>Username:</h5><div class="user_details" id="username"></div><br/>
        <h5>Firstname:</h5><div class="user_details" id="firstname"></div><br/>
        <h5>Lastname:</h5><div class="user_details" id="lastname"></div><br/>
        <h5>Contact Details:</h5><div class="user_details" id="cust_contact"></div><br/>
        <h5>Date Created:</h5><div class="user_details" id="datestamp"></div><br/>
      </div>
      <div class="modal-footer">
        <button onclick="closeModal()" id="btnSave">Close</button><br/>
        </form>
      </div>
    </div>
  </div>



<script src="admin/js/accounts/customer.js"></script>
