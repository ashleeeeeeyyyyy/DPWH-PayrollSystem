<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirm Delete Monthly</title>
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
                        <li><a href="import_form.php">UPLOAD CSV FILE</a></li>
                        <li><a href="delete_monthly.php">DELETE MONTHLY ENTRY</a></li>
                        <li><a href="checklist.php">CHECKLIST</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>

		<h2 style="text-align:center;">Confirm Delete Monthly</h2><hr>

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
	</body>
</html>