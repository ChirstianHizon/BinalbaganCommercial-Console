<?php
include '../library/config.php';
include '../classes/class.product.php';
include '../classes/class.utility.php';
$product = new Product();
$utility = new Utility();

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
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$supplier = (isset($_POST['supplier']) && $_POST['supplier'] != '') ? $_POST['supplier'] : '';


$name =$utility->str_insert($name, "'", "'");
$desc =$utility->str_insert($desc, "'", "'");
$category =$utility->str_insert($category, "'", "'");
$barcode =$utility->str_insert($barcode, "'", "'");
$image =$utility->str_insert($image, "'", "'");


// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAME ONLY
// 7 - RETRIEVE NAME & STATUS
// 8 - UPDATE STOCK
// 10 - RETRIEVE W/ ALL DATA
$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";
$access_mobile = "185f3f68183cea48c5c9fcb6cc8bcd56";
$access = md5($access);
if($access == $access_mobile){


}else if($access == $access_web){
  $empid = $_SESSION['userid'];
  switch ($type) {
    case 0:

    break;
    case 1:
      if ($image === '') {
        $image = "https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca";
      }
      $result = $product->addProduct($name,$desc,$price,$category,$level,$optimal,$warning,$image,$category);
      echo json_encode(array("main" => $result));
    break;
    case 2:
      echo $product->updateProduct($id,$name,$desc,$price,$category,$optimal,$warning,$image);
    break;
    case 4:
    $list = $product->getProduct();
    if(!$list){break;}
    foreach($list as $value){
    echo  '<tr>'.
              "<td>".$value['prd_name']."</td>".
              '<td>
              <button id="'.$value['prd_id'].'" style="width:75px;" onclick="prodselect(this)" class="button primary">Edit</button>
              <button id="'.$value['prd_id'].'" style="width:75px;" onclick="alert(this)" class="button danger">Delete</button>
              </td>'.
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
    echo  '<tr>'.
              '<td>
                <b class="clickable" id="'.$value['prd_id'].'">'.$value['prd_name'].'</b>
              </td>'.
              '<td>
                <button class="button primary" id="'.$value['prd_id'].'" onclick="prodselect(this)">Select</button>
              </td>'.
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
    echo $product->updateProductStock($id,$level,$curr,$empid,0,0,$supplier);
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

    echo  '<tr>'.
              "<td>".$value['prd_name']."</td>".
              // "<td>".$value['cat_name']."</td>".
              // "<td>".$value['prd_price']."</td>".
              // "<td>".$value['prd_level']."</td>".
              '<td><button  id="'.$value['prd_id'].'" onclick="prodselect(this)" >View</button></td>'.
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
      if($value['prd_level'] != 0){
        echo  '<tr id="'.$status.'" >'.
                  "<td>".$value['prd_name']."</td>".
                  "<td>".$value['cat_name']."</td>".
                  "<td>₱ ".$value['prd_price']."</td>".
                  '<td id="'.$value['prd_id'].'" onclick="prodselect(this)"><b class="btnplus"> +  </b></td>'.
              "</tr>";
      }

    }
    break;
    case 12:
    $html="";
    $list = $product->getProduct();
    if(!$list){break;}
    foreach($list as $value){
    $html= $html.'<tr>'.
                  '<td><b>'.$value['prd_name'].'</b></td>'.
                  '<td><button id="'.$value['prd_id'].'" onclick="prodselect(this)" class="button primary"> Select </button></td>'.
                  "</tr>";
    }
    echo json_encode(array("main" => $html));
    break;
    case 13:
    $html="";
    $list = $product->getWarningProducts();
    if(!$list){break;}
    foreach($list as $value){
    $html= $html.'<tr id="'.$value['prd_id'].'">'.
                  '<td>'.$value['prd_name'].'</td>'.
                  '<td>'.$value['cat_name'].'</td>'.
                  '<td>'.$value['prd_level'].'</td>'.
                  '<td>'.'<button class="button primary" onclick="btnupdate('.$value['prd_id'].')">Update</button>'.'</td>'.
                  "</tr>";
    }
    echo json_encode(array("main" => $html));
    break;
    case 14:



    break;
    default:
      echo "TYPE ERROR";
    break;
  }
}else{
  header("location: ../index.php");
}
