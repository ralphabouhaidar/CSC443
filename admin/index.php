<?php
session_start();
require("../database/connection.php");
if(!isset($_SESSION["admin"]))
{
    echo "Access not authorized.";
    exit();
}

else if($_SESSION["admin"] == false)
{
    echo "Access not authorized.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Bootstrap and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/crud.css">

    <!-- JS files-->
    <script type="text/javascript" src="../js/crud/crud.js"></script>
    <script type="text/javascript" src="../js/Chart.min.js"></script>
    <script type="text/javascript" src="../js/crud/app.js"></script>

</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="../logout.php">LOG OUT</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="../img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name"><?= $_SESSION['first_name'] ?> 
            <strong><?= $_SESSION['last_name'] ?></strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->

      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->

      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-item">
            <a href="index.php">
              <i class="fas fa-home"></i>
              <span>Home</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>E-commerce</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Manage</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="employees/employees.php">Employees</a>
                </li>
                <li>
                  <a href="customers/customers.php">Customers</a>
                </li>
                <li>
                  <a href="trails/trails.php">Trails</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">

    <div class="counter">
    <div class="container">
        <div class="row">

        <!-- TO GET EMPLOYEE COUNT -->
        <?php 
            $sql1 = "SELECT * FROM Employees";
            $result1 = $connection->query($sql1);
            $employees = $result1->num_rows;
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="employees">
                    <p class="counter-count"><?= $employees; ?></p>
                    <p class="employee-p">Employees</p>
                </div>
            </div>

         <!-- TO GET CUSTOMER COUNT -->
         <?php 
            $sql2 = "SELECT * FROM Customers";
            $result2 = $connection->query($sql2);
            $customers = $result2->num_rows;
         ?>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="customer">
                      <p class="counter-count"><?= $customers ?></p>
                      <p class="customer-p">Customers</p>
                  </div>
              </div>

          <!-- TO GET CUSTOMER COUNT -->
         <?php 
            $sql3 = "SELECT * FROM Reservations";
            $result3 = $connection->query($sql3);
            $reservations = $result3->num_rows;
         ?>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="order">
                      <p class="counter-count"><?= $reservations ?></p>
                      <p class="order-p">Reservations</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

        <!-- Graph for salaries -->
        <div id="chart-container">
            <canvas id="mycanvas1"></canvas>
        </div>

        <!-- Graph for salaries -->
        <div id="chart-container">
            <canvas id="mycanvas2"></canvas>
        </div>
           
    </div>

  </main>

</body>
</html>                                		                            