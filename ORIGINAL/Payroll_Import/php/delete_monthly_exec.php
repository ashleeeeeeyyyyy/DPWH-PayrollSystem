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
<div id="sub">
<br>
<br>
<form id="Home" action="monthly_checklist_exec.php" method="post">
	
<?php

$month_var = $_GET['month_num'];
$month = $_GET['month'];
$year = $_GET['year'];

$result = $conn->query("DELETE FROM payroll_data WHERE month_num = {$month_var} AND year = {$year}");
echo "<h3>Records for the month of ".$month." year ".$year."</h3>";
echo "<h3>Successfully deleted</h3>";

?>

</form>
<hr>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>