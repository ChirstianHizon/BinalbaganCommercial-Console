<?php
include '../library/config.php';
include '../classes/class.sales.php';
include '../classes/class.product.php';
include '../classes/class.orders.php';
include '../classes/class.customer.php';
include '../classes/class.employee.php';


$sales = new Sales();
$product = new Product();
$order = new Order();
$customer = new Customer();
$employee = new Employee();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$prdid = (isset($_POST['prdid']) && $_POST['prdid'] != '') ? $_POST['prdid'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$start = (isset($_POST['start']) && $_POST['start'] != '') ? $_POST['start'] : '';
$end = (isset($_POST['end']) && $_POST['end'] != '') ? $_POST['end'] : '';

$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';
$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";
$access_mobile = "185f3f68183cea48c5c9fcb6cc8bcd56";
$access = md5($access);
if($access == $access_mobile){
  $type = (int)$type;
}else if($access == $access_web){
  $empid = $_SESSION['userid'];
  switch ($type) {
    case 0:
    echo json_encode(array("main" => "OK"));
    break;
    case 1:
    $total_items = 0;
    $total_amount = 0;
    $total_trans = 0;
    $html ="";
    $list = $sales->getAllSales($start,$end);
    if(!$list){
      echo json_encode(array("main" => $html,"trans"=>$total_trans,"amount"=>$total_amount,"items"=>$total_items));
      break;}

      foreach($list as $value){
        $total_trans++;
        $sales_id = $value['ID'];
        if($value['CUSTOMER'] == 0  ){
          $customer_id = $employee->getEmplyeeName($value['EMPLOYEE']);
        }else{
          $customer_id = $customer->getCustomeName($value['CUSTOMER']);
        }
        $sales_type = $value['TYPE'];
        $sales_qty =$value['QUANTITY'];
        $sales_date = $value['DATE'];
        $sales_total = $value['TOTAL'];

        $total_items += $sales_qty;
        $total_amount += $sales_total;
        switch ($sales_type) {
          case 2:
          $sales_type = "WALK - IN";
          break;
          case 0:
          $sales_type = "PICK - UP";
          break;
          case 1:
          $sales_type = "DELIVERY";
          break;
          default:
          $sales_type = "TYPE ERROR";
          break;
        }

        $body ='<tr id="'.$value['ID'].'">'.
        '<td>'.$sales_id.'</td>'.
        '<td>'.$sales_date.'</td>'.
        '<td>'.$customer_id.'</td>'.
        '<td>'.$sales_type.'</td>'.
        '<td>'.$sales_qty.' item/s</td>'.
        '<td>P '.number_format($sales_total,2).'</td>'.
        '<td><button  id="'.$value['ID'].'" onclick="viewsalesList(this)" class="button primary">View</button></td>'.
        "</tr>";
        $html = $html.$body;
      }
      echo json_encode(array("main" => $html,"trans"=>number_format($total_trans,0),"amount"=>number_format($total_amount,2),"items"=>number_format($total_items,0)));
      break;

      case 2:
      $html ="";
      $total = $count= 0;
      $list = $sales->getSalesSpecList($id);
      if(!$list){break;}
      foreach($list as $value){
        $count++;
        $total += $value['SUBTOTAL'];
        $html = $html.'<tr id="'.$value['ID'].'">'.
        '<td>'.$value['NAME'].'</td>'.
        '<td>'.$value['QUANTITY'].'</td>'.
        '<td>'.$value['SUBTOTAL'].'</td>'.
        "</tr>";

      }
      echo json_encode(array("main" => $html,"total" => number_format($total,2),"count" => number_format($count,0)));
      break;
      case 3:
      $html =$time="";
      $total = $count= $totalqty = $totalsales = 0;
      $list = $sales->getCurrSalesListByEmp($empid);
      if(!$list){break;}
      foreach($list as $value){

        $time = $value['HOUR'];
        if($time == 0){
          $time="12 :".$value['MINUTE']." am";
        }else if($time == 12){
          $time=$time." : ".$value['MINUTE']." pm";
        }else if($time >12){
          $time = $time-12;
          $time=$time." : ".$value['MINUTE']." pm";
        }else if($time <12){
          $time=$time." : ".$value['MINUTE']." am";
        }

        $count++;
        $totalqty += $value['QTY'];
        $totalsales += $value['TOTAL'];
        $html = $html.'<tr id="'.$value['ID'].'">'.
        '<td>'.$value['ID'].'</td>'.
        '<td>'.$value['QTY'].' items/s</td>'.
        '<td> P '.$value['TOTAL'].'</td>'.
        '<td> '.$time.'</td>'.
        '<td> <button id ="'.$value['ID'].'">View</button></td>'.
        "</tr>";

      }
      echo json_encode(array("main" => $html,"count" => $count,"totalqty" => $totalqty,"totalsales" => $totalsales));
      break;
      case 4:
      $chart = array();
      array_push($chart,array('Name', 'Quantity'));
      $list = $sales->getproductsSoldByEmp("80000002");
      if(!$list){
        array_push($chart,array('No Data Available', 0));
        echo json_encode($chart);
        break;
      }else{
        foreach($list as $value){
          array_push($chart,array($value['NAME'],(int) $value['QTY']));
        }
        echo json_encode($chart);
      }
      break;
      case 5:
      $chart = array();
      array_push($chart,array('Time', 'Customer'));
      $list = $sales->getcustomerTraffic();
      if(!$list){
        array_push($chart,array('No Data Available', 0));
        echo json_encode($chart);
        break;
      }else{
        foreach($list as $value){
          $time = $value['TIME'];
          if($time == 0){
            $time="12 mid";
          }else if($time == 12){
            $time=$time." noon";
          }else if($time >12){
            $time = $time-12;
            $time=$time." pm";
          }else if($time <12){
            $time=$time." am";
          }
          array_push($chart,array($time,(int) $value['AMOUNT']));
        }
        echo json_encode($chart);
      }
      break;
      default:
      echo json_encode(array("main" => "TYPE ERROR"));
      break;
      case 6:
      $dash_data = array();
      $prod_count =  $product->getProductCount();
      $sales_total =  $sales->getTotalSales();
      $delivery_total = $order->getDeliveryCount();
      $pending_total = $order->getPendingCount();

      echo json_encode(array(
        "PRODUCT_COUNT" => $prod_count,
        "SALES_TOTAL"=> $sales_total,"DELIVERY_TOTAL"=>$delivery_total,
        "PENDING_COUNT"=>$pending_total));
        break;
        case 7:
        $chart = array();
        array_push($chart,array('Name', 'Product Sales'));
        $list = $sales->gettopProducts();
        if(!$list){
          array_push($chart,array('No Data Available', 0));
          echo json_encode($chart);
          break;
        }else{
          foreach($list as $value){
            array_push($chart,array($value['NAME'], (int)$value['COUNT']));
          }
          echo json_encode($chart);
        }
        break;
        case 8:
        $chart = array();
        array_push($chart,array('Time', 'No. of Customer on Store Hours'));
        $list = $sales->getTotalcustomerTraffic();
        if(!$list){
          array_push($chart,array('No Data Available', 0));
          echo json_encode($chart);
          break;
        }else{
          foreach($list as $value){
            $time = $value['TIME'];
            if($time == 0){
              $time="12 mid";
            }else if($time == 12){
              $time=$time." noon";
            }else if($time >12){
              $time = $time-12;
              $time=$time." pm";
            }else if($time <12){
              $time=$time." am";
            }
            array_push($chart,array($time,(int) $value['AMOUNT']));
          }
          echo json_encode($chart);
        }
        break;
        case 9:
        $chart = array();
        array_push($chart,array('Month', 'Montly sales for the Year '.DATE("Y") ));
        $list = $sales->getlatestSalesStat();
        if(!$list){
          array_push($chart,array('No Data Available', 0));
          echo json_encode($chart);
          break;
        }else{
          foreach($list as $value){
            array_push($chart,array($value['MONTH'],(int) $value['SALES']));
          }
          echo json_encode($chart);
        }
        break;
      }
    }
