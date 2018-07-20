<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Monthly Checklist</title>
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

		<h2 style="text-align: center;">Monthly Checklist</h2><hr>
	
		<div class="container-fluid">
			<div class="row">
				<form id="Home" action="monthly_checklist_exec.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="margin-left:42%;">
								<h2 style="text-align: center;">Select Month</h2>
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
								<h2 style="text-align: center;">Input Year</h2>
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

		<?php
			$month = $_POST['month'];
			$month_var;

			if ($month == 'January') {
				$month_var = 1;
			}elseif ($month == 'February') {
				$month_var = 2;
			}elseif ($month == 'March') {
				$month_var = 3;
			}elseif ($month == 'April') {
				$month_var = 4;
			}elseif ($month == 'May') {
				$month_var = 5;
			}elseif ($month == 'June') {
				$month_var = 6;
			}elseif ($month == 'July') {
				$month_var = 7;
			}elseif ($month == 'August') {
				$month_var = 8;
			}elseif ($month == 'September') {
				$month_var = 9;
			}elseif ($month == 'October') {
				$month_var = 10;
			}elseif ($month == 'November') {
				$month_var = 11;
			}elseif ($month == 'December') {
				$month_var = 12;
			}
		?>

		<table class="table table-bordered table-hover table-condensed">
            <div class="table responsive">
                <thead>
                    <tr class="bg-primary">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">FULL NAME</th>
                        <th style="text-align: center;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $year = $_POST['year'];
						$result2 = $conn->query("SELECT * FROM employees WHERE id NOT IN (SELECT id FROM payroll_data WHERE month = '{$month}' AND year = '{$year}') ORDER BY lastname ASC");
						echo "<h3><center>Current Records without ".$month." inputs for ".$year."</center></h3>";
						while($row = $result2->fetch_assoc()){
							echo "<tr>
							<td style = 'text-align: center;'>".$row['id']."</td>
							<td style = 'text-align: center;'>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
							<td style = 'text-align: center;'><a href='encode.php?id=".$row['id']."'>Encode</a></td>
							</tr>";
						}
                    ?>
                </tbody>
            </div>
        </table>
	</body>
</html>