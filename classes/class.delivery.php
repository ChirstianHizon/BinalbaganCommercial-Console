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

  public function getAllDelivery($start,$end){
    $sql = "SELECT *
            FROM tbl_delivery
            INNER JOIN tbl_order ON tbl_delivery.order_id = tbl_order.order_id
            INNER JOIN tbl_order_list ON tbl_delivery.order_id = tbl_order_list.order_id
            WHERE order_datestamp BETWEEN '$start' AND '$end'
            ORDER BY del_id DESC
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

  public function getCompletedDelivery(){
    $sql = "SELECT * ,
            TIMEDIFF(del_end_datestamp,del_start_datestamp) AS TIME_ELAPSED,
            DAYNAME(del_end_datestamp) AS DAY_NAME,
            DATE(del_end_datestamp) AS FULLDATE

            FROM tbl_delivery
            WHERE del_status = '200'
            ORDER BY del_id DESC
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

  public function getDeliveryDetails($id){
    $sql = "SELECT
				*,
				COUNT(tbl_order_list.order_list_id) AS AMOUNT,
				SUM(tbl_order_list.prd_price * tbl_order_list.prd_qty)AS TOTAL
            FROM tbl_order
            INNER JOIN tbl_delivery ON tbl_delivery.order_id = tbl_order.order_id
            INNER JOIN tbl_customer ON tbl_order.cust_id = tbl_customer.cust_id
            LEFT OUTER JOIN tbl_address ON tbl_address.cust_id = tbl_customer.cust_id
            LEFT OUTER JOIN tbl_order_list ON tbl_order.order_id = tbl_order_list.order_id
            WHERE tbl_order.order_id = '$id'
				    ORDER BY del_id DESC
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
    $sql="SELECT *,TIMEDIFF(route_datestamp,del_start_datestamp) AS TIME_ELAPSED
    FROM tbl_route
    INNER JOIN tbl_delivery ON tbl_delivery.del_id = tbl_route.del_id
    WHERE tbl_route.del_id = '$id'
    ORDER BY route_datestamp ASC
    limit 25
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

  public function getDeliverySelectedRoute($id,$routeid) {
    $sql="SELECT *,TIMEDIFF(route_datestamp,del_start_datestamp) AS TIME_ELAPSED
    FROM tbl_route
    INNER JOIN tbl_delivery ON tbl_delivery.del_id = tbl_route.del_id
    WHERE tbl_route.del_id = '$id' AND route_datestamp  <= '$routeid'
    ORDER BY route_datestamp ASC
    limit 25
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


  public function addDelivery($orderid){
    $sql = "INSERT INTO tbl_delivery(order_id)
       VALUES('$orderid')";
     $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
     if($result == 1){
       //GETS THE LAST ID USED IN QUERY
       $result = mysqli_insert_id($this->db);
     }
     return $result;
  }

  public function addRoute($id,$lat,$lng,$date){
    $sql = "INSERT INTO tbl_route(route_lat,route_lng,route_datestamp,del_id)
       VALUES('$lat','$lng','$date','$id')";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function finishDelivery($id){
      $sql = "UPDATE tbl_delivery SET
      del_status = '200',
      del_end_datestamp = NOW()
      WHERE order_id = '$id'";
      $result = mysqli_query($this->db, $sql) or die(mysqli_error() . $sql);
      return $result;
  }

  public function getOrderId($id){
    $sql = "SELECT del_id AS ID FROM tbl_delivery WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    $row = mysqli_fetch_assoc($result);
    $result = $row['ID'];
    return $result;
  }

















}
