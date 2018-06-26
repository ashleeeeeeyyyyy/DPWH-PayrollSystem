<?php

include 'dbconn.php';

$month = $_POST['month'];
$year = $_POST['year'];
$month_var = '';

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

$result = $conn->query("SELECT * FROM payroll_data WHERE month_num = '".$month_var."' AND year = '".$year."'");

if ($month == '----------' || $year == '') {
	# code...
	echo "Error";
}else{
	if ($result->num_rows > 0) {
		# code...
		echo "may laman";
	}else{
		echo "walang laman";
	}
}

?>