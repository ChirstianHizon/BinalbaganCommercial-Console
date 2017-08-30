<?php
class Sales{
  public $db;
  public function __construct(){
    $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if(mysqli_connect_errno()){
      echo "Database connection error.";
      exit;
    }
  }

  public function addSales($custid,$empid){
    $sql = "INSERT INTO tbl_sales(sales_datestamp,sales_timestamp,emp_id,sales_type,receive_datetimestamp)
       VALUES(NOW(),NOW(),'$empid','0',NOW())";

    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    if($result == 1){
      //GETS THE LAST ID USED IN QUERY
      $result = mysqli_insert_id($this->db);
    }
    return $result;
  }

  public function addSaleswType($orderid,$userid,$type){
    $sql = "INSERT INTO tbl_sales(sales_datestamp,sales_timestamp,cust_id,sales_type,order_id)
       VALUES(NOW(),NOW(),'$userid','$type','$orderid')";

    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    if($result == 1){
      //GETS THE LAST ID USED IN QUERY
      $result = mysqli_insert_id($this->db);
    }
    return $result;
  }

  public function addSalesList($salesid,$prdid,$prdqty){
    $sql = "INSERT INTO tbl_sales_list(prd_id,prd_qty,sales_id)
      VALUES('$prdid','$prdqty','$salesid')";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . 0);
    return $result;
  }

  public function getAllSales($start,$end){
    //TODO: CHANGE "0000-00-00 TO THE CURRENT SYSTEM DATE"
    if($start == null || $start == ""){
      $start = "0000-00-00";
    }
    if($end == null || $end == ""){
      $end = "0000-00-00";
    }
    $sql = "SELECT
            tbl_sales_list.sales_id AS ID,
            SUM(prd_qty * prd_price) AS TOTAL,
            sales_datestamp AS DATE,
            cust_id AS CUSTOMER,
            emp_id AS EMPLOYEE ,
            sales_type AS TYPE,
            COUNT(prd_qty) AS QUANTITY
            FROM tbl_sales_list
            INNER JOIN tbl_sales ON tbl_sales.sales_id = tbl_sales_list.sales_id
            INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
            LEFT OUTER JOIN tbl_order ON tbl_order.order_id = tbl_sales.order_id
            WHERE sales_datestamp >= '$start' AND sales_datestamp <= '$end'
            GROUP BY tbl_sales_list.sales_id
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

  public function getSalesSpecList($salesid){
    $sql = "SELECT
    tbl_sales_list.sales_id AS ID,
    prd_name AS NAME,
    prd_qty AS QUANTITY,
    (prd_qty * prd_price) AS SUBTOTAL
    FROM tbl_sales_list
    INNER JOIN tbl_sales ON tbl_sales.sales_id = tbl_sales_list.sales_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
    WHERE tbl_sales_list.sales_id = '$salesid'
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

  public function updateSalesReceiveDatetime($id){
    $sql = "UPDATE tbl_sales SET
    receive_datetimestamp = NOW()
    WHERE order_id = '$id'";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }

  public function getSalesId($id){
    $sql = "SELECT sales_id FROM tbl_sales WHERE order_id = '$id' limit 1";
    $result = mysqli_query($this->db,$sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['sales_id'];
    return $id;
  }


}
