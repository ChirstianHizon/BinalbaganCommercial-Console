<?php
class Product_Log{
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


  public function getAllProductLog(){
    $sql = "SELECT log_id AS LOG_ID, tbl_product_log.prd_id AS PRD_ID,log_qty AS LOG_QTY, log_datestamp AS DATESTAMP,
		emp_first_name AS EMP_FNAME, emp_last_name AS EMP_LNAME, log_type AS TYPE
    FROM tbl_product_log
    INNER JOIN tbl_product ON tbl_product_log.prd_id = tbl_product.prd_id
    INNER JOIN tbl_employee ON tbl_product_log.emp_id = tbl_employee.emp_id
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


}
