<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DPWH Search</title>
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

		<?php 
			include 'search_main.php';
		?>

		<?php
			$search = $_POST['categ_op_search'];
			$search_var;
			$keyword = $_POST['keyword'];

			if ($search == "Employee ID") {
				$search_var = 'id';
			}elseif ($search == "Last Name") {
				$search_var = 'lastname';
			}elseif ($search == "First Name") {
				$search_var = 'firstname';
			}elseif ($search == "Middle Name") {
				$search_var = 'middlename';
			}elseif ($search == "Division") {
				$search_var = 'division';
			}elseif ($search == "Office") {
				$search_var = 'office';
			}elseif ($search == "Position") {
				$search_var = 'position';
			}elseif ($search == "Salary Grade") {
				$search_var = 'salarygrade';
			}
			?>

		<table class="table table-bordered table-hover table-condensed">
            <div class="table responsive">
                <thead>
                    <tr class="bg-primary">
						<th style="text-align: center;">EMP ID</th>
                        <th style="text-align: center;">FULL NAME</th>
                        <th style="text-align: center;">DIVISION</th>
                        <th style="text-align: center;">OFFICE</th>
                        <th style="text-align: center;">POSITION</th>
						<th style="text-align: center;">SG</th>
						<th style="text-align: center;">VIEW</th>
						<th style="text-align: center;">ENCODE</th>
						<th style="text-align: center;">EDIT</th>
						<th style="text-align: center;">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                        $result = $conn->query("SELECT * FROM employees WHERE {$search_var} LIKE '%{$keyword}%'");
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
								echo "<tr>
										<td style = 'text-align: center;'>".$row['id']."</td>
										<td>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
										<td style = 'text-align: center;'>".$row['division']."</td>
										<td style = 'text-align: center;'>".$row['office']."</td>
										<td style = 'text-align: center;'>".$row['position']."</td>
										<td style = 'text-align: center;'>".$row['salarygrade']."</td>
										<td style = 'text-align: center;'><a href = 'view_summary.php?id=".$row['id']."'>View</a></td>
										<td style = 'text-align: center;'><a href = 'encode.php?id=".$row['id']."'>Encode</a></td>
										<td style = 'text-align: center;'><a href = 'edit_employee.php?update={$row['id']}'>Edit</a></td>
                                        <td style = 'text-align: center;'><a href = 'emp_del_confirm.php?id=".$row['id']."'>Delete</a></td>
									</tr>";
                            }
                        }
                    ?>
                </tbody>
            </div>
        </table>
	</body>
</html>