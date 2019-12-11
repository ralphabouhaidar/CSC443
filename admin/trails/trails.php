<?php
session_start();
require("../../database/connection.php");
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

    <link rel="stylesheet" href="../../css/crud.css">
    <script src="../../js/crud/crud.js"></script>
    <script src="../../js/crud/trails.js"></script>

</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="../../logout.php">LOG OUT</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="../../img/user.jpg"
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
            <a href="../index.php">
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
                  <a href="../employees/employees.php">Employees</a>
                </li>
                <li>
                  <a href="../customers/customers.php">Customers</a>
                </li>
                <li>
                  <a href="trails.php">Trails</a>
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

            <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h2>Manage <b>Trails</b></h2>
                                </div>

                                <div class="col-sm-4">
                                    <form class="form-inline my-2 my-lg-0" method="GET">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search_txt" name="search_txt">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search_btn">Search</button>
                                    </form>
                                </div>
                                <div class="col-sm-5">
                                    <a href="#addTrailModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Trail</span></a>
                                    <a href="#deleteTrailsModal" id="deleteChecked" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>Location</th>
                                    <th>Distance</th>
                                    <th>Meeting Point</th>
                                    <th>Difficulty</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- Body of the table, gets results from the Database and displays them in here -->
                            <tbody>
                                <?php
                                    if(isset($_GET["search_txt"]))
                                        $sql = "SELECT DISTINCT a.location, a.distance, b.meeting_point, a.difficulty, b.price FROM Trails a, Trips b WHERE a.trail_id = b.trail_id AND (a.location LIKE \"".$_GET["search_txt"]."%\" OR a.difficulty LIKE \"".$_GET["search_txt"]."%\" OR b.price LIKE \"".$_GET["search_txt"]."%\" OR b.meeting_point LIKE \"".$_GET["search_txt"]."%\")";
                                    
                                    else
                                        $sql = "SELECT DISTINCT a.location, a.distance, b.meeting_point, a.difficulty, b.price FROM Trails a, Trips b WHERE a.trail_id = b.trail_id";

                                    $result=$connection->query($sql);
                                    $entries = $result->num_rows;
            
                                    if($entries > 0) /*if the query returns a non-empty result*/
                                    {
                                        while($row = $result->fetch_assoc())
                                        {
                                            ?>
                                            <tr>
                                                <td>
                                                    <span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                        <label for="checkbox1"></label>
                                                    </span>
                                                </td>
                                                
                                                <td class="location"><?= $row['location']; ?></td>
                                                <td class="distance"><?= $row["distance"]; ?></td>
                                                <td class="meeting_point"><?= $row["meeting_point"]; ?></td>
                                                <td class="difficulty"><?= $row["difficulty"]; ?></td>
                                                <td class="price"><?= $row["price"]."LL"; ?></td>
            
                                                <td>
                                                    <a href="#" class="edit" data-toggle="modal" data-target="#editTrailModal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                    <a href="#" class="delete" data-toggle="modal" data-target="#deleteTrailModal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
            
                        <div class="clearfix">
                            <div class="hint-text" id="showingResults">Showing <b><?php if($entries>20) echo "20"; else echo "$entries"; ?></b> out of <b><?php echo "$entries";?></b> entries</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Previous</a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                
                                <?php 
                                $pages = $entries/20; 
                                $count = 2;
                                while($pages > 1)
                                {
                                ?>
                                <li class="page-item"><a href="#" class="page-link"><?= "$count" ?></a></li>
                                <?php 
                                    $pages--;
                                    $count++;
                                }
                                ?>
                                <li class="page-item <?php if($entries/20 <= 1) echo "disabled"?>"><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
      
    </div>

  </main>



	<!-- Add modal HTML -->
	<div id="addTrailModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Trail</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Location*</label>
							<input type="text" class="form-control locationInput" required>
                        </div>

                        <div class="form-group">
							<label>Start Location*</label>
							<input type="text" class="form-control startLocationInput" required>
                        </div>

                        <div class="form-group">
							<label>End Location*</label>
							<input type="text" class="form-control endLocationInput" required>
                        </div>

                        <div class="form-group">
							<label>Distance*</label>
							<input type="text" class="form-control distanceInput" required>
                        </div>

                        <div class="form-group">
							<label>Meeting Point*</label>
							<input type="text" class="form-control meetingPointInput" required>
                        </div>

                        <div class="form-group">
							<label>Meeting Time*</label>
							<input type="text" class="form-control meetingTimeInput" required>
                        </div>

                        <div class="form-group">
							<label>Date*</label>
							<input type="text" class="form-control dateInput" palceholder="yyyy/mm/dd" required>
                        </div>

						<div class="form-group">
							<label>Difficulty*</label>
							<input type="text" class="form-control difficultyInput" required>
                        </div>
                        
						<div class="form-group">
							<label>Price*</label>
							<input type="text" class="form-control priceInput" required>
                        </div>
                        
						<div class="form-group">
							<label>Transportation Price</label>
							<input type="text" class="form-control transportationInput">
                        </div>	
                        
                        <div class="form-group">
							<label>Transportation Phone</label>
							<input type="text" class="form-control transportationPhoneInput">
						</div>	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button id="addThisTrail" type="button" class="btn btn-success">Add</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
	<!-- Edit Modal HTML -->
	<div id="editTrailModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Trail</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>First name</label>
							<input type="text" class="form-control firstInput" required>
                        </div>
                        
                        <div class="form-group">
							<label>Last name</label>
							<input type="text" class="form-control lastInput" required>
                        </div>
                        
                        <div class="form-group">
							<label>Position</label>
							<input type="text" class="form-control positionInput" required>
                        </div>
                        
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control emailInput" required>
                        </div>
                        
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control addressInput" required></textarea>
                        </div>
                        
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control phoneInput" required>
                        </div>	
                        
                        <div class="form-group">
							<label>Salary</label>
							<input type="text" class="form-control salaryInput" required>
						</div>	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button id="editThisTrail" type="button" class="btn btn-info">Save</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
	<!-- Delete Modal HTML -->
	<div id="deleteTrailModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Trails</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button id="deleteThisTrail" type="button" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
    </div>

    <!-- Delete Modal HTML -->
	<div id="deleteTrailsModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Trails</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button id="deleteSelectedTrails" type="button" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
    </div>

</body>
</html>                                		                            