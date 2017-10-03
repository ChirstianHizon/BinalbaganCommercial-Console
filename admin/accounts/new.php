<link rel="stylesheet" type="text/css" href="admin/css/accounts/new.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add New Account</h1>
    </div>
</div>


<form id="newEmployee" onsubmit="createNewEmployee()">

  <div class="section group">
  	<div class="col span_1_of_2">
      <div class="table-header"><b>Add New User</b><br/></div>
      <div class="table-container">
      <b>Username:</b><br/>
      <div class="input-control text">
        <input id="uname" type="text" placeholder="ex. Juan0011" required>
      </div><br/><br/>

      <b>Password:</b><br/>
      <div class="input-control text">
        <input id="pass" type="password" placeholder="The Longer the Better" required>
      </div><br/><br/>

      <b>Re-enter password:</b><br/>
      <div class="input-control text">
        <input id="repass" type="password" placeholder="The Longer the Better" required>
      </div><br/><br/>

      <b>First Name:</b><br/>
      <div class="input-control text">
        <input id="fname" type="text" placeholder="ex. Juan" required>
      </div><br/><br/>

      <b>Last Name:</b><br/>
      <div class="input-control text">
        <input id="lname" type="text" placeholder="ex. Dela Cruz" required>
      </div><br/><br/>

      <b>Type:</b><br/>
      <div class="input-control select">
        <select id="type" required>
          <option value="0">Administrator</option>
          <option value="1">Cashier</option>
          <option value="2">Delivery</option>
        </select>
      </div>

    </div>
  	</div>
  	<div class="col span_1_of_2">

      <div class="table-header"><b>User Image</b><br/></div>
      <div class="table-container">

      <img id="image" width="300px" height="300px">

      <div>
        <div class="input-control file" data-role="input" >
          <input type="file" id="fileUpload" alt="Choose Product Image" onchange="getimage(event)"><br/><br/>
          <button class="button"><span class="mif-folder"></span></button>
        </div>
      </div>
      <br/>

      <button id="addemp" class="button primary">Add New Employee</button>
    </div>
  	</div>
  </div>





</form>

<script src="admin/js/accounts/new.js"></script>
