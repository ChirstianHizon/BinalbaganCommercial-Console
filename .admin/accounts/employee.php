<link rel="stylesheet" type="text/css" href=".admin/.css/accounts/employee.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employee Accounts</h1>
    </div>
</div>

  <table id="table_id" class="table hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Type</th>
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
        <h2>Employee Details</h2>
      </div>
      <div class="modal-body"><br/>
        <img id="view-image" width="100" height="100" alt="No Image"><br/>

        <br/>
        <div id="line"></div>
        <h5>Username:</h5><div class="user_details" id="username"></div><br/>
        <h5>Firstname:</h5><div class="user_details" id="firstname"></div><br/>
        <h5>Lastname:</h5><div class="user_details" id="lastname"></div><br/>
        <h5>Emplyoee Type:</h5><div class="user_details" id="emp_type"></div><br/>
        <h5>Date Created:</h5><div class="user_details" id="datestamp"></div><br/>
      </div>
      <div class="modal-footer">
        <button onclick="closeModal()" id="btnSave">Close</button><br/>
        </form>
      </div>
    </div>
  </div>


  <div id="editaccount-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span onclick="closeModal()" class="close">&times;</span>
        <h2>Edit Employee Details</h2>
      </div>
      <div class="modal-body">

        <form id="newEmployee" onsubmit="createNewEmployee()">
          <h4>Set Employee Details</h4><div style="color:red;" id="status"></div>
          <div id="line"></div><br/>
          <b>Username:</b><br/>
          <input id="uname" type="text" placeholder="ex. Juan0011" required><br/><br/>
          <b>First Name:</b><br/>
          <input id="fname" type="text" placeholder="ex. Juan" required><br/><br/>
          <b>Last Name:</b><br/>
          <input id="lname" type="text" placeholder="ex. Dela Cruz" required><br/><br/>
          <b>Type:</b><br/>
          <select id="type" required>
            <option value="0">Administrator</option>
            <option value="1">Cashier</option>
            <option value="2">Delivery</option>
          </select><br><br/><br/>
          <h4>Profile Picture</h4>
          <div id="line"></div><br/>
          <input type="file" id="fileUpload" alt="Choose Product Image" onchange="getimage(event)" ><br/><br/>
          <div>
          <img id="edit-image" width="200" height="200" alt="No Image Found"><br/><br/>
          </div>
      </div>
      <div class="modal-footer">
        <button onclick="closeModal()" id="btnSave">Save Changes</button><br/>
        </form>
      </div>
    </div>
  </div>


<script src=".admin\.js\accounts\employee.js"></script>
