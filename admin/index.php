<?php
session_start();
require("../database/connection.php");
// if(!isset($_SESSION["admin"]))
if(false)
{
    echo "not an admin!";
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
    <script src="../js/crud.js"></script>

</head>
<body>



    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeesModal" id="deleteChecked" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
						<th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <!-- Body of the table, gets results from the Database and displays them in here -->
                <tbody>
                    <?php
                        $sql = "SELECT e.emp_first, e.emp_last, e.emp_email, e.address, e.emp_phone, e.position FROM Employees e";
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
                                    
                                    <td class="name"><?= $row['emp_first']." ".$row["emp_last"]; ?></td>
                                    <td class="position"><?= $row["position"]; ?></td>
                                    <td class="email"><?= $row["emp_email"]; ?></td>
                                    <td class="address"><?= $row["address"]; ?></td>
                                    <td class="phone"><?= $row["emp_phone"]; ?></td>

                                    <td>
                                        <a href="#" class="edit" data-toggle="modal" data-target="#editEmployeeModal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#" class="delete" data-toggle="modal" data-target="#deleteEmployeeModal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

	<!-- Add modal HTML -->
	<div id="addEmployeeModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
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
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button id="addThisEmployee" type="button" class="btn btn-success">Add</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
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
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button id="editThisEmployee" type="button" class="btn btn-info">Save</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button id="deleteThisEmployee" type="button" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
    </div>

    <!-- Delete Modal HTML -->
	<div id="deleteEmployeesModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button id="deleteSelectedEmployees" type="button" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
    </div>

</body>
</html>                                		                            