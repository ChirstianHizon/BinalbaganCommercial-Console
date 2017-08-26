<?php
include 'library/config.php';
include 'classes/class.employee.php';
//session_destroy();
$employee = new Employee();

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

if($module == 'logout'){
  session_destroy();
  header("location: login.php");
}else{
  if(!$employee->get_session() || !$_SESSION['login']){
    header("location: login.php");
  }else{
    $employee->checkType($_SESSION['usertype'],$_SESSION['login'],"index");
  }
}
