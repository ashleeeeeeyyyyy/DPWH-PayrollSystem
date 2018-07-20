<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Employee</title>
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

		<?php
		if (isset($_GET['submit'])) {
		$id = $_GET['did'];
		$lname = $_GET['lname'];
		$fname = $_GET['fname'];
		$mname = $_GET['mname'];
		$position = $_GET['posi'];
		$divi = $_GET['em_div'];
		$office = $_GET['em_off'];
		$sg = $_GET['dsg'];
		$query = $conn->query("update employees set
		lastname='$lname', firstname='$fname', middlename='$mname', division='$divi',
		position='$position', salarygrade='$sg', office = '$office' where id='$id'");
		}
		?>
		
		<h2 style="text-align: center;">Update Employee Information</h2><hr>

		<form class='form' method='get'>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3 col-xs-6" style="margin-left:26%;">
						<?php
						if (isset($_GET['update'])) {
						$update = $_GET['update'];
						$query1 = $conn->query("select * from employees where id='{$update}'");
							while ($row = $query1->fetch_assoc()) {
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
						}
						?>
						</div>

						<div class="col-md-3 col-xs-6">
						<?php
						if (isset($_GET['update'])) {
							$update = $_GET['update'];
							$query1 = $conn->query("select * from employees where id='{$update}'");
							while ($row = $query1->fetch_assoc()) {
								echo
								"<tr>
									<h3>Division:</h3>
									<td>
										<select class=form-control name = 'em_div'>
											<option>{$row['division']}</option>
											<option>ADMINISTRATIVE</option>
											<option>B.B.K.N.</option>
											<option>CONSTRUCTION</option>
											<option>E.M.D.</option>
											<option>FINANCE</option>
											<option>J.I.C.A.</option>
											<option>WEIGHBRIDGE</option>
											<option>O.R.D.</option>
											<option>PLANNING AND DESIGN</option>
											<option>Q.A.H.D.</option>
											<option>MAINTENANCE</option>
										</select>
									</td>

									<h3>Office:</h3>
									<td>
										<select class=form-control name = 'em_off'>
											<option>{$row['office']}</option>
											<option>CAR Regional Office</option>
											<option>Abra DEO</option>
											<option>Apayao First DEO</option>
											<option>Apayao Second DEO</option>
											<option>Baguio DEO</option>
											<option>Benguet First DEO</option>
											<option>Benguet Second</option>
											<option>Ifugao First DEO</option>
											<option>Ifugao Second DEO</option>
											<option>Upper Kalinga DEO</option>
											<option>Lower Kalinga DEO</option>
											<option>Mountain Province First DEO</option>
											<option>Mountain Province Second DEO</option>
											<option>Mt. Province Area Equipment Section</option>
											<option>Benguet Area Equipment Section</option>
											<option>Abra Area Equipment Section</option>
											<option>Ifugao Area Equipment Section</option>
											<option>Kalinga Area Equipment Section</option>
										</select>
									</td>

									<h3>Position:</h3>
									<input class=form-control type='text' name='posi'value='{$row['position']}'>

									<h3>Salary Grade:</h3>
									<input class=form-control type='text' name='dsg'value='{$row['salarygrade']}'>
								</tr>";
							}
						}
						?><br>
					</div>

					<div class="col-md-12" style="margin-left:46%">
						<button type="submit" class="btn btn-primary" name="submit" value="Update">Update Employee</button>
					</div>
				</div>
			</div>

			<?php
				if (isset($_GET['submit'])) {
					$id = $_GET['did'];
					echo "<br>";
					echo '<h3><center>Data Updated Successfully!!</center></h3>';
					echo "<br>";
				}
			?>
		</form>
	</body>
</html>
