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
    tbl_sales.cust_id AS CUSTOMER,
    emp_id AS EMPLOYEE ,
    sales_type AS TYPE,
    COUNT(prd_qty) AS QUANTITY
    FROM tbl_sales_list
    INNER JOIN tbl_sales ON tbl_sales.sales_id = tbl_sales_list.sales_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
    LEFT OUTER JOIN tbl_order ON tbl_order.order_id = tbl_sales.order_id
    WHERE sales_datestamp >= '$start' AND sales_datestamp <= '$end'
    GROUP BY tbl_sales_list.sales_id
    ORDER BY tbl_sales_list.sales_id DESC
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

  public function getCurrSalesListByEmp($empid){
    $sql = "SELECT
    tbl_sales.sales_id AS ID,sum(prd_qty) AS QTY,sum(prd_price*prd_qty) AS TOTAL,
    EXTRACT(HOUR FROM sales_timestamp) AS HOUR,
    EXTRACT(MINUTE FROM sales_timestamp) AS MINUTE
    FROM tbl_sales
    INNER JOIN tbl_sales_list ON tbl_sales_list.sales_id = tbl_sales.sales_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
    WHERE emp_id = '$empid' AND DATE(sales_datestamp)=CURDATE()
    GROUP BY tbl_sales.sales_id";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getproductsSoldByEmp($empid){
    $sql="SELECT
    tbl_product.prd_id AS ID,tbl_product.prd_name AS NAME,sum(prd_qty) AS QTY
    FROM tbl_sales
    INNER JOIN tbl_sales_list ON tbl_sales_list.sales_id = tbl_sales.sales_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
    WHERE emp_id = '$empid' AND DATE(sales_datestamp)=CURDATE()
    GROUP BY tbl_product.prd_id
    ORDER BY prd_qty DESC
    limit 10";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getcustomerTraffic(){
    $sql ="SELECT
    COUNT(tbl_sales.sales_id) AS AMOUNT,
    EXTRACT(HOUR FROM sales_timestamp) AS TIME
    FROM tbl_sales
    WHERE DATE(sales_datestamp)=CURDATE() AND sales_type = '0'
    GROUP BY EXTRACT(HOUR FROM sales_timestamp)
    ORDER BY sales_timestamp ASC
    ";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getTotalSales(){
    $sql = "SELECT
    COALESCE(SUM(prd_qty * prd_price),0.00) AS TOTAL
    FROM tbl_sales_list
    INNER JOIN tbl_sales ON tbl_sales.sales_id = tbl_sales_list.sales_id
    INNER JOIN tbl_product ON tbl_product.prd_id = tbl_sales_list.prd_id
    -- WHERE DATE(sales_datestamp)=CURDATE()
    ";
    $result = mysqli_query($this->db,$sql);
    $row = mysqli_fetch_assoc($result);
    $result = $row['TOTAL'];
    return $result;
  }

  public function gettopProducts(){
    $sql="SELECT prod.prd_name AS NAME,COUNT(list.prd_id) AS COUNT
    FROM tbl_sales_list list
    INNER JOIN tbl_product prod ON list.prd_id = prod.prd_id
    GROUP BY list.prd_id
    ORDER BY COUNT DESC
    limit 10";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getTotalCustomerTraffic(){
    $sql="SELECT
    COUNT(tbl_sales.sales_id) AS AMOUNT,
    EXTRACT(HOUR FROM sales_timestamp) AS TIME
    FROM tbl_sales
    WHERE EXTRACT(HOUR FROM sales_timestamp) BETWEEN '8' AND '20' AND sales_type = '0'
    GROUP BY EXTRACT(HOUR FROM sales_timestamp)
    ORDER BY sales_timestamp ASC
    ";

    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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

  public function getlatestSalesStat(){
    $sql="SELECT  COALESCE(SUM(prd.prd_price*lst.prd_qty),0) AS SALES, MONTHNAME(sls.sales_datestamp) AS MONTH
    FROM  tbl_sales sls
    INNER JOIN tbl_sales_list lst ON sls.sales_id = lst.sales_id
    INNER JOIN tbl_product prd ON prd.prd_id = lst.prd_id
    WHERE YEAR(CURRENT_DATE) = YEAR(sls.sales_datestamp)
    GROUP BY EXTRACT(MONTH FROM sls.sales_datestamp)
    limit 12";

    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
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
