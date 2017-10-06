<link rel="stylesheet" type="text/css" href="css/userprofile.css" media="all" />
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">User Profile</h2>
    </div>
</div>


<!-- <h3>
  <?php
  //  echo $_SESSION['userfname']." ".$_SESSION['userlname']
   ?>
</h3>
<div id="line"></div> -->

<div class="section group">
	<div class="col span_1_of_2">
    <form>
        <input id="uid" type="hidden" disabled required value="<?php echo $_SESSION['userid'] ?>">
      Username:<br />
      <div class="input-control text">
        <input id="uname" type="text" disabled required value="<?php echo $_SESSION['username'] ?>">
      </div><br/>

      First Name:<br />
      <div class="input-control text">
        <input id="fname" type="text" disabled required  value="<?php echo $_SESSION['userfname'] ?>">
      </div><br/>

      Lastname:<br />
      <div class="input-control text">
        <input id="lname" type="text" disabled required value="<?php echo $_SESSION['userlname'] ?>">
      </div><br/>

      Usertype:<br />
      <div class="input-control text">
        <input id="newbarcode" type="text" disabled required  value="<?php

        switch($_SESSION['usertype']){
          case 0:
          echo "Administrator";
          break;
          case 1:
          echo "Cashier";
          break;
          echo "Delivery";
          case 2:
          break;
        }
        ?>">
      </div><br/><br />
      <div id="buttons">
        <button id="btnedit" class="button primary" onclick="editmode()">Edit</button>
        <button id="btnsave" class="button success" style="display:none;"onclick="save()">Save</button>
      </form>
        <button id="btncancel" class="button primary" style="display:none;"onclick="cancel()">Cancel</button>
      <br />
      <button id="changepass" class="button danger" onclick="openchangepass()">Change Password</button>

      <div id="passforms" style="display:none;">
        <form id="formsofpass">
          New Password:<br />
          <div class="input-control text">
            <input id="newpass" type="password" required>
          </div><br/>

          Confirm Password:<br />
          <div class="input-control text">
            <input id="conpass" type="password" required>
          </div><br/>
          <button id="newpass" class="button success" onclick="newpassword()">Change Password</button>
        </form>
        <button  class="button danger" onclick="cancelpass()">Cancel</button>
      </div>

      </div>



	</div>
	<div class="col span_1_of_2">

    <img id="image" src="<?php echo $_SESSION['userimage'] ?>" style="background-color:white;" />
    <br />
    <br />
    <div id="filegroup" class="input-control file" data-role="input" style="width:250px;display:none;">
      <input id="fileUpload" onchange="getimage(event)" type="file">
      <button class="button"><span class="mif-folder"></span></button>
    </div><br>
	</div>
</div>

<script src="js/userprofile.js"></script>
