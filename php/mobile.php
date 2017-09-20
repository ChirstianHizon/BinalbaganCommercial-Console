<?php
include '..\library\config.php';
include '..\classes\class.sales.php';
include '..\classes\class.product.php';
include '..\classes\class.orders.php';
include '..\classes\class.category.php';
include '..\classes\class.cart.php';
include '..\classes\class.product_log.php';
include '..\classes\class.employee.php';
include '..\classes\class.barcode.php';

$employee = new Employee();
$sales = new Sales();
$product = new Product();
$order = new Order();
$category = new Category();
$barcode = new Barcode();

$uname = (isset($_POST['uname']) && $_POST['uname'] != '') ? $_POST['uname'] : '';
$pass = (isset($_POST['pass']) && $_POST['pass'] != '') ? $_POST['pass'] : '';

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';
$query = (isset($_POST['query']) && $_POST['query'] != '') ? $_POST['query'] : '';

$access_mobile = "185f3f68183cea48c5c9fcb6cc8bcd56";
$access = md5($access);

if ($access != $access_mobile) {
    header("location: ../index.php");
} else {
    $type = (int)$type;
    switch ($type) {
    case 0:
      echo json_encode(array("main" => "TEST: ".$access));
      break;
      case 1:
        $login_status = $employee->checkLogin($uname, $pass);
        foreach ($login_status as $value) {
            if ($value['COUNT']) {
                echo json_encode(
              array(
                "main" => "OK",
                "status" => true,
                "uid"=>$value['ID'],
                "uname"=>$value['USERNAME'],
                "fname"=>$value['FNAME'],
                "lname"=>$value['LNAME'],
                "type"=>$value['TYPE'],
                "image"=>$value['IMAGE']
              )
            );
            } else {
                echo json_encode(
                array(
                "main" => "OK",
                "status" => false,
                "uname"=> $uname,
                "pass"=>$pass,
                "count"=> $value['COUNT']
              )
            );
            }
        }
        break;
    case 2:
    $paginate = (int)(isset($_POST['paginate']) && $_POST['paginate'] != '') ? $_POST['paginate'] : '';
    $prod_list = array();
    $id = (int)$id;
    if ($query != "") {
        $list =  $product->getProductByIDwQuery($id, $paginate, $query);
    } else {
        $list =  $product->getProductByID($id, $paginate);
    }
    if (!$list) {
        $prod_list['COUNTER'] = array("COUNTER" => 0);
        echo json_encode($prod_list);
        break;
    } else {
        $cnt = 0;
        foreach ($list as $value) {
            $cnt++;
        }
        $prod_list['COUNTER'] = array("COUNTER" => $cnt);
        $count = 1;
        foreach ($list as $value) {
            $level = $value['prd_level'];
            $warning = $value['prd_warning'];
            $optimal = $value['prd_optimal'];

            if ($level>=$optimal) {
                $status = "Optimal Level";
            } elseif ($level>=$warning) {
                $status = "Normal Level";
            } elseif ($level<=$warning && $level >0) {
                $status = "Warning Level";
            } elseif ($level<= 0) {
                $status = "Not Available";
            } elseif ($level< $warning || $level <$warning) {
                $status = "Data Inconsistent";
            } else {
                $status = "Data Not Available";
            }

            $prod_list[$count] =
                                array(
                                  "ID" =>$value['prd_id'],
                                  "NAME" =>$value['prd_name'],
                                  "CATEGORY" =>$value['cat_name'],
                                  "AVAIL" =>$value['prd_status'],
                                  "STATUS" =>$status
                                );
            $count++;
        }
        echo json_encode($prod_list);
    }
    break;
    case 3:
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
    case 4:
    $list = $product->getSpecificProduct($id);
    foreach ($list as $value) {
        echo json_encode(array(
        "NAME"=> $value['prd_name'],
        "DESC"=> $value['prd_desc'],
        "CATEGORY"=>$category->getName($value['cat_id']),
        "PRICE"=> $value['prd_price'],
        "DATESTAMP"=> $value['prd_datestamp'],
        "TIMESTAMP"=> $value['prd_timestamp'],
        "STATUS"=> $value['prd_status'],
        "LEVEL"=> $value['prd_level'],
        "OPTIMAL"=> $value['prd_optimal'],
        "WARNING"=> $value['prd_warning'],
        "IMAGE"=> $value['prd_image']
      ));
    }
    break;
    case 5:
    $total = 0;
    $list = $barcode->getBarcodeList($id);
    if (!$list) {
        $prod_list['COUNTER'] = 0;
        echo json_encode($prod_list);
        break;
    } else {
        $cnt = 0;
        foreach ($list as $value) {
            $cnt++;
        }
        $prod_list['COUNTER'] = $cnt;
        $count = 1;
        foreach ($list as $value) {
            $prod_list[$count] =array("CODE" =>$value['bar_code']);
            $count++;
        }
        echo json_encode($prod_list);
    }

    break;
    case 6:
    $list = $order->getDeliveryOrders();
    if (!$list) {
        $prod_list['COUNTER'] = 0;
        echo json_encode($prod_list);
        break;
    } else {
        $cnt = 0;
        foreach ($list as $value) {
            $cnt++;
        }
        $prod_list['COUNTER'] = $cnt;
        $count = 1;
        foreach ($list as $value) {
            $prod_list[$count] =
                              array(
                                "ID" =>$value['order_id'],
                                "FNAME" =>$value['cust_firstname'],
                                "LNAME" =>$value['cust_lastname'],
                                "DATE" =>$value['order_datestamp'],
                                "TIME" =>$value['order_timestamp'],
                                "STATUS" =>$value['order_status'],
                                "TYPE" =>$value['order_type']
                              );
            $count++;
        }
        echo json_encode($prod_list);
    }
    break;
    case 7:
    $list = $order->getSpecDeliveryOrders($id);
    if (!$list) {
        echo json_encode(array("main" => flase));
        break;
    } else {
        foreach ($list as $value) {
            echo json_encode(array(
          "main" => true,
          "ID" => $value['order_id'],
          "FNAME" => $value['cust_firstname'],
          "LNAME" => $value['cust_lastname'],
          "DATE" => $value['order_datestamp'],
          "TITEMS" => $value['TOTAL'],
          "TAMOUNT" => $value['TAMOUNT'],
          "STATUS" => $value['order_status']
        ));
        }
    }
    break;
    default:
      # code...
      break;
  }
}
/*
SELECT *
FROM tbl_order ordr
INNER JOIN tbl_customer cst ON cst.cust_id = ordr.cust_id
INNER JOIN tbl_order_list ordl ON ordl.order_id = ordr.order_id
INNER JOIN tbl_product pd ON pd.prd_id = ordl.prd_id
WHERE ordr.order_type = '1' AND ordr.order_status = '1'
*/
