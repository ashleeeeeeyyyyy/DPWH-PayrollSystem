<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Individual Payslip (Whole Year)</title>
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
                        <li><a href="payslip_per_div.php">DIVISION PAYSLIP</a></li>
                        <li><a href="payslip.php">PAYSLIP</a></li>
                        <li><a href="no_payslip.php">NO PAYSLIP</a></li>
                        <li><a href="indi_payslip.php">YEARLY INDIVIDUAL</a></li>
                        <li><a href="list_view.php">VIEW LIST</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>

		<h2 style="text-align:center;">Individual Payslip (Whole Year)</h2><hr>

		<?php 
			include 'search_main.php';
		?><hr>

		<div class="container-fluid">
			<div class="row">
				<form action="indi_payslip_form.php" method="post">
					<div class="row">
						<div class="col-md-12">
						<h2 style="text-align:center;">Select Month & Year</h2>
							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Select Month</h3>
								<select class="form-control" name="categ_op_search">
									<option>---------------------------------------------------</option>
									<option>Last Name</option>
									<option>First Name</option>
									<option>Middle Name</option>
									<option>Division</option>
									<option>Employee ID</option>
									<option>Office</option>
									<option>Position</option>
									<option>Salary Grade</option>
								</select>
							</div>

							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Input Keyword</h3>
								<input type="text" class="form-control" maxlength = "20" name="keyword" placeholder="INPUT KEYWORD HERE"><br>
							</div>

							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Input Year</h3>
								<input type="text" class="form-control" maxlength = "4" name="year" placeholder="INPUT YEAR HERE"><br>
							</div>

							<div class="col-md-6" style="margin-left:47%;">
								<button type="Submit" class="btn btn-primary" name="submit" value="Go">Search</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	&nbsp;
</html>