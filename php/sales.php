<?php
include '..\library\config.php';
include '..\classes\class.sales.php';
include '..\classes\class.product.php';
include '..\classes\class.orders.php';

  $sales = new Sales();
  $product = new Product();
  $order = new Order();

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
        $html ="";
        $list = $sales->getAllSales($start,$end);
        if(!$list){
          echo json_encode(array("main" => $html));
          break;}
        foreach($list as $value){
          $sales_id = $value['ID'];
          if($value['CUSTOMER'] == ''){
            $customer_id =  $value['EMPLOYEE'];
          }else{
            $customer_id = $value['CUSTOMER'];
          }
          $sales_type = $value['TYPE'];
          $sales_qty =$value['QUANTITY'];
          $sales_date = $value['DATE'];
          $sales_total = $value['TOTAL'];

          switch ($sales_type) {
            case 0:
              $sales_type = "WALK - IN";
              break;
            case 1:
              $sales_type = "PICK - UP";
              break;
            case 2:
              $sales_type = "DELIVERY";
              break;
            default:
              $sales_type = "TYPE ERROR";
              break;
          }

          $body ='<tr id="'.$value['ID'].'">'.
                    '<td id="'.$value['ID'].'" >'.$sales_id.'</td>'.
                    '<td id="'.$value['ID'].'" >'.$sales_date.'</td>'.
                    '<td id="'.$value['ID'].'" >'.$customer_id.'</td>'.
                    '<td id="'.$value['ID'].'" >'.$sales_type.'</td>'.
                    '<td id="'.$value['ID'].'" >'.$sales_qty.' item/s</td>'.
                    '<td id="'.$value['ID'].'" >P'.number_format($sales_total,2).'</td>'.
                    '<td id="'.$value['ID'].'" onclick="viewsalesList(this)" ><b class="btnview"> View  </b></td>'.
                "</tr>";
          $html = $html.$body;
        }
        echo json_encode(array("main" => $html));
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
        echo json_encode(array("main" => $html,"total" => $total,"count" => $count));
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
                    '<td id ="'.$value['ID'].'" > VIEW</td>'.
                "</tr>";

        }
        echo json_encode(array("main" => $html,"count" => $count,"totalqty" => $totalqty,"totalsales" => $totalsales));
        break;
        case 4:
        $chart = array();
        array_push($chart,array('Name', 'QTY'));
        $list = $sales->getproductsSoldByEmp($empid);
        if(!$list){
          array_push($chart,array('No Data Available', 1));
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
    }
  }
