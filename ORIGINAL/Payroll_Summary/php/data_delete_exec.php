<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include 'session_check.php';
		include 'dbconn.php';
		include 'links.php';
	?>
</head>
<body>
<?php 
	include 'search_main.php';
?>
<div id="main">

<?php
			$id = $_GET['id'];
			$month = $_GET['month'];
			$year = $_GET['year'];
			$conn = new mysqli('localhost','root','','payroll_summary');
			$conn->query("DELETE from payroll_data WHERE id ='".$id."' AND month_num = '".$month."' AND year = '".$year."' ");
			echo '<h3>Deletion Successful</h3>';
			echo '';

echo "<hr>";
echo "<h3><a href = 'view_individually.php?id=".$id."&year=".$year."'>Go Back</a></h3>";
?>


</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>