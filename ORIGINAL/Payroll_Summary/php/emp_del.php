<!DOCTYPE html>
<html>
<head>
	<a href="trials.php">Trials</a>
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


			$conn = new mysqli('localhost','root','','payroll_summary');
			$conn->query("DELETE from payroll_data where id ='".$id."'");
			$conn->query("DELETE from employees where id ='".$id."'");
			echo '<h3>Deletion Successful</h3>';
			echo '';
?> 


	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>