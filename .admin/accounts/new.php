<link rel="stylesheet" type="text/css" href=".css/accounts/new.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add New Account</h1>
    </div>
</div>


<form id="newEmployee" onsubmit="createNewEmployee()">
  <h4>Set Employee Details</h4><div style="color:red;" id="status"></div>
  <div id="line"></div><br/>
  <b>Username:</b><br/>
  <input id="uname" type="text" placeholder="ex. Juan0011" required><br/><br/>
  <b>Password:</b><br/>
  <input id="pass" type="password" placeholder="The Longer the Better" required><br/><br/>
  <b>Re-enter password:</b><br/>
  <input id="repass" type="password" placeholder="The Longer the Better" required><br/><br/>
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
  <img id="image" width="300" height="300" alt="No Image Selected"><br/><br/>
  </div>
  <button>Add New Employee</button><br/><br/><br/><br/>

</form>

<script src=".js\accounts\new.js"></script>
