<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>No Payslip</title>
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

		<h2 style="text-align:center;">No Payslip</h2><hr>

		<?php 
			include 'search_main.php';
		?><hr>

		<div class="container-fluid">
			<div class="row">
				<form action="no_payslip_exec.php" method="post">
					<div class="row">
						<div class="col-md-12">
						<h2 style="text-align:center;">Select Month & Year</h2>
							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Select Month</h3>
								<select class="form-control" name="month">
									<option>---------------------------------------------------</option>
									<option >January</option>
									<option>February</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>October</option>
									<option>November</option>
									<option>December</option>
								</select>
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
</html>