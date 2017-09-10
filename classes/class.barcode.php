<?php
class Barcode{
  public $db;
  public function __construct(){
    $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if(mysqli_connect_errno()){
      echo "Database connection error.";
      exit;
    }
  }

  public function test(){
    return "CLASS OK";
  }

  public function getBarcodeList($id){
    $sql = "SELECT *
    FROM tbl_barcode
    WHERE prd_id = '$id' AND bar_status = '1'
    ";
    $result = mysqli_query($this->db,$sql);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
      }
      if(empty($list)){return false;}
      return $list;
    }else {
      return $result;
    }
  }

  public function addNewBarcode($prdid,$code){
    $sql = "INSERT INTO tbl_barcode(bar_code,prd_id)
       VALUES('$code','$prdid')";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . "CLASS ERROR");
    return $result;
  }

  public function deleteBarcode($id){
    $sql = "UPDATE tbl_barcode SET
    bar_status = '0'
    WHERE bar_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . "CLASS ERROR");
    return $result;
  }




}
