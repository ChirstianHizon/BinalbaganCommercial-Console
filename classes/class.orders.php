<?php
class Order{
  public $db;
  public function __construct(){
    $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if(mysqli_connect_errno()){
      echo "Database connection error.";
      exit;
    }
  }

  public function getAllPendingOrders(){
    $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            user_id AS CUSTOMER,
            COUNT(prd_qty) AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
            WHERE order_status = '0'
            GROUP BY tbl_order_list.order_id
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
  public function getAllWalkinOrders(){
    $sql = "SELECT
            tbl_order_list.order_id AS ID,
            SUM(prd_qty * prd_price) AS TOTAL,
            order_datestamp AS DATE,
            order_type AS TYPE ,
            user_id AS CUSTOMER,
            receive_datestamp AS RECEIEVE,
            COUNT(prd_qty) AS QUANTITY
            FROM tbl_order_list
            INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
            WHERE order_status = '1' AND order_type = '0' AND receive_datestamp != '0000-00-00'
            GROUP BY tbl_order_list.order_id
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

  public function getSpecOrderList($id){
    $sql = "SELECT
    tbl_order_list.prd_id AS ID,
    order_id AS ORDERID,
    prd_name AS NAME,
    prd_price AS PRICE,
    SUM(prd_qty) AS QTY,
    SUM(prd_qty * prd_price) AS SUBTOTAL,
    prd_level AS LEVEL
    FROM tbl_order_list
    INNER JOIN tbl_product ON tbl_order_list.prd_id = tbl_product.prd_id
    WHERE tbl_order_list.order_id = '$id'
    GROUP BY tbl_product.prd_name";

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

  public function getSpecOrder($id){
  $sql = "SELECT
  user_id AS CUSTOMER,
  order_type AS TYPE,
  tbl_order_list.order_id AS ID,
  SUM(prd_qty * prd_price) AS TOTAL,
  order_datestamp AS DATE,
  COUNT(prd_qty) AS QUANTITY
  FROM tbl_order_list
  INNER JOIN tbl_order ON tbl_order.order_id = tbl_order_list.order_id
  INNER JOIN tbl_product ON tbl_product.prd_id = tbl_order_list.prd_id
  WHERE tbl_order.order_id = '$id'
  GROUP BY tbl_order_list.order_id
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

  public function updateOrderStatus($id,$stat){
    $sql = "UPDATE tbl_order SET
    order_status = '$stat'
    WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function updateOrderDate($id,$date){
    $sql = "UPDATE tbl_order SET
    receive_datestamp = '$date'
    WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function getUserId($id){
    $sql = "SELECT user_id FROM tbl_order WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql);
    $row = mysqli_fetch_assoc($result);
    $uid = $row['user_id'];
    return $uid;
  }

  public function completeOrder($id){
    $sql = "UPDATE tbl_order SET
    order_status = '100'
    WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }







}
