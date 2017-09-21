<?php
include '..\library\config.php';
include '..\classes\class.employee.php';
include '../classes/class.utility.php';

$utility = new Utility();
$employee = new Employee();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';

$uname = (isset($_POST['uname']) && $_POST['uname'] != '') ? $_POST['uname'] : '';
$pass = (isset($_POST['pass']) && $_POST['pass'] != '') ? $_POST['pass'] : '';
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$uname =$utility->str_insert($uname, "'", "'");
$pass =$utility->str_insert($pass, "'", "'");

//Binalbagan_Commercial_WEB_Access

//Binalbagan_Commercial_MOBILE_Access
$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";
$access_mobile = "185f3f68183cea48c5c9fcb6cc8bcd56";
$access = md5($access);
if ($access == $access_web) {
    switch ($type) {
    case 0:
      echo json_encode(array("main" => $access));
      break;
    case 1:
        $login_status = $employee->checkLogin($uname, $pass);
        foreach ($login_status as $value) {
            if ($value['COUNT']) {
                echo json_encode(array("main" => "OK","status" => true));
                $_SESSION['login']= true;
                $_SESSION['userid']= $value['ID'];
                $_SESSION['username']= $value['USERNAME'];
                $_SESSION['userfname']=$value['FNAME'];
                $_SESSION['userlname']= $value['LNAME'];
                $_SESSION['usertype']= $value['TYPE'];
                $_SESSION['userimage']= $value['IMAGE'];
            } else {
                echo json_encode(array("main" => "OK","status" => false));
            }
        }
      break;
    case 2:

        break;
    default:
      break;
  }
    //FOR MOBILE USE
} elseif ($access == $access_mobile) {
    $type = (int)$type;
    switch ($type) {
    case 0:
    echo json_encode(array("main" => $access));
    break;
    case 1:
      $login_status = $employee->checkLogin($uname, $pass);
      foreach ($login_status as $value) {
          if ($value['COUNT']) {
              echo json_encode(
            array(
              "main" => "OK",
              "status" => true,
              "uid"=>$value['ID'],
              "uname"=>$value['USERNAME'],
              "fname"=>$value['FNAME'],
              "lname"=>$value['LNAME'],
              "type"=>$value['TYPE'],
              "image"=>$value['IMAGE']
            )
          );
          } else {
              echo json_encode(
              array(
              "main" => "OK",
              "status" => false,
              "uname"=> $uname,
              "pass"=>$pass,
              "count"=> $value['COUNT']
            )
          );
          }
      }
      break;

    default:
      # code...
      break;
  }
} else {
    header("location: ../index.php");
}
