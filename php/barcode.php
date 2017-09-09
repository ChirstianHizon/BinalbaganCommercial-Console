<?php
include '../library/config.php';
include '../classes/class.barcode.php';

$barcode = new Barcode();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";

$access = md5($access);
if($access == $access_web){
  switch ($type) {
    case 0:
      # code...
      break;
    case 1:
    $html="";
    $count=0;
    $list =  $barcode->getBarcodeList($id);
    if(!$list){
      $html = '<tr id="'.$id.'">'.
                '<td> <input id="name" type="text" required value = "test"></td>'.
                '<td>
                <button id="'.$id.'" onclick="savebarcode()"   id="save" name="s">S</button>
                <button id="'.$id.'" onclick="addbarcode(this)"    id="add" name="+">+</button>
                </td>'.
            "</tr>";
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    $html = $html.'<tr id="'.$id.'">'.
              '<td> <input id="name" type="text" required ></td>'.
              '<td>
              <button id="'.$id.'" onclick="savebarcode(this)"   id="save" name="s">S</button>
              <button id="'.$id.'" onclick="addbarcode(this)"    id="add" name="+">+</button>
              <button id="'.$id.'" onclick="addbarcode(this)"    id="add" name="+">+</button>
              </td>'.
          "</tr>";
    }
    echo json_encode(array("main" => $html,"total"=> $count));
    break;
    default:
      # code...
      break;
  }

}else{
  header("location: ../index.php");
}
