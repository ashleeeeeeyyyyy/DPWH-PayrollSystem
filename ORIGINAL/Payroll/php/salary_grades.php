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
<h3>Payslip System</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<br>
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

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>