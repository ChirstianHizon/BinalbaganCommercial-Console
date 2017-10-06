<?php
class Supplier{
  public $db;
  public function __construct(){
    $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if(mysqli_connect_errno()){
      echo "Database connection error.";
      exit;
    }
  }

  public function addSupplier($name,$desc){
    $name = mysqli_real_escape_string($this->db,$name);
    $desc = mysqli_real_escape_string($this->db,$desc);

    $sql="INSERT INTO tbl_supplier(sup_name,sup_desc)
    VALUES('$name','$desc')";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    if($result == 1){
      //GETS THE LAST ID USED IN QUERY
      $result = mysqli_insert_id($this->db);
    }
    return $result;
  }

  public function getAllSupplier(){
    $sql="SELECT * FROM tbl_supplier WHERE sup_status = '1'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getSpecSupplier($id){
    $sql="SELECT * FROM tbl_supplier WHERE sup_status = '1'AND sup_id = '$id' limit 1";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function updateSupplier($id,$name,$desc){
    $name = mysqli_real_escape_string($this->db,$name);
    $desc = mysqli_real_escape_string($this->db,$desc);

    $sql = "UPDATE tbl_supplier SET
    sup_name = '$name',
    sup_desc = '$desc'
    WHERE sup_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function deleteSupplier($id){
    $sql = "UPDATE tbl_supplier SET
    sup_status = '0'
    WHERE sup_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function countSupplierPrice($id,$prdid){
      $sql="SELECT COALESCE(COUNT(*),0)AS COUNTER FROM tbl_supplier_prices WHERE sup_id = '$id' AND prd_id = '$prdid' limit 1";
      $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
      $row = mysqli_fetch_assoc($result);
      $result = $row['COUNTER'];
      if($result == 0){
        return true;
      }else{
        return false;
      }
  }

  public function getSpecSupplierPrice($id,$prdid){
    $sql="SELECT * FROM tbl_supplier_prices
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_supplier_prices.prd_id
    WHERE tbl_supplier_prices.prd_id = '$prdid' AND sup_id = '$id' limit 1";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getSpecSupplierPriceList($id){
    $sql="SELECT * FROM tbl_supplier_prices
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_supplier_prices.prd_id
    WHERE sup_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function addSupplierPrice($id,$prdid,$price){
    $sql="INSERT INTO tbl_supplier_prices(sup_id,prd_id,sprice_price)
    VALUES('$id','$prdid','$price')";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    if($result == 1){
      //GETS THE LAST ID USED IN QUERY
      $result = mysqli_insert_id($this->db);
    }
    return $result;
  }

  public function updateSupplierPrice($id,$prdid,$price){

    $price = mysqli_real_escape_string($this->db,$price);

    $sql = "UPDATE tbl_supplier_prices SET
    sprice_price = '$price'
    WHERE sup_id = '$id' AND prd_id = '$prdid'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

}
