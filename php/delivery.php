<?php
include '../library/config.php';
include '../classes/class.delivery.php';
include '../classes/class.orders.php';

$delivery = new Delivery();
$orders = new Order();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";

$access = md5($access);
if($access == $access_web){
  switch ($type) {
    case 0:
    break;

    case 1:
    $html="";
    $count=0;
    $list = $orders->getAllApprovedDeliveryOrders();
    if(!$list){
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    $html = $html.'<tr id="'.$value['ID'].'">'.
              '<td>'.$value['ID'].'</td>'.
              '<td>'.$value['DATE'].'</td>'.
              '<td>'.$value['TOTAL'].'</td>'.
              '<td>'.$value['CUST_LNAME'].", ".$value['CUST_FNAME'].'</td>'.
              '<td>
              <button id="'.$value['ID'].'" onclick="vieworder(this)">View  </button>
              </td>'.
          "</tr>";
    }
    echo json_encode(array("main" => $html));
    break;

  }

}else{
  header("location: ../index.php");
}
