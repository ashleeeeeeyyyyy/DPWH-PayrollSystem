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
<h3>Input Month and Year to Delete from Records</h3>
<br>
<form id="Home" action="monthly_checklist_exec.php" method="post">
	
<?php

$month = $_POST['month'];
$year = $_POST['year'];
$month_var;

if ($month == "----------" || $year == "") {
	# code...
	echo "<h3><a href='delete_monthly.php'>Go Back</a></h3>";
}else{

if ($month == 'January') {
		    # code...
		    $month_var = 1;
		}elseif ($month == 'February') {
		    # code...
		    $month_var = 2;
		}elseif ($month == 'March') {
		    # code...
		    $month_var = 3;
		}elseif ($month == 'April') {
		    # code...
		    $month_var = 4;
		}elseif ($month == 'May') {
		    # code...
		    $month_var = 5;
		}elseif ($month == 'June') {
		    # code...
		    $month_var = 6;
		}elseif ($month == 'July') {
		    # code...
		    $month_var = 7;
		}elseif ($month == 'August') {
		    # code...
		    $month_var = 8;
		}elseif ($month == 'September') {
		    # code...
		    $month_var = 9;
		}elseif ($month == 'October') {
		    # code...
		    $month_var = 10;
		}elseif ($month == 'November') {
		    # code...
		    $month_var = 11;
		}elseif ($month == 'December') {
		    # code...
		    $month_var = 12;
		}

		echo "<h3>Are you sure you want to delete all ".$month." records of year ".$year."</h3>";
		echo "<br>";
		echo "<h3><a href = 'delete_monthly_exec.php?month=".$month."&month_num=".$month_var."&year=".$year."'>Confirm</a></h3>";
		echo "<br>";
		echo "<h3><a href='delete_monthly.php'>Go Back</a></h3>";
}
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