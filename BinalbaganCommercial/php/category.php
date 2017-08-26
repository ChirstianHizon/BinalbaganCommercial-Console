<?php
include '..\library/config.php';
include '..\classes/class.category.php';
$category = new Category();


$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$desc = (isset($_POST['desc']) && $_POST['desc'] != '') ? $_POST['desc'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';

// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAMES

switch ($type) {
  case 1:
    echo $category->addCategory($name,$desc);
  break;
  case 2:
  echo $category->updateCategory($id,$name,$desc);

  break;
  case 3:
  # code...
  break;
  case 4:
    $list =  $category->getCategory();
    if(!$list){break;}
    foreach($list as $value){
    echo  '<tr >'.
              '<td id="'.$value['cat_id'].'" ondblclick="catselect(this)"><b>'.$value['cat_name'].'</b></td>'.
              '<td id="'.$value['cat_id'].'" ondblclick="catselect(this)" class="delete"><b> X </b></td>'.
          "</tr>";
    }
  break;
  case 5:
  $list =  $category->getSpecificCategory($id);
  if(!$list){break;}
  foreach($list as $value){
    $id = $value['cat_id'];
    $name = $value['cat_name'];
    $desc = $value['cat_desc'];
    echo json_encode(array("id"=> $id ,"name" => $name, "desc" => $desc));
  }

  break;
  case 6:
  $list =  $category->getCategory();
  if(!$list){
    echo '<option value="" disabled selected>No Category Available</option>';
    break;
  }
  foreach($list as $value){
    echo  '<option value="'.$value['cat_id'].'">'.$value['cat_name'].'</option>';
  }
  break;

  default:
  echo "TYPE ERROR";
  break;
}
