<?php
include '../library/config.php';
include '../classes/class.customer.php';
include '../classes/class.utility.php';

$utility = new Utility();
$customer = new Customer();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';

$uname = (isset($_POST['uname']) && $_POST['uname'] != '') ? $_POST['uname'] : '';
$pass = (isset($_POST['pass']) && $_POST['pass'] != '') ? $_POST['pass'] : '';
$fname = (isset($_POST['fname']) && $_POST['fname'] != '') ? $_POST['fname'] : '';
$lname = (isset($_POST['lname']) && $_POST['lname'] != '') ? $_POST['lname'] : '';
$lname = (isset($_POST['lname']) && $_POST['lname'] != '') ? $_POST['lname'] : '';
$image = (isset($_POST['image']) && $_POST['image'] != '') ? $_POST['image'] : '';

// $uname =$utility->str_insert($uname, "'", "'");
// $pass =$utility->str_insert($pass, "'", "'");
// $fname =$utility->str_insert($fname, "'", "'");
// $lname =$utility->str_insert($lname, "'", "'");
// $image =$utility->str_insert($image, "'", "'");
//
// $uname =$utility->str_insert($uname, "/", "/");
// $pass =$utility->str_insert($pass, "/", "/");
// $fname =$utility->str_insert($fname, "/", "/");
// $lname =$utility->str_insert($lname, "/", "/");
// $image =$utility->str_insert($image, "/", "/");


switch ($type) {
  case 0:
    echo json_encode(array("main" => "OK"));
  break;
  case 1:
    //blank
  break;
  case 2:
    //blank
  break;
  case 3:
  $count = 0;
  $html = "";
  $list = $customer->getCustomer();
  // echo json_encode(array("main" => $list));
  // break;
 if(!$list){echo json_encode(array("main" => $html));break;}
  foreach($list as $value){
    $count++;
    
    $html = $html.$body ='<tr>'.
              '<td><b>'. $value['cust_username'].'</b></td>'.
              '<td>'. $value['cust_firstname'].'</td>'.
              '<td>'. $value['cust_lastname'].'</td>'.
              '<td>'. $value['cust_contact'].'</td>'.
              '<td class="center">'. $value['cust_datestamp'].'</td>'.
              '<td>
                <button class="button primary" id='.$value['cust_id'].' onclick="viewaccount(this)">View</button>
              </td>'.
          "</tr>";
  }
  echo json_encode(array("main" => $html,"count" => $count));
  break;
  case 4:
    $list = $customer->getSpecCustomer($id);
    if(!$list){echo json_encode(array("main" => ""));break;}
    // echo json_encode(array("main" => $list));
    // break;
     foreach($list as $value){

 

       echo json_encode(array("main" => "OK","username" => $value['cust_username'],"firstname" => $value['cust_firstname'],
                               "lastname" => $value['cust_lastname'],"contact" => $value['cust_contact'],"datestamp" => $value['cust_datestamp']
                               ,"image" => $value['cust_image']));

     }
    break;
  default:
    echo json_encode(array("main" => "TYPE ERROR"));
    break;
}
