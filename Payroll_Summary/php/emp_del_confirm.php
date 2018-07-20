<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Employee</title>
		<link rel="stylesheet" href="../../CSS/style1.css">
        <link rel="stylesheet" href="../../CSS/font.css">
	</head>

	<body>
		<nav class="navbar navbar-expand-sm navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="portal.php">HOME</a></li>
                        <li><a href="emp_add.php">ADD EMPLOYEE</a></li>
                        <li><a href="monthly_checklist.php">MONTHLY CHECKLIST</a></li>
                        <li><a href="checklist.php">CHECKLIST</a></li>
                        <li><a href="annual_report_form.php">ANNUAL REPORT</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
		</nav>
		
		<h2 style="text-align: center;">Delete Employee</h2><hr>

		<form class='form' method='get'>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					<h3 style="text-align: center;">Are you sure you want to delete this entry?</h3>
						<div class="col-md-3 col-xs-6" style="margin-left:26%;">
						<?php
						$id = $_GET['id'];
						include '../../Includes/dbconn.php';
						$result = $conn->query("SELECT * FROM employees WHERE id = '".$id."'");
						while($row = $result->fetch_assoc()){
							echo 
							"<tr>
							<h3>Employee ID:</h3>
							<input class=form-control type='text' name='did' value='{$row['id']}'>

							<h3>Last Name:</h3>
							<input class=form-control type='text' name='lname' value='{$row['lastname']}' />

							<h3>First Name:</h3>
							<input class=form-control type='text' name='fname' value='{$row['firstname']}' />

							<h3>Middle Name:</h3>
							<input class=form-control type='text' name='mname' value='{$row['middlename']}' />
							</tr>";
						}
						?>
						</div>

						<div class="col-md-3 col-xs-6">
						<?php
						$id = $_GET['id'];
						include '../../Includes/dbconn.php';
						$result = $conn->query("SELECT * FROM employees WHERE id = '".$id."'");
						while($row = $result->fetch_assoc()){
								echo
								"<tr>
									<h3>Division:</h3>
									<input class=form-control type='text' name='posi'value='{$row['division']}'>

									<h3>Office:</h3>
									<input class=form-control type='text' name='posi'value='{$row['office']}'>

									<h3>Position:</h3>
									<input class=form-control type='text' name='posi'value='{$row['position']}'>

									<h3>Salary Grade:</h3>
									<input class=form-control type='text' name='dsg'value='{$row['salarygrade']}'>
								</tr>";
						}
						?><br>
					</div>

					<div class="col-md-12" style="margin-left:46%">
						<?php
							$id = $_GET['id'];
							include '../../Includes/dbconn.php';
							$result = $conn->query("SELECT * FROM employees WHERE id = '".$id."'");
							while($row = $result->fetch_assoc()){
								echo '<h2><a href = "emp_del.php?id='.$row['id'].'">Confirm</a></h2>';
							}
							mysqli_close($conn);
						?>		
					</div>
				</div>
			</div>
	</body>
</html>