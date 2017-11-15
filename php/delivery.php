<?php
include '../library/config.php';
include '../classes/class.delivery.php';
include '../classes/class.orders.php';

$delivery = new Delivery();
$orders = new Order();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$routeid = (isset($_POST['routeid']) && $_POST['routeid'] != '') ? $_POST['routeid'] : '';


$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";

$access = md5($access);
if($access == $access_web){
  switch ($type) {
    case 0:
    $html="";
    $count=0;
    $list = $orders->getAllApprovedDeliveryOrders();
    if(!$list){
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    switch ($value['STATUS']) {
      case '1':
        $stat = '<span style="color:red"><b><h5>Waiting</h5></b></span>';
        break;
      case '100':
        $stat = '<span style="color:black"><b><h5>Finished</h5></b></span>';
        break;
      case '200':
        $stat = '<span style="color:green"><b><h5>OnGoing</h5></b></span>';
        break;
      default:
        $stat = "ERROR";
        break;
    }
    $ordid = '<span><b><h5>'.$value['ID'].'</h5></b></span>';

    $html = $html.'<tr id="'.$value['ID'].'">'.
              '<td>'.$ordid.'</td>'.
              '<td>'.$stat.'</td>'.
              // '<td>'.$value['TOTAL'].'</td>'.
              // '<td>'.$value['CUST_LNAME'].", ".$value['CUST_FNAME'].'</td>'.
              '<td>
              <button id="'.$value['ID'].'" style="width:100%" class="button primary" onclick="vieworder(this)">View</button>
              </td>'.
          "</tr>";
    }
    echo json_encode(array("main" => $html,"total" => $count));
    break;
    case 1:
    $html="";
    $count=0;
    $list = $orders->getAllApprovedDeliveryOrders2();
    if(!$list){
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    $html = $html.'<tr id="'.$value['ID'].'">'.
              '<td>'.$value['ID'].'</td>'.
              '<td>'.$value['DATE'].'</td>'.
              // '<td>'.$value['TOTAL'].'</td>'.
              '<td>'.$value['CUST_LNAME'].", ".$value['CUST_FNAME'].'</td>'.
              // '<td>
              // <button id="'.$value['ID'].'" class="button primary" onclick="vieworder(this)">View</button>
              // </td>'.
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
              <button id="'.$value['del_id'].'" class="button primary" onclick="createRoute(this)">View  </button>
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
        array_push($coord,array($counter,$value['route_lat'],$value['route_lng']));
        $counter++;
    }
    $route_list['COORDINATES']  = $coord;
    echo json_encode($route_list);
    break;
    case 4:
    $html ="";
    $count = 0;
    $letter = 'A';
    $list = $delivery->getDeliveryRoute($id);
    if(!$list){
      echo json_encode(array("main" => $html));break;
    }
    $time = "";
    foreach($list as $value){
      if($time != $value['TIMEX']){
        $time = $value['TIMEX'];
        $count++;
        $html = $html.'<tr id="'.$value['del_id'].'">'.
                  '<td>'.$count.'</td>'.
                  '<td>'.$value['TIMEX'].'</td>'.
                  '<td>'.$value['route_lat'].'</td>'.
                  '<td>'.$value['route_lng'].'</td>'.
                  '<td>
                  <button id="'.$value['route_datestamp'].'" class="button primary" onclick="viewSelectedRoute(this)">Select</button>
                  </td>'.
              "</tr>";
        $letter++;
      }
    }
    echo json_encode(array("main" => $html,"total" => $count));
    break;
    case 5:
    $route_list = array();
    $list = $delivery->getDeliverySelectedRoute($id,$routeid);
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
    case 6:
    $html ="";
    $count = 0;
    $letter = 'A';
    $orderid = "";
    $list = $orders->getOnGoingDelivery();
    if(!$list){
      echo json_encode(array("main" => $html));break;
    }
    $time = "";
    foreach($list as $value){
        // $time = $value['TIMEX'];
        $orderid = $value['ID'];
        $count++;
        $html = $html.'<tr id="'.$value['ID'].'">'.
                  '<td>'.$value['ID'].'</td>'.
                  '<td>'.$value['CUST_LNAME'].'</td>'.
                  '<td>'.$value['ADDRESS'].'</td>'.
              "</tr>";
    }
    echo json_encode(array("main" => $html,"total" => $count,"orderid" => $orderid));
  }
}else{
  header("location: ../index.php");
}
