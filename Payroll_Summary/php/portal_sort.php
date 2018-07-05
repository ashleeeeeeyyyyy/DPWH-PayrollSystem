<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Payroll Sort</title>
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

      	<h2 style="text-align: center;">Payslip Summary</h2>
        <?php 
            include 'search_main.php';
		?><br><br><br><br>
		
		<?php
			$sort = $_POST['sort_op'];
			$order = $_POST['sort_or'];
			$sort_var;
			$order_var;

			if ($sort == 'Employee ID') {
				# code...
				$sort_var = 'id';
			} elseif ($sort == 'Last Name') {
				# code...
				$sort_var = 'lastname';
			}elseif ($sort == 'First Name') {
				# code...
				$sort_var = 'firstname';
			}elseif ($sort == 'Last Name') {
				# code...
				$sort_var = 'middlename';
			}elseif ($sort == 'Division') {
				# code...
				$sort_var = 'division';
			}elseif ($sort == 'Position') {
				# code...
				$sort_var = 'position';
			}elseif ($sort == 'Salary Grade') {
				# code...
				$sort_var = 'salarygrade';
			}

			if ($order == 'Ascending') {
				# code...
				$order_var = 'ASC';
			}elseif ($order == 'Descending') {
				# code...
				$order_var = 'DESC';
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
						<th style="text-align: center;">PAYROLL</th>
						<th style="text-align: center;">EDIT</th>
						<th style="text-align: center;">DELETE</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                        $result = $conn->query("SELECT * FROM employees ORDER BY {$sort_var} {$order_var}");;	
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
								echo "<tr>
										<td>".$row['id']."</td>
										<td>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
										<td>".$row['division']."</td>
										<td>".$row['office']."</td>
										<td>".$row['position']."</td>
										<td>".$row['salarygrade']."</td>
										<td style = 'text-align: center;'><a href = 'view_summary.php?id=".$row['id']."'>View</a></td>
										<td style = 'text-align: center;'><a href = 'encode.php?id=".$row['id']."'>Encode</a></td>
										<td><a href = 'edit_employee.php?update={$row['id']}'>Edit</a></td>
										<td><a href = 'emp_del_confirm.php?id=".$row['id']."'>Delete</a></td>
									</tr>";
                            }
                        }
                    ?>
                </tbody>
            </div>
        </table>
	</body>
</html>