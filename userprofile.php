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
      Username:<br />
      <div class="input-control text">
        <input id="newbarcode" type="text" disabled required value="<?php echo $_SESSION['username'] ?>">
      </div><br/>

      First Name:<br />
      <div class="input-control text">
        <input id="newbarcode" type="text" disabled required  value="<?php echo $_SESSION['userfname'] ?>">
      </div><br/>

      Lastname:<br />
      <div class="input-control text">
        <input id="newbarcode" type="text" disabled required value="<?php echo $_SESSION['userlname'] ?>">
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

        <button class="button primary">Edit</button>
      </form>
      <br />
      <button class="button danger">Change Password</button>

      </div>



	</div>
	<div class="col span_1_of_2">

    <img id="image" src="images\noimage.png" style="width:250px;height:250px;background-color:white;" />
    <br />
    <div class="input-control file" data-role="input" style="width:250px">
      <input type="hidden" id="fileUpload" onchange="getimage(event)" disabled >
      <button class="button"><span class="mif-folder"></span></button>
    </div><br>
	</div>
</div>
