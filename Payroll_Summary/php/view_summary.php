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

		<h2 style="text-align: center;">View Employee Summary</h2>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-2" style="margin-left:42%;">
						<form id="Home" action="view_monthly.php?id='.$id.'" method="post">';
						<h3 style="text-align: center;">Select Payroll Summary Record</h3>
						<input type="text" class="form-control" name="keyword" placeholder="Input Year"><br>
						<button type="submit" class="btn btn-primary center-block" name="submit" value="Go">Search</button>
						</form>
					</div>
				</div>
			</div>
		</div><br>

		<h2 style="text-align: center;">Employee Detail</h2>
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
								echo "<tr>
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
		</table><br>

		<h3 style="text-align: center;">Current Records</h3>
		<table class="table table-bordered table-hover table-condensed">
			<div class="table responsive">
				<thead-dark>
                    <tr class="bg-primary">
                        <th style="text-align: center;">MONTHS</th>
                        <th style="text-align: center;">ENTRIES</th>
                        <th style="text-align: center;">ACTION</th>
                    </tr>
				</thead>
				<tbody>
					<?php
						$id = $_GET['id'];
						$result2 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' AND year = ".$row['year']." ORDER BY month_num ASC");
						if($result->num_rows > 0){
							while($row = $result2->fetch_assoc()){
								echo "<tr>
										<td>".$row['month']."</td>
									 </tr>";
							}
						}
					?>
				</tbody>
			</div>
		</table><br>
	</form>
	</body>
</html>


						if($result->num_rows > 0){
							while($row2 = $result3->fetch_assoc()){
								echo $row2['month'].", ";
								echo "<td>".$result3->num_rows."</td>";
								echo "<td><a href = 'view_individually.php?id=".$id."&year=".$row['year']."'>View</a></td>";
								echo '</tr>';
								
							}
						}