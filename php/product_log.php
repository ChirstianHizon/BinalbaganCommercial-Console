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
    $list = $product_log->getAllProductLog();
    echo json_encode(array("main" => $list));
    break;

    break;
    default:
      # code...
      break;
  }
