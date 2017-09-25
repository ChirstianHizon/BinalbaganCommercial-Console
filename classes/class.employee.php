<?php
class Employee{
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

  public function getEmplyeeName($id){
    $sql= "SELECT * FROM tbl_employee WHERE emp_id = '$id' limit 1";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    $row = mysqli_fetch_assoc($result);
    $result = $row['emp_last_name'].", ".$row['emp_first_name'];
    return $result;
  }


  public function get_session(){
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
      return true;
    }else{
        return false;
      }
    }

  public function checkLogin($uname,$pass){
    $pass = md5($pass);
    $sql = "SELECT emp_id AS ID,emp_image AS IMAGE,emp_last_name AS LNAME,emp_first_name AS FNAME,emp_username AS USERNAME,emp_type AS TYPE,count(emp_username) AS COUNT FROM tbl_employee
    WHERE emp_username = '$uname' AND emp_password = '$pass' ";
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

  public function addEmployee($uname,$pass,$fname,$lname,$type,$image){
    $pass = md5($pass);
    $sql = "INSERT INTO tbl_employee(emp_username,emp_password,emp_first_name,emp_last_name,emp_type,emp_image,emp_datestamp,emp_timestamp)
       VALUES('$uname','$pass','$fname','$lname','$type','$image',NOW(),NOW())";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    return $result;
  }
  public function checkUname($uname){
    $sql = "SELECT count(emp_username) AS COUNT FROM tbl_employee WHERE emp_username = '$uname' ";
    $result = mysqli_query($this->db,$sql) or die(mysqli_error() . $sql);
    $row = mysqli_fetch_assoc($result);
    $result = $row['COUNT'];
    if($result >0){$result = false;}else{$result = true;}
    return $result;
  }

  public function getEmployee(){
    $sql = "SELECT * FROM tbl_employee";
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

  public function getSpecEmployee($id){
    $sql = "SELECT * FROM tbl_employee WHERE emp_id = '$id'";
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
