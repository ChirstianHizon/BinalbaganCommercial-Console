<?php
include '..\library\config.php';
include '..\classes\class.employee.php';

$employee = new Employee();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';

$uname = (isset($_POST['uname']) && $_POST['uname'] != '') ? $_POST['uname'] : '';
$pass = (isset($_POST['pass']) && $_POST['pass'] != '') ? $_POST['pass'] : '';

switch ($type) {
  case 0:
    echo json_encode(array("main" => "OK"));
    break;
  case 1:
      $login_status = $employee->checkLogin($uname,$pass);
      foreach($login_status as $value){

        if($value['COUNT']){
          echo json_encode(array("main" => "OK","status" => true));
          $_SESSION['login']= true;
          $_SESSION['userid']= $value['ID'];
          $_SESSION['username']= $value['USERNAME'];
          $_SESSION['userfname']=$value['FNAME'];
          $_SESSION['userlname']= $value['LNAME'];
          $_SESSION['usertype']= $value['TYPE'];
          $_SESSION['userimage']= $value['IMAGE'];
        }else{
          echo json_encode(array("main" => "OK","status" => false));
        }

      }
    break;

  default:
    break;
}
