<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Employee</title>
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
			$id = $_POST['em_id'];
			$lname = $_POST['em_lname'];
			$fname = $_POST['em_fname'];
			$mname = $_POST['em_mname'];
			$position = $_POST['em_pos'];
			$div = $_POST['em_div'];
			$sg = $_POST['em_sg'];
			$office = $_POST['em_off'];
			include '../../Includes/dbconn.php';
			if($lname == '' || $fname == '' || $mname == '' || $position == ''){
				echo '';
				echo "<hr>";
				echo "<br>";
				echo "<h2>Please Complete Blank Fields</h2>";
				echo "<br>";
				echo '<h3><a href="emp_add.php">Back</a></h3>';
				echo "<br>";
				echo "<hr>";
			}else{
				$query2 = 'insert into employees (id,lastname,firstname,middlename,position,salarygrade,division,office) values ("'.$id.'","'.$lname.'","'.$fname.'","'.$mname.'","'.$position.'","'.$sg.'","'.$div.'","'.$office.'");';
				if ($conn->query($query2) === true){
					echo "<br>";
					echo "<h3><center>New Employee Has Been Created Sucessfully</center></h3>";
					echo "<br>";
					;
				} else {
					echo "Error: " .$sql. "<br>" .$conn->error;
				}
			}
			$conn->close();
		?>
	</body>
</html>