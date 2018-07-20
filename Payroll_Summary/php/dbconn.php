<?php
	$conn = mysqli_connect('localhost', 'root', '', 'payroll_summary');
	if (!$conn) {
		die('No database connection: ' . mysqli_connect_error());
	}
?>
