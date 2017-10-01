<?php
  include '..\library\config.php';
  include '..\classes\class.product.php';
  include '..\classes\class.product_log.php';

  $product_log = new Product_Log();
  $product = new Product();


  $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
  $todate = (isset($_POST['todate']) && $_POST['todate'] != '') ? $_POST['todate'] : '';
  $fromdate = (isset($_POST['fromdate']) && $_POST['fromdate'] != '') ? $_POST['fromdate'] : '';
  $type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
  $supplier = (isset($_POST['supplier']) && $_POST['supplier'] != '') ? $_POST['supplier'] : '';

  switch ($type) {
    case 0:

      break;
    case 1:
    $html="";
    $list = $product_log->getAllProductLog($fromdate,$todate,$supplier);
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){echo json_encode(array("main" =>$html));break;}
    foreach($list as $value){
      $type = "";
      switch ($value['TYPE']) {
        case null:
          $type = null;
        break;
        case 0:
          $type = "IN";
          break;
        case 1:
          $type = "OUT";
          break;
      }
      $supname = ($value['SUPNAME']== "")?$supname = "N/A":$value['SUPNAME'];

      $price = ($value['SPRICE'] == null)?$price = $value['PRICE']:$value['SPRICE'];

      $total = $price * $value['LOG_QTY'];

      $status = $value['PRD_NAME'];
      $employee = $value["EMP_LNAME"].", ".$value['EMP_FNAME'];
      $html =  $html.'<tr>'.
                    '<td>'.$value['PRD_NAME'].'</td>'.
                    '<td>'.$value['DATESTAMP'].'</td>'.
                    '<td>'.$type.'</td>'.
                    '<td>'.$employee.'</td>'.
                    '<td>'.$value['LOG_QTY'].'</td>'.
                    '<td>P '.number_format($total,2).'</td>'.
                    '<td>'.$supname.'</td>'.
                    "</tr>";
    }

    echo json_encode(array("main" => $html,"supplier"=>$supplier,"employee"=>$employee,"status"=>$status));
    break;
    case 2:
    $chart = array();
    array_push($chart,array('Date', 'IN', 'OUT'));
    $list = $product_log->getTypeCountByDate($fromdate,$todate,$supplier);

    // echo json_encode(array("main" => $list));
    // break;

    if(!$list){
      array_push($chart,array('No Data Available', 0, 0));
      echo json_encode($chart);
      break;
    }else{
        foreach($list as $value){
          array_push($chart,array($value['DATE'],(int) $value['LOG_IN'], (int)$value['LOG_OUT']));
        }
        echo json_encode($chart);
    }

    break;
    default:
        echo json_encode(array("main" => "TYPE ERROR"));
      break;
  }
