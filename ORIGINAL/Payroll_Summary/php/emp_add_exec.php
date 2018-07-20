x<!DOCTYPE html>
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
<body>
<?php 
	include 'search_main.php';
?>
<div id="main2">

<?php 
	$id = $_POST['em_id'];
	$lname = $_POST['em_lname'];
	$fname = $_POST['em_fname'];
	$mname = $_POST['em_mname'];
	$position = $_POST['em_pos'];
	$div = $_POST['em_div'];
	$sg = $_POST['em_sg'];
	include 'dbconn.php';
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
		$query2 = 'insert into employees (id,lastname,firstname,middlename,position,salarygrade,division) values ("'.$id.'","'.$lname.'","'.$fname.'","'.$mname.'","'.$position.'","'.$sg.'","'.$div.'");';


		if ($conn->query($query2) === true){
			echo "<hr>";
			echo "<br>";
			echo "<h3>New record Created Sucessfully</h3>";
			echo "<br>";
			echo '<h3><a href="portal.php">Back</a></h3>';
			echo "<br>";
			echo "<hr>";
			;
		} else {
			echo "Error: " .$sql. "<br>" .$conn->error;
		}
	}
		

	$conn->close();
	
?>
</div>

</body>
</html>