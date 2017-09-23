<?php
//HELLO AGAIN

include 'library/config.php';
include 'classes/class.employee.php';

$employee = new Employee();

if($employee->get_session()){
  header("location: index.php");
}


 ?>
<!DOCTYPE html>
<html>
  <!-- <head>
    <title>BC Console Login</title>

  </head>
  <body>
  <form id="loginform">
    <input id="uname" type="text"></input><br/>
    <input id="pass" type="password"></input><br/>
    <button>Login</button>
  </form>
  <script src="js\login.js"></script>
  <script src="js\jquery.min.js"></script>
  </body> -->
  <head>
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=".main/stylesheet.css">
    <link rel="stylesheet" type="text/css" href=".main/login.css">
  </head>

  <body>

    <div id="navigation-container">

    </div>
    <div id="content-container">
      <div class="form">
        <div id="thumbnail"class="thumbnail">
          <img src="images/logo.png"/>
        </div>
        <form class="login-form" id="loginform" action="" method="POST" name="login">
          <input name="userid" id="uname"   type="text" placeholder="username"/>
          <input name="password" id="pass" type="password" placeholder="password"/>
          <button type="submit" name="submit">login</button>
        </form>
      </div>
    </div>
    <script src="js\login.js"></script>
    <script src="js\jquery.min.js"></script>
  </body>

</html>
