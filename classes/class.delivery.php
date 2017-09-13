<?php
class Delivery{
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

  public function getCompletedDelivery(){
    $sql = "SELECT * ,
            TIMEDIFF(del_end_datestamp,del_start_datestamp) AS TIME_ELAPSED,
            DAYNAME(del_end_datestamp) AS DAY_NAME,
            DATE(del_end_datestamp) AS FULLDATE

            FROM tbl_delivery
            WHERE del_status = '200'
            ORDER BY del_end_datestamp DESC
            ";
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

  public function getDeliveryRoute($id) {
    $sql="SELECT *
    FROM tbl_route
    WHERE del_id = '$id'
    ORDER BY route_datestamp ASC
    ";
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
