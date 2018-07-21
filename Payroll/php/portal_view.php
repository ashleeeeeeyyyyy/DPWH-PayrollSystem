<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>	
		<title>Payroll Search</title>
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
                        <li><a href="portal.php">DEDUCTIONS</a></li>
                        <li><a href="portal.php">EDIT SALARY</a></li>
                        <li><a href="salary_grades.php">SALARY GRADES</a></li>
                        <li><a href="portal.php">BONUSES</a></li>
                        <li><a href="portal.php">TAX</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <h2 style="text-align: center;">Payroll System</h2><hr>

		<table class="table table-bordered table-condensed">
            <div class="table responsive">
                <thead>
                    <tr class="bg-primary">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">NAME</th>
                        <th style="text-align: center;">POSITION</th>
                        <th style="text-align: center;">DIVISION</th>
                        <th style="text-align: center;">OFFICE</th>
                    </tr>
                </thead>
                <tbody>
					<h2 style="text-align: center;">Information</h2>
					<?php
						$id = $_GET['id'];
						$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
						while ($row = $result->fetch_assoc()) {
							echo "<tr>
							<td style='text-align: center;'>".$row['id']."</td>
							<td style='text-align: center;'>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
							<td style='text-align: center;'>".$row['position']."</td>
							<td style='text-align: center;'>".$row['division']."</td>
							<td style='text-align: center;'>".$row['office']."</td>
						  </tr>";
						}
					?>
                </tbody>
            </div>
		</table><br>
		
		<table class="table table-bordered table-condensed">
			<div class="table responsive">
				<thead-dark>
                    <tr class="bg-primary">
						<th style="text-align: center;">YEAR</th>
                        <th style="text-align: center;">MONTHS</th>
                        <th style="text-align: center;">ENTRIES</th>

                    </tr>
				</thead>
				<tbody>
					<h3 style="text-align: center;">Current Records</h3>
					<?php
						$id = $_GET['id'];
						$result2 = $conn->query("SELECT DISTINCT payroll_data.year FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' ORDER BY payroll_data.year DESC ");
						while($row = $result2->fetch_assoc()){
							echo '<td style="text-align: center;"><label>'.$row['year'].'</label></td>';
							echo '<td style="width:70%;"><input class = form-control readonly type="text" value="';
							$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' AND year = ".$row['year']." ORDER BY month_num ASC");
							
							while($row2 = $result3->fetch_assoc()){
								echo $row2['month'].", ";
							}
							echo '"</input></td>';
							echo "<td style='text-align: center;'>".$result3->num_rows."</td>";
							echo '</tr>';
						}
						echo "</table>";
					?>
				</tbody>
			</div>
		</table>
	</body>
</html>