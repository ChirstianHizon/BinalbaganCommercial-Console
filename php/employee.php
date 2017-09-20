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
$fname = (isset($_POST['fname']) && $_POST['fname'] != '') ? $_POST['fname'] : '';
$lname = (isset($_POST['lname']) && $_POST['lname'] != '') ? $_POST['lname'] : '';
$emptype = (isset($_POST['emptype']) && $_POST['emptype'] != '') ? $_POST['emptype'] : '';
$image = (isset($_POST['image']) && $_POST['image'] != '') ? $_POST['image'] : '';

$uname =$utility->str_insert($uname, "'", "'");
$pass =$utility->str_insert($pass, "'", "'");
$fname =$utility->str_insert($fname, "'", "'");
$lname =$utility->str_insert($lname, "'", "'");
$image =$utility->str_insert($image, "'", "'");


switch ($type) {
  case 0:
    echo json_encode(array("main" => "OK"));
  break;
  case 1:
    $status = $employee->checkUname($uname);
    echo json_encode(array("main" => $status));
  break;
  case 2:
    $status = $employee->addEmployee($uname,$pass,$fname,$lname,$emptype,$image);
    echo json_encode(array("main" => $status));
  break;
  case 3:
  $count = 0;
  $html = "";
  $list = $employee->getEmployee();
  // echo json_encode(array("main" => $list));
  // break;
 if(!$list){echo json_encode(array("main" => $html));break;}
  foreach($list as $value){
    $count++;
    switch ($value['emp_type']) {
      case 0:
        $type = "Administrator";
        break;
      case 1:
        $type = "Cashier";
        break;
      case 2:
        $type = "Delivery";
        break;
      default:
        $type = "TYPE ERROR";
        break;
    }
    $html = $html.$body ='<tr>'.
              '<td><b>'. $value['emp_username'].'</b></td>'.
              '<td>'. $value['emp_first_name'].'</td>'.
              '<td>'. $value['emp_last_name'].'</td>'.
              '<td>'. $type.'</td>'.
              '<td class="center">'. $value['emp_datestamp'].'</td>'.
              '<td><div id='.$value['emp_id'].' onclick="viewaccount(this)" class="clickable"> View </div></td>'.
              '<td><div id='.$value['emp_id'].' onclick="editaccount(this)" class="clickable"> Edit </div></td>'.
          "</tr>";
  }
  echo json_encode(array("main" => $html,"count" => $count));
  break;
  case 4:
    $list = $employee->getSpecEmployee($id);
    if(!$list){echo json_encode(array("main" => ""));break;}
    // echo json_encode(array("main" => $list));
    // break;
     foreach($list as $value){

       switch ($value['emp_type']) {
         case 0:
           $type = "Administrator";
           break;
         case 1:
           $type = "Cashier";
           break;
         case 2:
           $type = "Delivery";
           break;
         default:
           $type = "TYPE ERROR";
           break;
         }

       echo json_encode(array("main" => "OK","username" => $value['emp_username'],"firstname" => $value['emp_first_name'],
                               "lastname" => $value['emp_last_name'],"type" => $type,"datestamp" => $value['emp_datestamp'],
                               "realtype" => $value['emp_type'],"image" => $value['emp_image']));

     }
    break;
  default:
    echo json_encode(array("main" => "TYPE ERROR"));
    break;
}
