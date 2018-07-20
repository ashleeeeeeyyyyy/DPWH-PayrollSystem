<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Employee</title>
		<link rel="stylesheet" href="../../CSS/style1.css">
        <link rel="stylesheet" href="../../CSS/font.css">
	</head>

	<body>
		<nav class="navbar navbar-inverse">
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

		<h2 style="text-align: center;">Add Employee Form</h2><hr>

		<form id="atu" action="emp_add_exec.php" method="post">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3 col-xs-6" style="margin-left:26%;">
							<h3>Employee ID:</h3>
							<input type="text" class="form-control" name="em_id" placeholder="INPUT ID" maxlength="7">

							<h3>Last Name:</h3>
							<input type="text" class="form-control" name="em_lname" placeholder="INPUT LAST NAME" maxlength="15">

							<h3>First Name:</h3>
							<input type="text" class="form-control" name="em_fname" placeholder="INPUT FIRST NAME" maxlength="15">

							<h3>Middle Name:</h3>
							<input type="text" class="form-control" name="em_mname" placeholder="INPUT MIDDLE NAME" maxlength="15">
						</div>

						<div class="col-md-3 col-xs-6">
							<h3>Division:</h3>
							<select class="form-control" name = "em_div">
								<option></option>
								<option>ADMINISTRATIVE</option>
								<option>B.B.K.N.</option>
								<option>CONSTRUCTION</option>
								<option>E.M.D.</option>
								<option>FINANCE</option>
								<option>J.I.C.A.</option>
								<option>LEGAL</option>
								<option>MAINTENANCE</option>
								<option>O.R.D.</option>
								<option>PLANNING AND DESIGN</option>
								<option>Q.A.H.D.</option>
								<option>WEIGHBRIDGE</option>
							</select>
								
							<h3>Office:</h3>
							<select class="form-control" name = 'em_off'>
								<option></option>
								<option>CAR Regional Office</option>
								<option>Abra DEO</option>
								<option>Apayao First DEO</option>
								<option>Apayao Second DEO</option>
								<option>Baguio DEO</option>
								<option>Benguet First DEO</option>
								<option>Benguet Second DEO</option>
								<option>Ifugao First DEO</option>
								<option>Ifugao Second DEO</option>
								<option>Upper Kalinga DEO</option>
								<option>Lower Kalinga DEO</option>
								<option>Mountain Province First DEO</option>
								<option>Mountain Province Second DEO</option>
								<option>Abra Area Equipment Section</option>
								<option>Benguet Area Equipment Section</option>
								<option>Ifugao Area Equipment Section</option>
								<option>Kalinga Area Equipment Section</option>
								<option>Mt.Province Area Equipment Section</option>
							</select>

							<h3>Position:</h3>
							<input type="text" class="form-control" name="em_pos" placeholder="INPUT POSITION" maxlength="15"></input>

							<h3>Salary Grade:</h3>
							<input type="text" class="form-control" name="em_sg" placeholder="INPUT SALARY GRADE" maxlength="7"></input><br>
						</div>
					</div>

					<div class="col-md-12" style="margin-left:46%">
						<button type="submit" class="btn btn-primary" name="submit">Add Employee</button>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>