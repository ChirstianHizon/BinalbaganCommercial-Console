<?php
include '../library/config.php';
include '../classes/class.sales.php';
include '../classes/class.orders.php';
include '../classes/class.product.php';
include '../classes/class.customer.php';


  $sales = new Sales();
  $order = new Order();
  $product = new Product();
  $customer = new Customer();


  $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
  $date = (isset($_POST['date']) && $_POST['date'] != '') ? $_POST['date'] : '';
  $msg = (isset($_POST['msg']) && $_POST['msg'] != '') ? $_POST['msg'] : '';
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
      $customer_id = $customer->getCustomeName($value['CUSTOMER']);
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
                // '<td id="'.$value['ID'].'" >'.$order_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_date.'</td>'.
                '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_type.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_qty.' item/s</td>'.
                '<td id="'.$value['ID'].'" >P '.number_format($order_total,2).'</td>'.
                '<td>
                <button  id="'.$value['ID'].'" class="button small-button primary" onclick="vieworderList(this)">View</button>
                <button  id="'.$value['ID'].'" class="button small-button success" onclick="approvedOrder(this)">Approved</button>
                <button  id="'.$value['ID'].'" class="button small-button danger"  onclick="declineorder(this)">Decline</button>'.
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
      $order_qty = 0;
    foreach($list as $value){
      $order_id = $value['ID'];
      $customer_id = $customer->getCustomeName($value['CUSTOMER']);
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
      $order_qty = $value['QUANTITY'];
      $order_date = $value['DATE'];
      $order_total = $value['TOTAL'];

      $body ='<tr id="'.$value['ID'].'">'.
                '<td id="'.$value['ID'].'" >'.$order_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_type.'</td>'.
                '<td id="'.$value['ID'].'" >'.number_format($order_qty).' item/s</td>'.
                '<td id="'.$value['ID'].'" >P '.number_format($order_total,2).'</td>'.
                '<td id="'.$value['ID'].'" >'.$order_receive.'</td>'.
                '<td>
                <button class="button small-button primary" id="'.$value['ID'].'" onclick="vieworderList(this)">View</button>
                <button class="button small-button success" id="'.$value['ID'].'" onclick="receiveOrder(this)">Recieve</button>
                </td>'.
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
      if($value['LEVEL'] <=  0){
        $level =   '<td style="color:red">'. $value['LEVEL'].'</td>';
      }else{
        $level =  '<td style="color:green">'. $value['LEVEL'].'</td>';
      }
      $count++;
      $total += $value['SUBTOTAL'];
      $body ='<tr>'.
                '<td>'. $value['NAME'].'</td>'.
                '<td>P '. number_format($value['PRICE'],2).'</td>'.
                '<td>'. number_format($value['QTY'],0).'</td>'.
                $level.
                '<td>P '. number_format($value['SUBTOTAL'],2).'</td>'.
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
      $customer = $customer->getCustomeName($value['CUSTOMER']);
      echo json_encode(array("main" => $html,"total" => $value['TOTAL'],"type" => $type,"customer" => $customer,"date" => $value['DATE'],"count" =>  $value['QUANTITY']));
    }
    break;
    case 5:
    $html=false;
    $list = $order->getSpecOrderList($id);

    // echo json_encode(array("main" => $list));
    // break;

    if(!$list){echo json_encode(array("main" => $html));break;}
    //CHECK IF ALL ITEMS CAN BE PURCHASED
    $recdate = "";
    $userid= 0;
    $stat = 1;
    $avail = true;
    $name = "";
    $salesstat="";
    $recdate = $date;
    $status = true;
    foreach($list as $value){
      $userid = $order->getUserId($value['ORDERID']);
      $level = $value['LEVEL'] - $value['QTY'];
      if($value['LEVEL'] < $value['QTY']){
          // echo json_encode(array("main" => false,"level"=> $value['LEVEL'],"qty" =>$value['QTY'],"id"=>$value['ID']));
          $status = $avail = false;
          $name = $value['NAME'];
          // break;
      }
    }

    if(false){
      $stat = 1;
      $salesstat = $sales->addSaleswType($id,$userid,2);
      foreach($list as $value){
        $prdid = $value['ID'];
        $level = $value['LEVEL'] - $value['QTY'];
        $sales->addSalesList($salesstat,$prdid,$value['QTY']);
        $status = $product->updateProductStock($prdid,$level,$value['QTY'],$empid,1,$salesstat,"");
        $status = true;
      }
    }

    $datestat =  $order->updateOrderDate($id,$recdate);
    $update = $order->updateOrderStatus($id,$stat);
    echo json_encode(array("main" => $status,"update" => $update,"date" => $datestat,"userid" => $userid,"sales" => $salesstat,"name" => $name,"update" => $update));

    break;
    case 6:
    $status = $order->completeOrder($id);
    $datestat = $sales->updateSalesReceiveDatetime($id);

    $userid = $order->getUserId($id);
    // CREATES A NEW SALES
    $stat = 1;
    $list = $order->getSpecOrderList($id);
    $salesstat = $sales->addSaleswType($id,$userid,2);
    foreach($list as $value){
      $prdid = $value['ID'];
      $level = $value['LEVEL'] - $value['QTY'];
      $salesid = $sales->addSalesList($salesstat,$prdid,$value['QTY']);
      $status = $product->updateProductStock($prdid,$level,$value['QTY'],$empid,1,$salesstat,"");
      $status = true;
    }

    echo json_encode(array("main" => $status,"date" => $datestat,"salesid" => $salesid,"product" => $status));
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
      $customer_id = $customer->getCustomeName($value['CUSTOMER']);
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
                // '<td id="'.$value['ID'].'" onclick="vieworderList(this)" ><b id="view"> VIEW </b></td>'.
                // '<td id="'.$value['ID'].'" >
                // <b id="'.$value['ID'].'" onclick="approvedOrder(this)"> APPROVE </b>
                // <b id="'.$value['ID'].'" onclick="alert(this)"> DECLINE </b>
                // '</td>'.
            "</tr>";
      $html = $html.$body;
    }
    echo json_encode(array("main" => $html));
    break;
    case 12:
      $status = $order->declineOrder($id,$msg);
      echo json_encode(array("main" => $status));
    break;
    default:
    echo json_encode(array("main" => "TYPE ERROR"));
    break;
  }
