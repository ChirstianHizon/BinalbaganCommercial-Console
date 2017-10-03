<!--
  TODO: FIX THE LOGIN
 -->
<?php
include '../library/config.php';
include '../classes/class.employee.php';

$employee = new Employee();

if(!$employee->get_session()){
  header("location: ../login.php");
}
$employee->checkType($_SESSION['usertype'],$_SESSION['login'],"cashier");

date_default_timezone_set('Asia/Hong_Kong');

$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>BC Web Console</title>
  <meta charset="utf-8">
  <script>
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  var hour = today.getHours();
  var min = today.getMinutes();
  var sec = today.getSeconds();

  //CONVERT TO 2DIGIT INSTED OF 1
  dd = ("0" + Number(dd)).slice(-2);
  mm = ("0" + Number(mm)).slice(-2);

  console.log("DATE: "+mm+" | "+dd );
  today = yyyy + '-' + mm.toString() + '-' + dd.toString();
  time = hour + ':' + min + ':' + sec;

  var currDate = today.toString();
  var currTime =time.toString();
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="../js/jquery.min.js"></script>

  <!-- Bootstrap Core CSS -->
  <link href="../bootstrap/startmin/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/startmin/css/metisMenu.min.css" rel="stylesheet">
  <link href="../bootstrap/startmin/css/timeline.css" rel="stylesheet">
  <link href="../bootstrap/startmin/css/startmin.css" rel="stylesheet">
  <link href="../bootstrap/startmin/css/morris.css" rel="stylesheet">
  <link href="../bootstrap/startmin/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <script src="../api/firebase/firebase.js"></script>
  <script src="../api/firebase/firebaseinit.js"></script>



  <link rel='stylesheet' type='text/css' href='../api/jqueryui/jquery-ui.css'/>

  <link rel="stylesheet" type="text/css" href="../api/DataTables/datatables.min.css"/>

  <link href="../api/awsomecomplete/awesomplete.css" rel="index">
  <script src="../api/awsomecomplete/awesomplete.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel='stylesheet' type='text/css' href='.css/index.css'/>
</head>
<body>
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">BC Web Console</a>
      </div>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Top Navigation: Left Menu -->
      <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i></a></li>
      </ul>

      <!-- Top Navigation: Right Menu -->
      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?php echo$_SESSION['userlname'].", ".$_SESSION['userfname']?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li> -->
            <li class="divider"></li>
            <li><a href="../index.php?mod=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>

      <!-- Sidebar -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

          <ul class="nav" id="side-menu">
            <!--  -->
            <li>
              <a href="index.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
                <!--  -->
                <li>
                  <!-- class="active"  -->
              <a><i class="fa fa-sitemap fa-fw"></i>Inventory<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="index.php?mod=invenaddprod">Add New Product</a>
                </li>
                <li>
                  <a href="index.php?mod=invenviewprod">View Products</a>
                </li>

                <li>
                  <a href="index.php?mod=invenaddcat">View Category</a>
                </li>
                <li>
                  <a href="index.php?mod=invenupdtprod">Update Product List</a>
                </li>
              </ul>

            </li>
            <!--  -->
            <li>
              <a><i class="fa fa-sitemap fa-fw"></i>Sales<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="index.php?mod=salespos">Point of Sales</a>
                </li>
                <li>
                  <a href="index.php?mod=saleslist">Sales List</a>
                </li>
                <li>
                  <a href="index.php?mod=orders">Orders</a>
                </li>
                <li>
                  <a href="index.php?mod=delivery">Delivery</a>
                </li>
              </ul>

            </li>
            <!--  -->
            <li>
              <a><i class="fa fa-sitemap fa-fw"></i>Reports<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="index.php?mod=reportinven">Inventory</a>
                </li>
                <li>
                  <a href="index.php?mod=reportsales">Sales</a>
                </li>
              </ul>
            </li>

            <!--  -->
            <li>
              <a><i class="fa fa-sitemap fa-fw"></i>Accounts<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="index.php?mod=accnew">Create New Account</a>
                </li>
                <li>
                  <a href="index.php?mod=acccust">Customer Accounts</a>
                </li>
                <li>
                  <a href="index.php?mod=accemp">Employee Accounts</a>
                </li>
              </ul>
            </li>


          </ul>

        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <?php
          switch($module){
              case '':
                require_once 'dashboard.php';
              break;
              case 'salespos':
                require_once 'sales/pos.php';
              break;
              case 'invenviewprod':
                require_once 'inventory/inventory-view.php';
              break;
              case 'invenaddprod':
                require_once 'inventory/inventory-add-prod.php';
              break;
              case 'invenaddcat':
                require_once 'inventory/inventory-category.php';
              break;
              case 'invenupdtprod':
                require_once 'inventory/inventory-update-prod.php';
              break;
              case 'search':
                require_once 'products.php';
              break;
              case 'salesreport':
                require_once 'salesreport.php';
              break;
              case 'saleslist':
                require_once 'sales/saleslist.php';
              break;
              case 'orders':
                require_once 'sales/orders.php';
              break;
              case 'accnew':
                require_once 'accounts/new.php';
              break;
              case 'acccust':
                require_once 'accounts/customer.php';
              break;
              case 'accemp':
                require_once 'accounts/employee.php';
              break;
              case 'accuser':
                require_once 'accounts/user.php';
              break;
              default:
                require_once 'dashboard.php';
              break;
          }
        ?>
      </div>
    </div>
  </div>
  <script src="../bootstrap/startmin/js/jquery.min.js"></script>
  <!-- SCRIPTS -->
  <script src=".js/index.js"></script>
  <!-- DATATABLES -->
  <script type="text/javascript" src="../api/DataTables/datatables.min.js"></script>
  <!-- GOOGLE CHARTS-->
  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi?ext.js"></script> -->
  <!-- BOOTSTRAP -->
  <script src="../bootstrap/startmin/js/bootstrap.min.js"></script>
  <script src="../bootstrap/startmin/js/metisMenu.min.js"></script>
  <script src="../bootstrap/startmin/js/startmin.js"></script>
  <!-- END BOOTSTRAP -->
  <!-- DATE PICKER JQUERY UI -->
  <script src="../api/jqueryui/jquery-ui.js"></script>
</body>
</html>
