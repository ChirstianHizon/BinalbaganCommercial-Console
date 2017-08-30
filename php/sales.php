<?php
include '..\library\config.php';
include '..\classes\class.sales.php';
include '..\classes\class.product.php';

  $sales = new Sales();
  $product = new Product();

  $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
  $prdid = (isset($_POST['prdid']) && $_POST['prdid'] != '') ? $_POST['prdid'] : '';
  $type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
  $start = (isset($_POST['start']) && $_POST['start'] != '') ? $_POST['start'] : '';
  $end = (isset($_POST['end']) && $_POST['end'] != '') ? $_POST['end'] : '';


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
      default:
      echo json_encode(array("main" => "TYPE ERROR"));
      break;
  }
