<?php
include '..\library\config.php';
include '..\classes\class.sales.php';
include '..\classes\class.orders.php';
include '..\classes\class.product.php';

  $sales = new Sales();
  $order = new Order();
  $product = new Product();


  $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
  $date = (isset($_POST['date']) && $_POST['date'] != '') ? $_POST['date'] : '';
  $type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
  $cust = (isset($_POST['cust']) && $_POST['cust'] != '') ? $_POST['cust'] : '';

  $empid = $_SESSION['userid'];
  switch ($type) {
    case 0:
    echo json_encode(array("main" => "OK"));
    break;
    case 1:
    $html ="";
    $list = $order->getAllPendingOrders();
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){
      echo json_encode(array("main" => $html));
      break;}
    foreach($list as $value){
      $order_id = $value['ID'];
      $customer_id = $value['CUSTOMER'];
      $order_type = $value['TYPE'];
      switch ($order_type) {
        case 0:
          $order_type = "PICK - UP";
          break;
        case 1:
          $order_type = "DELIVERY";
          break;
        default:
          $order_type = "TYPE ERROR";
          break;
      }
      $order_qty =$value['QUANTITY'];
      $order_date = $value['DATE'];
      $order_total = $value['TOTAL'];

      $body ='<tr id="'.$value['ID'].'">'.
                '<td id="'.$value['ID'].'" >'.$order_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_date.'</td>'.
                '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_type.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_qty.' item/s</td>'.
                '<td id="'.$value['ID'].'" >P '.number_format($order_total,2).'</td>'.
                '<td id="'.$value['ID'].'" onclick="vieworderList(this)" ><b id="view"> VIEW </b></td>'.
                '<td id="'.$value['ID'].'" onclick="approvedOrder(this)" ><b id="approve"> APPROVE  </b></td>'.
                '<td id="'.$value['ID'].'" onclick="alert(this)" ><b id="decline"> DECLINE  </b></td>'.
            "</tr>";
      $html = $html.$body;
    }
    echo json_encode(array("main" => $html));
    break;

    case 2:
    $html ="";
    $list = $order->getAllWalkinOrders();
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){
      echo json_encode(array("main" => $html));
      break;}
    foreach($list as $value){
      $order_id = $value['ID'];
      $customer_id = $value['CUSTOMER'];
      $order_type = $value['TYPE'];
      $order_receive = $value['RECEIEVE'];
      switch ($order_type) {
        case 0:
          $order_type = "PICK - UP";
          break;
        case 1:
          $order_type = "DELIVERY";
          break;
        default:
          $order_type = "TYPE ERROR";
          break;
      }
      $order_qty =$value['QUANTITY'];
      $order_date = $value['DATE'];
      $order_total = $value['TOTAL'];

      $body ='<tr id="'.$value['ID'].'">'.
                '<td id="'.$value['ID'].'" >'.$order_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_type.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_qty.' item/s</td>'.
                '<td id="'.$value['ID'].'" >P '.number_format($order_total,2).'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_receive.'</td>'.
                '<td id="'.$value['ID'].'" onclick="vieworderList(this)" ><b id="view"> View  </b></td>'.
                '<td id="'.$value['ID'].'" onclick="receiveOrder(this)" ><b id="view"> RECEIEVED  </b></td>'.
            "</tr>";
      $html = $html.$body;
    }
    echo json_encode(array("main" => $html));
    break;
    case 3:
    $count = $total = 0;
    $html ="";
    $list = $order->getSpecOrderList($id);
    // echo json_encode(array("main" => $list));
    // break;
   if(!$list){echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
      $count++;
      $total += $value['SUBTOTAL'];
      $body ='<tr>'.
                '<td>'. $value['NAME'].'</td>'.
                '<td>'. $value['PRICE'].'</td>'.
                '<td>'. $value['QTY'].'</td>'.
                '<td>'. $value['SUBTOTAL'].'</td>'.
            "</tr>";
      $html = $html.$body;
    }
    echo json_encode(array("main" => $html,"total" => $total,"count" => $count));
    break;
    case 4:
    $count = $total = 0;
    $html ="";
    $list = $order->getSpecOrder($id);
   if(!$list){echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
      switch ($value['TYPE']) {
        case 0:
          $type = "PICK - UP";
          break;
        case 1:
          $type = "DELIVERY";
          break;
        default:
          $type = "TYPE ERROR";
          break;
      }
      echo json_encode(array("main" => $html,"total" => $value['TOTAL'],"type" => $type,"customer" => $value['CUSTOMER'],"date" => $value['DATE'],"count" =>  $value['QUANTITY']));
    }
    break;
    case 5:
    $list = $order->getSpecOrderList($id);
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){echo json_encode(array("main" => $html));break;}
    //CHECK IF ALL ITEMS CAN BE PURCHASED
    $recdate = "";
    $userid= 0;
    $stat = 0;
    $avail = true;
    $salesstat="";
    foreach($list as $value){
      $userid = $order->getUserId($value['ORDERID']);
      $level = $value['LEVEL'] - $value['QTY'];
      if($value['LEVEL'] < $value['QTY']){
        $avail = $status = false;
      }
    }

    if($avail){
      $stat = 1;
      $recdate = $date;
      $salesstat = $sales->addSaleswType($id,$userid,1);
      foreach($list as $value){
        $prdid = $value['ID'];
        $level = $value['LEVEL'] - $value['QTY'];
        $sales->addSalesList($salesstat,$prdid,$value['QTY']);
        $status = $product->updateProductStock($prdid,$level,$value['QTY'],$empid,$cust,1,$salesstat);
      }
    }
    $datestat =  $order->updateOrderDate($id,$recdate);
    $update = $order->updateOrderStatus($id,$stat);
    echo json_encode(array("main" => $status,"update" => $update,"date" => $datestat,"userid" => $userid,"sales" => $salesstat));
    break;
    case 6:
    $status = $order->completeOrder($id);
    $datestat = $sales->updateSalesReceiveDatetime($id);
    echo json_encode(array("main" => $status,"date" => $datestat));
    break;
    case 11:
    $html ="";
    $list = $order->getAllPendingOrders();
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){
      echo json_encode(array("main" => $html));
      break;}
    foreach($list as $value){
      $order_id = $value['ID'];
      $customer_id = $value['CUSTOMER'];
      $order_type = $value['TYPE'];
      switch ($order_type) {
        case 0:
          $order_type = "PICK - UP";
          break;
        case 1:
          $order_type = "DELIVERY";
          break;
        default:
          $order_type = "TYPE ERROR";
          break;
      }
      $order_qty =$value['QUANTITY'];
      $order_date = $value['DATE'];
      $order_total = $value['TOTAL'];

      $body ='<tr id="'.$value['ID'].'">'.
                '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_type.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_date.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_qty.' item/s</td>'.
                '<td id="'.$value['ID'].'" >P '.number_format($order_total,2).'</td>'.
                '<td id="'.$value['ID'].'" style="border-right:1px solid black;"onclick="vieworderList(this)" ><b id="view"> VIEW </b></td>'.
                '<td id="'.$value['ID'].'" onclick="vieworderList(this)" ><b id="view"> ACCEPT </b></td>'.
                '<td id="'.$value['ID'].'" onclick="vieworderList(this)" ><b id="view"> DECLINE </b></td>'.
            "</tr>";
      $html = $html.$body;
    }
    echo json_encode(array("main" => $html));
    break;
    default:
    echo json_encode(array("main" => "TYPE ERROR"));
    break;
  }
