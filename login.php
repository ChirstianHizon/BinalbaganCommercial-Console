<?php
include 'library/config.php';
include 'classes/class.employee.php';

$employee = new Employee();

if($employee->get_session()){
  header("location: index.php");
}


 ?>
<!DOCTYPE html>
<html>
  <head>
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
  </body>
</html>
