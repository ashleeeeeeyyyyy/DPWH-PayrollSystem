<!DOCTYPE html>
<html>
<head>
	<!--
	<a href="trials.php">Trials</a>
	-->
	<title></title>
	<?php
		include 'session_check.php';
		include 'dbconn.php';
		include 'links.php';
	?>
</head>
	<style type="text/css">
		#inner_main tr:hover{
			background: #020066;
			transition: .2s;
		}
	</style>
<body>
<h3>Payslip</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<?php
	$sort = $_POST['sort_op'];
	$sort_var;
	$sortor = $_POST['sort_or'];
	$sort_or;
					//<option>Employee ID</option>
					//<option>Last Name</option>
					//<option>First Name</option>
					//<option>Middle Name</option>
					//<option>Division</option>
					//<option>Office</option>
					//<option>Position</option>
					//<option>Salary Grade</option>
	if ($sort == "Employee ID") {
		# code...
		$sort_var = 'id';
	}elseif ($sort == "Last Name") {
		# code...
		$sort_var = 'lastname';
	}elseif ($sort == "First Name") {
		# code...
		$sort_var = 'firstname';
	}elseif ($sort == "Middle Name") {
		# code...
		$sort_var = 'middlename';
	}elseif ($sort == "Division") {
		# code...
		$sort_var = 'division';
	}elseif ($sort == "Office") {
		# code...
		$sort_var = 'office';
	}elseif ($sort == "Position") {
		# code...
		$sort_var = 'position';
	}elseif ($sort == "Salary Grade") {
		# code...
		$sort_var = 'salarygrade';
	}

	if ($sortor == "Ascending") {
		# code...
		$sort_or = 'ASC';
	}elseif ($sortor == "Descending") {
		# code...
		$sort_or = 'DESC';
	}




	$result = $conn->query("SELECT * FROM employees ORDER BY {$sort_var} {$sort_or}");
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
					<td><input readonly class='tb_size_large' type ='text' value='".$row['lastname'].", ".$row['firstname']." ".$row['middlename']."'/></td>
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

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>