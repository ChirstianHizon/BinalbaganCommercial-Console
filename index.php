<?php
include 'library/config.php';
include 'classes/class.employee.php';
//session_destroy();
$employee = new Employee();

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

if($module == 'logout'){
  session_destroy();
  header("location: login.php");
}

$fname = (!empty($_SESSION['userfname'])) ? $_SESSION['userfname'] : true;
$lname = (!empty($_SESSION['userlname'])) ? $_SESSION['userlname'] : true;
if(empty($_SESSION['userfname']) ||  empty($_SESSION['userlname'])){
  session_destroy();
  header("location: login.php");
}
$lname = substr($lname,0,10);
$fname = substr($fname,0,10);
if(!$employee->get_session()){
  header("location: login.php");
}

date_default_timezone_set('Asia/Hong_Kong');

$type = $_SESSION['usertype'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>BC Web Console</title>
  <meta charset="utf-8">
  <script>
  var access = "Binalbagan_Commercial_WEB_Access";
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  var hour = today.getHours();
  var min = today.getMinutes();
  var sec = today.getSeconds();

  dd = ("0" + Number(dd)).slice(-2);
  mm = ("0" + Number(mm)).slice(-2);

  console.log("DATE: "+mm+" | "+dd );
  today = yyyy + '-' + mm.toString() + '-' + dd.toString();
  time = hour + ':' + min + ':' + sec;

  var currDate = today.toString();
  var currTime =time.toString();
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="js/jquery.min.js"></script>

  <!-- Bootstrap Core CSS -->
  <link href="bootstrap/startmin/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/startmin/css/metisMenu.min.css" rel="stylesheet">
  <link href="bootstrap/startmin/css/timeline.css" rel="stylesheet">
  <link href="bootstrap/startmin/css/startmin.css" rel="stylesheet">
  <link href="bootstrap/startmin/css/morris.css" rel="stylesheet">
  <link href="bootstrap/startmin/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <script src="api/firebase/firebase.js"></script>
  <script src="api/firebase/firebaseinit.js"></script>



  <link rel='stylesheet' type='text/css' href='api\jqueryui\jquery-ui.css'/>

  <link rel="stylesheet" type="text/css" href="api/DataTables/datatables.min.css"/>

  <link href="api/awsomecomplete/awesomplete.css" rel="index">
  <script src="api/awsomecomplete/awesomplete.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel='stylesheet' type='text/css' href='.main\index.css'/>
</head>
<body>
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a id="name" class="navbar-brand" href="index.php">BC Console </a>
      </div>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Top Navigation: Left Menu -->
      <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a id="home" href="#"><i class="fa fa-home fa-fw"></i></a></li>
      </ul>

      <!-- Top Navigation: Right Menu -->
      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i id="user" class="fa fa-user fa-fw"></i> <?php echo $lname.", ".$fname?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="index.php?mod=userprofile"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li> -->
            <li class="divider"></li>
            <li><a href="index.php?mod=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>

      <!-- Sidebar -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <?php
            switch ($type) {
              case 0:
                require_once '.main/admin-sidebar.php';
              break;
              case 1:
                require_once '.main/cashier-sidebar.php';
              break;
              case 2:
                require_once '.main/delivery-sidebar.php';
              break;
            }
          ?>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <?php
          switch ($type) {
            case 0:
              switch($module){
                  case '':
                    require_once '.admin/dashboard.php';
                  break;
                  case 'salespos':
                    require_once '.admin/sales/pos.php';
                  break;
                  case 'invenviewprod':
                    require_once '.admin/inventory/inventory-view.php';
                  break;
                  case 'invenaddprod':
                    require_once '.admin/inventory/inventory-add-prod.php';
                  break;
                  case 'invenaddcat':
                    require_once '.admin/inventory/inventory-category.php';
                  break;
                  case 'invenaddbar':
                    require_once '.admin/inventory/inventory-add-barcode.php';
                  break;
                  case 'invenupdtprod':
                    require_once '.admin/inventory/inventory-update-prod.php';
                  break;
                  case 'search':
                    require_once '.admin/products.php';
                  break;
                  case 'salesreport':
                    require_once '.admin/salesreport.php';
                  break;
                  case 'saleslist':
                    require_once '.admin/sales/saleslist.php';
                  break;
                  case 'orders':
                    require_once '.admin/sales/orders.php';
                  break;
                  case 'accnew':
                    require_once '.admin/accounts/new.php';
                  break;
                  case 'acccust':
                    require_once '.admin/accounts/customer.php';
                  break;
                  case 'accemp':
                    require_once '.admin/accounts/employee.php';
                  break;
                  case 'accuser':
                    require_once '.admin/accounts/user.php';
                  break;
                  case 'userprofile':
                    require_once 'userprofile.php';
                  break;
                  case 'reportinven':
                    require_once '.admin/reports/inventory.php';
                  break;
                  case 'reportinven':
                    require_once '.admin/reports/sales.php';
                  break;
                  default:
                    require_once '.main/page-not-found.php';
                  break;
              }
            break;
            case 1:
            switch($module){
                case '':
                  require_once '.cashier/dashboard.php';
                break;
                case 'salespos':
                  require_once '.cashier/sales/pos.php';
                break;
                case 'invenviewprod':
                  require_once '.cashier/inventory/inventory-view.php';
                break;
                case 'search':
                  require_once '.cashier/products.php';
                break;
                case 'orders':
                  require_once '.cashier/sales/orders.php';
                break;
                case 'userprofile':
                  require_once 'userprofile.php';
                break;
                default:
                  require_once '.main/page-not-found.php';
                break;
            }
            break;

            case 2:
            break;
          }
        ?>
      </div>
    </div>
  </div>
  <script src="bootstrap/startmin/js/jquery.min.js"></script>
  <!-- SCRIPTS -->
  <script src=".main\index.js"></script>
  <!-- DATATABLES -->
  <script type="text/javascript" src="api/DataTables/datatables.min.js"></script>
  <!-- GOOGLE CHARTS-->
  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi?ext.js"></script> -->
  <!-- BOOTSTRAP -->
  <script src="bootstrap/startmin/js/bootstrap.min.js"></script>
  <script src="bootstrap/startmin/js/metisMenu.min.js"></script>
  <script src="bootstrap/startmin/js/startmin.js"></script>
  <!-- END BOOTSTRAP -->
  <!-- DATE PICKER JQUERY UI -->
  <script src="api\jqueryui\jquery-ui.js"></script>
</body>
</html>
