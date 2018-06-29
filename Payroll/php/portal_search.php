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
        
        <h2 style="text-align: center;">Payslip System</h2>
        <?php 
            include 'search_main.php';
        ?><br><br><br><br>

		<?php
			$search = $_POST['categ_op_search'];
			$search_var;
			$keyword = $_POST['keyword'];
							//<option>Employee ID</option>
							//<option>Last Name</option>
							//<option>First Name</option>
							//<option>Middle Name</option>
							//<option>Division</option>
							//<option>Office</option>
							//<option>Position</option>
							//<option>Salary Grade</option>
			if ($search == "Employee ID") {
				# code...
				$search_var = 'id';
			}elseif ($search == "Last Name") {
				# code...
				$search_var = 'lastname';
			}elseif ($search == "First Name") {
				# code...
				$search_var = 'firstname';
			}elseif ($search == "Middle Name") {
				# code...
				$search_var = 'middlename';
			}elseif ($search == "Division") {
				# code...
				$search_var = 'division';
			}elseif ($search == "Office") {
				# code...
				$search_var = 'office';
			}elseif ($search == "Position") {
				# code...
				$search_var = 'position';
			}elseif ($search == "Salary Grade") {
				# code...
				$search_var = 'salarygrade';
			}
			?>
		
		<table class="table table-bordered table-hover table-condensed">
            <div class="table responsive">
                <thead>
                    <tr class="bg-primary">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">NAME</th>
                        <th style="text-align: center;">POSITION</th>
                        <th style="text-align: center;">DIVISION</th>
                        <th style="text-align: center;">OFFICE</th>
                        <th style="text-align: center;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $conn->query("SELECT * FROM employees WHERE {$search_var} LIKE '%{$keyword}%'");
                        if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial']."</td>
                                        <td>".$row['position']."</td>
                                        <td>".$row['division']."</td>
                                        <td>".$row['office']."</td>
                                        <td style = 'text-align: center;'><a href= 'portal_view.php?id=".$row['id']."'>View</a></td>
                                      </tr>";
                            }
                        }
                    ?>
                </tbody>
            </div>
        </table>
	</body>
</html>