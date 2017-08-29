<?php
include '../library/config.php';
include '../classes/class.product.php';
$product = new Product();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';

$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$desc = (isset($_POST['desc']) && $_POST['desc'] != '') ? $_POST['desc'] : '';
$category = (isset($_POST['category']) && $_POST['category'] != '') ? $_POST['category'] : '';
$price = (isset($_POST['price']) && $_POST['price'] != '') ? $_POST['price'] : '';

$level = (isset($_POST['level']) && $_POST['level'] != '') ? $_POST['level'] : '';
$optimal = (isset($_POST['optimal']) && $_POST['optimal'] != '') ? $_POST['optimal'] : '';
$warning = (isset($_POST['warning']) && $_POST['warning'] != '') ? $_POST['warning'] : '';

$barcode = (isset($_POST['barcode']) && $_POST['barcode'] != '') ? $_POST['barcode'] : '';
$image = (isset($_POST['image']) && $_POST['image'] != '') ? $_POST['image'] : '';

$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$add = (isset($_POST['add']) && $_POST['add'] != '') ? $_POST['add'] : '';

$empid = $_SESSION['userid'];
// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAME ONLY
// 7 - RETRIEVE NAME & STATUS
// 8 - UPDATE STOCK
// 10 - RETRIEVE W/ ALL DATA

switch ($type) {
  case 1:
    if ($image === '') {
      $image = "https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca";
    }
    echo $product->addProduct($name,$desc,$price,$category,$level,$optimal,$warning,$image,$category);
  break;
  case 2:
    echo $product->updateProduct($id,$name,$desc,$price,$category,$optimal,$warning,$image);
  break;
  case 4:
  $list = $product->getProduct();
  if(!$list){break;}
  foreach($list as $value){
  echo  '<tr id="'.$value['prd_id'].'" ondblclick="prodselect(this)">'.
            "<td>".$value['prd_name']."</td>".
            '<td><b id="'.$value['prd_id'].'" ondblclick="alert(this)" class="btndelete"> X  </b></td>'.
        "</tr>";
  }
  break;
  case 5:
  $list =  $product->getSpecificProduct($id);
  if(!$list){break;}
  foreach($list as $value){
    $id = $value['prd_id'];
    $name = $value['prd_name'];
    $desc = $value['prd_desc'];
    $cat = $value['cat_id'];
    $price = $value['prd_price'];
    $optimal = $value['prd_optimal'];
    $warning = $value['prd_warning'];
    $img = $value['prd_image'];
    echo json_encode(array("id"=> $id ,"name" => $name, "desc" => $desc ,"price" => $price, "optimal" => $optimal, "warning" => $warning, "image" => $img, "category" => $cat ));
  }
  break;
  case 6:
  $list = $product->getProduct();
  if(!$list){break;}
  foreach($list as $value){
  echo  '<tr id="'.$value['prd_id'].'" ondblclick="prodselect(this)">'.
            '<td><b class="clickable" id="'.$value['prd_id'].'">'.$value['prd_name'].'</b></td>'.
        "</tr>";
  }
  break;
  case 7:
  $list =  $product->getSpecificProduct($id);
  if(!$list){break;}
  foreach($list as $value){
    $id = $value['prd_id'];
    $name = $value['prd_name'];
    $level = $value['prd_level'];

    $warning = $value['prd_warning'];
    $optimal = $value['prd_optimal'];

    if($level>=$optimal){
      $status = "Optimal Level";
    }else if($level>=$warning){
      $status = "Normal Level";
    }else if($level<=$warning && $level >0){
      $status = "Warning Level";
    }else if($level<= 0){
      $status = "Not Available";
    }else if($level< $warning || $level <$warning){
      $status = "Data Inconsistent";
    }else {
      $status = "Data Not Available";
    }

    echo json_encode(array("id"=> $id ,"name" => $name, "level" => $level ,"status" => $status ));
  }
  break;
  case 8:
  $curr = $level;
  $level = $add + $level;
  echo $product->updateProductStock($id,$level,$curr,$empid,null,0,null);
  break;

  case 9:
  $list = $product->getProductwCategory();
  if(!$list){break;}
  foreach($list as $value){
    $level = $value['prd_level'];

    $warning = $value['prd_warning'];
    $optimal = $value['prd_optimal'];

    if($level>=$optimal){
      $status = "Optimal Level";
    }else if($level>=$warning){
      $status = "Normal Level";
    }else if($level<=$warning && $level >0){
      $status = "Warning Level";
    }else if($level<= 0){
      $status = "Not Available";
    }else if($level< $warning || $level <$warning){
      $status = "Data Inconsistent";
    }else {
      $status = "Data Not Available";
    }

  echo  '<tr id="'.$value['prd_id'].'" ondblclick="prodselect(this)">'.
            "<td>".$value['prd_name']."</td>".
            "<td>".$value['cat_name']."</td>".
            "<td>".$value['prd_price']."</td>".
            "<td>".$value['prd_level']."</td>".
            "<td>".$status."</td>".
        "</tr>";
  }
  break;

  case 10:
  $list = $product->getSpecificProductwCategory($id);
  if(!$list){break;}
  foreach($list as $value){
    $id = $value['prd_id'];
    $name = $value['prd_name'];
    $desc = $value['prd_desc'];
    $cat = $value['cat_name'];
    $price = $value['prd_price'];
    $optimal = $value['prd_optimal'];
    $warning = $value['prd_warning'];
    $img = $value['prd_image'];
    $date = $value['prd_datestamp'];
    $time = $value['prd_timestamp'];
    $level = $value['prd_level'];

    if($level>=$optimal){
      $status = "Optimal Level";
    }else if($level>=$warning){
      $status = "Normal Level";
    }else if($level<=$warning && $level >0){
      $status = "Warning Level";
    }else if($level<= 0){
      $status = "Not Available";
    }else if($level< $warning || $level <$warning){
      $status = "Data Inconsistent";
    }else {
      $status = "Data Not Available";
    }

    echo json_encode(array("level" => $level,"time" => $time,"id"=> $id ,"name" => $name, "desc" => $desc ,"price" => $price, "optimal" => $optimal, "warning" => $warning, "image" => $img, "category" => $cat ,"status" => $status,"date" => $date,));
  }
  break;

  case 11:
  $list = $product->getProductwCategory();
  if(!$list){break;}
  foreach($list as $value){
    if($value['prd_level'] <= 0){
      $status = "zero";
    }else{
      $status = "ok";
    }
  echo  '<tr id="'.$status.'" >'.
            "<td>".$value['prd_name']."</td>".
            "<td>".$value['cat_name']."</td>".
            "<td>₱ ".$value['prd_price']."</td>".
            '<td id="'.$value['prd_id'].'" onclick="prodselect(this)"><b class="btnplus"> +  </b></td>'.
        "</tr>";
  }
  break;


  default:
    echo "TYPE ERROR";
  break;
}
