<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Summary</title>
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

		<h2 style="text-align: center;">View Employee Summary</h2><hr>
 
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<h3 style="text-align: center;">Select Payroll Summary Record</h3>
					<div class="col-md-2" style="margin-left:42%;">
						<form id="Home" action="view_monthly.php?id=<?php echo $_GET['id']; ?>" method="post">
							<input type="text" class="form-control" name="year" maxlength="4" placeholder="Input Year"><br>
							<button type="submit" class="btn btn-primary center-block" name="submit" value="Go">Search</button>
						</form>
					</div>
				</div>
			</div>
		</div><hr>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<h2 style="text-align: center;">Employee Information</h2>
					<div class="col-md-3 col-xs-6" style="margin-left:26%;">
						<?php
							$id = $_GET['id'];
							$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
									echo 
									"<tr>
										<h3>Employee ID:</h3>
										<input class=form-control type='text' value='{$row['id']}'>

										<h3>Last Name:</h3>
										<input class=form-control type='text' name='lname' value='{$row['lastname']}'>

										<h3>First Name:</h3>
										<input class=form-control type='text' name='fname' value='{$row['firstname']}'>

										<h3>Middle Name:</h3>
										<input class=form-control type='text' name='mname' value='{$row['middlename']}'>
									</tr>";
								}
							}
						?>
					</div>

					<div class="col-md-3 col-xs-6">
						<?php
							$id = $_GET['id'];
							$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
							if($result->num_rows > 0){
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
							}
						?>
					</div>
				</div>
			</div>
		</div><hr>

		<table class="table table-bordered table-hover table-condensed">
			<div class="table responsive">
				<thead-dark>
                    <tr class="bg-primary">
						<th style="text-align: center;">YEAR</th>
                        <th style="text-align: center;">MONTHS</th>
                        <th style="text-align: center;">ENTRIES</th>
                        <th style="text-align: center;">ACTION</th>
                    </tr>
				</thead>
				<tbody>
					<h3 style="text-align: center;">Current Records</h3>
					<?php
						$id = $_GET['id'];
						$result2 = $conn->query("SELECT DISTINCT payroll_data.year FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' ORDER BY payroll_data.year DESC ");
						while($row = $result2->fetch_assoc()){
							echo '<td style="text-align: center;"><label>'.$row['year'].'</label></td>';
							echo '<td><input class = form-control readonly type="text" value="';
							$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' AND year = ".$row['year']." ORDER BY month_num ASC");
							
							while($row2 = $result3->fetch_assoc()){
								echo $row2['month'].", ";
							}
							echo '"</input></td>';
							echo "<td style='text-align: center;'>".$result3->num_rows."</td>";
							echo "<td style='text-align: center;'><a href = 'view_individually.php?id=".$id."&year=".$row['year']."'>View</a></td>";
							echo '</tr>';
						}
						echo "</table>";
					?>
				</tbody>
			</div>
		</table>
	</body>
</html>
