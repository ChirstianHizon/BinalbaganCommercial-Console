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

  public function updateSupplier($id,$name,$desc){
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

  public function getSpecSupplier($id){
    $sql="SELECT * FROM tbl_supplier WHERE sup_id = '$id' limit 1";
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



}
