<?php
include '../library/config.php';
include '../classes/class.barcode.php';
include '../classes/class.utility.php';

$utility = new Utility();
$barcode = new Barcode();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$prdid = (isset($_POST['prdid']) && $_POST['prdid'] != '') ? $_POST['prdid'] : '';
$code = (isset($_POST['code']) && $_POST['code'] != '') ? $_POST['code'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';
$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';

$code =$utility->str_insert($code, "'", "'");

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
      echo json_encode(array("main" => $html));break;}
    foreach($list as $value){
    $count++;
    $html = $html.'<tr id="'.$id.'">'.
              '<td>'.$value['bar_code'].'</td>'.
              '<td>
              <button id="'.$value['bar_id'].'" class="button danger" onclick="deletebarcode(this)">Remove</button>
              </td>'.
          "</tr>";
    }
    echo json_encode(array("main" => $html,"total"=> $count));
    break;
    case 2:
    $result =  $barcode->addNewBarcode($prdid,$code);
    echo json_encode(array("main" => $result));
    break;
    case 3:
    $result =  $barcode->deleteBarcode($id);
    echo json_encode(array("main" => $result));
    break;
    case 4:
    $result =  $barcode->getProductViaBarcode($code);
    if(empty($result)){
      echo json_encode(array("main" => false));
    }else{
      echo json_encode(array("main" => true,"value" => $result));
    }

    break;
    default:
      # code...
      break;
  }

}else{
  header("location: ../index.php");
}
