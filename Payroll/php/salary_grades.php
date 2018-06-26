<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/materialize.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="portal.php">HOME</a></li>
					<li><a href="portal.php">DEDUCTIONS</a></li>
					<li><a href="portal.php">EDIT SALARY</a></li>
					<li><a href="salary_grades.php">SALARY GRADES</a></li>
					<li><a href="portal.php">BONUSES</a></li>
					<li><a href="portal.php">TAX</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
		</nav>

        <h3>Payslip System</h3>
        <?php 
            include 'search_main.php';
        ?>

		<div id="main">
			<div id="inner_main"><br>

			<?php
				$result = $conn->query("SELECT * FROM salary_grade");
				//$result = $conn->query("SELECT * FROM employees");
				echo "<table>";
				echo "<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Position</th>
						<th>Division</th>
						<th>Office</th>
						<th>Action</th>
					</tr>";
				while ($row = $result->fetch_assoc()) {
					# code...
					echo "<tr>
							<td><input readonly class='tb_size_small' type ='text' value='".$row['id']."'/></td>
							<td><input readonly class='tb_size_large' type ='text' value='".$row['lastname'].", ".$row['firstname']." ".$row['middle_initial'].".'/></td>
							<td><input readonly class='tb_size_medium' type ='text' value='".$row['position']."'/></td>
							<td><input readonly class='tb_size_medium' type ='text' value='".$row['division']."'/></td>
							<td><input readonly class='tb_size_medium' type ='text' value='".$row['office']."'/></td>
							<td style = 'text-align: center;'><a href= 'portal_view.php?id=".$row['id']."'>View</a></td>
						</tr>";
				}
				echo "</table>";
			?>
			</div>
		</div>
	</body>
</html>