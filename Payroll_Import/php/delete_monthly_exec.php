<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Monthly</title>
</head>
<body>

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
</body>
</html>