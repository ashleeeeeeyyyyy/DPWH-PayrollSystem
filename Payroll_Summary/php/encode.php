<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
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

		<h2 style="text-align: center;">Employee Detail</h2><hr>

		<table class="table table-bordered table-hover table-condensed">
			<div class="table responsive">
				<thead-dark>
                    <tr class="bg-primary">
                        <th style="text-align: center;">EMP ID</th>
                        <th style="text-align: center;">FULL NAME</th>
                        <th style="text-align: center;">DIVISION</th>
                        <th style="text-align: center;">OFFICE</th>
                        <th style="text-align: center;">POSITION</th>
						<th style="text-align: center;">SALARY GRADE</th>
                    </tr>
				</thead>
				<tbody>
					<?php
						$id = $_GET['id'];
						$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								echo "<tr style='text-align: center;'>
										<td>".$row['id']."</td>
										<td>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
										<td>".$row['division']."</td>
										<td>".$row['office']."</td>
										<td>".$row['position']."</td>
										<td>".$row['salarygrade']."</td>
									 </tr>";
							}
						}
					?>
				</tbody>
			</div>
		</table>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<form id="Home" action="view_monthly.php?id='.$id.'" method="post">
						<div class="col-md-12 text-center">
							<h3>Select Payroll Summary Record (Print View)</h3>
							<h3 style="text-align: center;">Input Year:</h3>
						</div>

						<div class="col-md-2 col-xs-2" style="margin-left:42%;">
							<input type="text" class="form-control" name="keyword" placeholder="Input here"><br>
						</div>

						<div class="col-md-12">
							<button type="submit" class="btn btn-primary center-block" name="submit" value="Go">Select</button>
						</div>
					</form>
				</div>
			</div>
		</div><hr>
		
		<div class="container-fluid">
			<div class="row">
				<form id="Home" action="encode_payroll.php?id='.$id.'" method="post">
					<div class="row">
						<div class="col-md-12">
						<h3 style="text-align: center;">Add Monthly Payroll Summary Record</h3>
							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Select Month</h3>
								<select class="form-control" name="month">
									<option>---------------------------------------------------</option>
									<option>January</option>
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
								<button type="submit" class="btn btn-primary" name="submit" value="Go">Search</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr>

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

	
	<hr>
	</div>
	</body>
</html>