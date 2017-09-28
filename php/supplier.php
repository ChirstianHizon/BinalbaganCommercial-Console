<?php
include '..\library\config.php';
include '..\classes\class.supplier.php';

$supplier = new Supplier();

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$type = (isset($_POST['type']) && $_POST['type'] != '') ? $_POST['type'] : '';

$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$desc = (isset($_POST['desc']) && $_POST['desc'] != '') ? $_POST['desc'] : '';

$access = (isset($_POST['access']) && $_POST['access'] != '') ? $_POST['access'] : '';
$access_web = "bd31b73daa1b64f0f2f6044a4fe0bc98";

$access = md5($access);
if($access != $access_web){
  header("location: ../index.php");
}else{
  switch ($type) {
    case 0:
      echo json_encode(array("main" => "OK"));
    break;
    case 1:
      $html="";
      $list = $supplier->getAllSupplier();
      if(!$list){break;}
      foreach($list as $value){
        $in = $value['sup_name'];
        $out = $out = strlen($in) > 30 ? substr($in,0,30)."..." : $in;
        $html.= '<tr>'.
                  '<td><b>'.$out.'</b></td>'.
                  '<td>
                  <button id="'.$value['sup_id'].'" onclick="selectSupplier(this)" class="button primary">Edit</button>
                    <button id="'.$value['sup_id'].'" onclick="deleteSupplier(this)" class="button danger">Delete</button>
                  </td>'.
                "</tr>";
      }
      echo json_encode(array("main" => $html));
    break;
    case 2:
      $list = $supplier->getAllSupplier();
      if(!$list){break;}
      foreach($list as $value){
        $in = $value['sup_name'];
        echo json_encode(array("main" => true,"id"=>$id,"name"=> $in,"desc" =>$value['sup_desc']));
        break;
      }
    break;
    case 3:
      $result = $supplier->updateSupplier($id,$name,$desc);
      echo json_encode(array("main"=>$result));
    break;
    case 4:
      $result = $supplier->addSupplier($name,$desc);
      echo json_encode(array("main"=>$result));
    break;
    case 5:
      $result = $supplier->deleteSupplier($id);
      echo json_encode(array("main"=>$result));
    break;
    case 6:
    $list =  $supplier->getAllSupplier();
    if(!$list){
      echo json_encode(array("main"=> '<option value="" disabled selected>No Category Available</option>'));
      break;
    }
    $html = "";
    foreach($list as $value){
    $html .='<option value="'.$value['sup_id'].'">'.$value['sup_name'].'</option>';
    }
    echo json_encode(array("main"=> $html));
    break;
  }
}
