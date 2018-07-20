<?php
	$conn = mysqli_connect('localhost', 'root', '', 'payroll_summary');
	$error = "";
	if (!$conn) {
		$error = 'No database connection.';
		exit();
	}
?>
