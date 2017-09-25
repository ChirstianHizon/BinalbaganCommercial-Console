<?php
class Customer{
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

  public function getCustomeName($id){
    $sql= "SELECT cust_firstname,cust_lastname FROM tbl_customer WHERE cust_id = '$id' limit 1";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    $row = mysqli_fetch_assoc($result);
    $result = $row['cust_lastname'].", ".$row['cust_firstname'];
    return $result;
  }









}
