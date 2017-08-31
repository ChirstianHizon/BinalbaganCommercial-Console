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

  switch ($type) {
    case 0:

      break;
    case 1:
    $html="";
    $list = $product_log->getAllProductLog($fromdate,$todate);
    // echo json_encode(array("main" => $list));
    // break;
    if(!$list){echo json_encode(array("main" => ""));break;}
    foreach($list as $value){
      $type = "";
      switch ($value['TYPE']) {
        case 0:
          $type = "IN";
          break;
        case 1:
          $type = "OUT";
          break;
      }
      $employee = $value["EMP_LNAME"].", ".$value['EMP_FNAME'];
      $html = $html.'<tr id="'.$value['LOG_ID'].'">'.
                  '<td>'.$value['PRD_NAME'].'</td>'.
                  '<td>'.$value['DATESTAMP'].'</td>'.
                  '<td>'.$type.'</td>'.
                  '<td>'.$employee.'</td>'.
                  '<td>'.$value['LOG_QTY'].'</td>'.
                  "</tr>";
    }

    echo json_encode(array("main" => $html));
    break;
    case 2:
    $chart = array();
    array_push($chart,array('Date', 'IN', 'OUT'));
    $list = $product_log->getTypeCountByDate($fromdate,$todate);
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
