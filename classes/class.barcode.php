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

  public function getProductViaBarcode($query){
    $sql = "SELECT prd_name AS NAME
    FROM tbl_barcode
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_barcode.prd_id
    WHERE bar_code = '$query' AND bar_status = '1'
    limit 1
    ";
    $result = mysqli_query($this->db,$sql);
    $row = mysqli_fetch_assoc($result);
    $uid = $row['NAME'];
    return $uid;
  }

  public function addNewBarcode($prdid,$code){
    $sql = "SELECT COALESCE(COUNT(bar_id),0) AS COUNT FROM tbl_barcode WHERE bar_code = '$code'";
    $result = mysqli_query($this->db,$sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['COUNT'];
    if($count <= 0 ){
      $sql = "INSERT INTO tbl_barcode(bar_code,prd_id)
         VALUES('$code','$prdid')";
      $result = mysqli_query($this->db,$sql) or die(mysqli_error() . "CLASS ERROR");
      return $result;
    }else{
      return false;
    }

  }

  public function deleteBarcode($id){
    $sql = "UPDATE tbl_barcode SET
    bar_status = '0'
    WHERE bar_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . "CLASS ERROR");
    return $result;
  }




}
