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
    echo json_encode(array("main" => $html,"total" => $count));
    break;
    case 2:
    $html="";
    $count=0;
    $list = $delivery->getCompletedDelivery();
    if(!$list){
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    $html = $html.'<tr id="'.$value['del_id'].'">'.
              '<td>'.$value['order_id'].'</td>'.
              '<td>'.$value['FULLDATE'].'</td>'.
              '<td>'.$value['TIME_ELAPSED'].'</td>'.
              '<td>
              <button id="'.$value['del_id'].'" onclick="createRoute(this)">View  </button>
              </td>'.
          "</tr>";
    }
    echo json_encode(array("main" => $html,"total" => $count));
    break;
    case 3:
    $route_list = array();
    $list = $delivery->getDeliveryRoute($id);
    if(!$list){
      echo json_encode(array("COUNTER" => "0"));break;
    }
    $cnt=0;
    foreach($list as $value){
      $cnt++;
    }
    $route_list['COUNTER'] = $cnt;

    $coord = array();
    $counter=1;
    foreach($list as $value){
      // ['END',  10.194506, 122.856299, 4]
      array_push($coord,array("",$value['route_lat'],$value['route_lng'],$counter));
      $counter++;
    }
    $route_list['COORDINATES']  = $coord;
    echo json_encode($route_list);
    break;
  }

}else{
  header("location: ../index.php");
}
