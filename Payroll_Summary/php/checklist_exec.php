<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Checklist</title>
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

		<h2 style="text-align: center;">Input Year to View Checklist</h2><hr>

		<div class="container-fluid">
			<div class="row">
				<form id="Home" action="checklist_exec.php" method="post">
					<div class="row">
						<div class="col-md-12">
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
		</div><hr>

		<table class="table table-bordered table-hover table-condensed">
			<div class="table responsive">
				<thead-dark>
                    <tr class="bg-primary">
						<th style="text-align: center;">ID</th>
                        <th style="text-align: center;">FULL NAME</th>
                        <th style="text-align: center;">MONTHS</th>
                        <th style="text-align: center;">ENTRIES</th>
                    </tr>
				</thead>
				<tbody>
					<?php
						$year = $_POST['year'];
						$result2 = $conn->query("SELECT * FROM employees ORDER BY lastname ASC ");
						echo "<h3 style='text-align: center;'>Current Records for ".$year."</h3>";

						while($row = $result2->fetch_assoc()){
							echo '<td style="width:7%;">'.$row['id'].'</td>';
							echo '<td style="width:30%;">'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'</td>';
							echo '<td><input class = form-control readonly type="text" value="';
							   $result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row['id']."' AND payroll_data.year = '".$year."' ORDER BY month_num ASC");
							   
							   while($row2 = $result3->fetch_assoc()){
								   echo $row2['month'].", ";
							   }
							   echo '"</input></td>';
							   echo "<td style='width:10%; text-align: center;'>".$result3->num_rows."</td>";
							echo '</tr>';
						}
						echo "</table>";
					?>
				</tbody>
			</div>
		</table>
	</body>
</html>