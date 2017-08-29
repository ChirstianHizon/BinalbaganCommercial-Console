<?php
include '..\library\config.php';
include '..\classes\class.cart.php';
include '..\classes\class.sales.php';
$sales = new Sales();
$cart = new Cart();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$prdid = (isset($_POST['prdid']) && $_POST['prdid'] != '') ? $_POST['prdid'] : '';
$qty = (isset($_POST['qty']) && $_POST['qty'] != '') ? $_POST['qty'] : '';

$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';

//TODO: CHANGE USER ID BASED ON SESSION USERID
$userid = 1001;

switch ($type) {
  case 0:
  echo "TEST ECHO 123";
  break;
  case 1:
    $list =  $cart->getCart($userid);
    if(!$list){break;}
    foreach($list as $value){
    echo  '<tr id="'.$value['cart_id'].'">'.
              '<td id="'.$value['cart_id'].'" onclick="cartselect(this)">'.$value['prd_name'].'</td>'.
              '<td id="'.$value['cart_id'].'" onclick="cartselect(this)">'.$value['cart_prd_qty'].'</td>'.
              '<td id="'.$value['cart_id'].'" ondblclick="cartdelete(this)"><b class="btndelete"> X  </b></td>'.
          "</tr>";
    }
    break;
    case 2:
      $list =  $cart->addCart($prdid,$userid,$qty);
      if($list == 1){echo $list;}
      foreach($list as $value){
        $list = $cart->specsupdateCart($value['cart_id'],$value['cart_prd_qty'] + $qty,$value['prd_id'],$userid);
      }
      echo $list;
      break;
    case 3:
      $list = $cart->getSpecificCart($id,$userid);
      if(!$list){break;}
      foreach($list as $value){
        $cart_id = $value['cart_id'];
        $user_id = $value['user_id'];
        $cart_datestamp = $value['cart_datestamp'];
        $cart_timestamp = $value['cart_timestamp'];
        $prd_name = $value['prd_name'];
        $cart_prd_qty = $value['cart_prd_qty'];
        $cart_status = $value['cart_status'];
        $prd_id = $value['prd_id'];
        $prd_price = $value['prd_price'];
        $prd_level = $value['prd_level'];

        echo json_encode(array("cartid" => $cart_id,"userid" => $user_id,"datestamp" => $cart_datestamp,"timestamp" => $cart_timestamp, "prdname" => $prd_name,"qty" => $cart_prd_qty,"status" => $cart_status,"price" => $prd_price,"level" => $prd_level,"name" => $prd_name,"prdid" => $prd_id));
      }
    break;
    case 4:
      $list =  $cart->updateCart($id,$prdid,$userid,$qty);
      if(!$list){break;}
      foreach($list as $value){
        $cart_id = $value['cart_id'];
        $user_id = $value['user_id'];
        $cart_datestamp = $value['cart_datestamp'];
        $cart_timestamp = $value['cart_timestamp'];
        $prd_name = $value['prd_name'];
        $cart_prd_qty = $value['cart_prd_qty'];
        $cart_status = $value['cart_status'];
        $prd_id = $value['prd_id'];
        $prd_price = $value['prd_price'];
        $prd_level = $value['prd_level'];

        echo json_encode(array("cartid" => $cart_id,"userid" => $user_id,"datestamp" => $cart_datestamp,"timestamp" => $cart_timestamp, "prdname" => $prd_name,"qty" => $cart_prd_qty,"status" => $cart_status,"price" => $prd_price,"level" => $prd_level,"name" => $prd_name,"prdid" => $prd_id));
      }
    break;
    case 5:
      echo $cart->deleteCart($id,$userid);
    break;
    case 6:
      $list =  $cart->getSpecificUserCart($prdid,$userid);
      if(!$list){break;}
      foreach($list as $value){
        $cart_id = $value['cart_id'];
        $user_id = $value['user_id'];
        $cart_datestamp = $value['cart_datestamp'];
        $cart_timestamp = $value['cart_timestamp'];
        $cart_prd_qty = $value['cart_prd_qty'];
        $cart_status = $value['cart_status'];
        $prd_id = $value['prd_id'];

        echo json_encode(array("cartid" => $cart_id,"userid" => $user_id,"qty" => $cart_prd_qty,"status" => $cart_status,"prdid" => $prd_id));
      }
    break;
    case 7:
    $list =  $cart->getCart($userid);
    $tbcontent = "";
    $total = 0;
    $subtotal = 0;
    if(!$list){echo json_encode(array("total" => 0));break;}
    foreach($list as $value){
      $subtotal = $value['prd_price'] * $value['cart_prd_qty'];
      $total += $subtotal;
      $text ='<tr id="'.$value['cart_id'].'">'.
                '<td id="'.$value['cart_id'].'" >'.$value['prd_name'].'</td>'.
                '<td id="'.$value['cart_id'].'" >'.$value['cart_prd_qty'].' pc/s</td>'.
                '<td id="'.$value['cart_id'].'" )"> P'.$value['prd_price'].'</td>'.
                '<td id="'.$value['cart_id'].'" )"> P'.$subtotal.'</td>'.
              '</tr>';
      $tbcontent = $tbcontent.$text;
    }
    echo json_encode(array("html" => $tbcontent,"total" => $total));
    break;
    case 8:
    $list =  $cart->getCart($userid);
    $tbcontent = "";
    $total = 0;
    $subtotal = 0;
    if(!$list){break;}
    foreach($list as $value){
      $subtotal = $value['prd_price'] * $value['cart_prd_qty'];
      $total += $subtotal;
    }
    echo json_encode(array("total" => $total));
    break;
    case 9:
    $list =  $cart->getCart($userid);
    if(!$list){break;}
    foreach($list as $value){
      $subtotal = $value['prd_price'] * $value['cart_prd_qty'];
      $total += $subtotal;
    }
    echo json_encode(array("total" => $total));
    break;
    case 10:
    $list =  $cart->getCart($userid);
    if(!$list){break;}
    $salesid =  $sales->addSales($userid);
    $count = 0;
    foreach($list as $value){
      $sales->addSalesList($salesid,$value['prd_id'],$value['cart_prd_qty']);
      $count++;
    }
    $cart->deleteALLCart($userid);
    return $count;
    break;
    default:
      echo "TYPE ERRROR";
      break;
}