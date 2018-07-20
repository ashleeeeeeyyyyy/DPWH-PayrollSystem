<!DOCTYPE html>
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
	<!--
	<style type="text/css">
		#inner_main tr:hover{
			background: #020066;
			transition: .2s;
		}
	</style>
	-->
<body>
<h3>Payslip</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<h3>Select Month and Input Year</h3>

<table>
	<form action="payslip_exec.php" method="post">
	<tr>
		<td><label>Input Month: </label></td>
		<td>
			<select name="month">
				<option>----------</option>
				<option>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Input Year: </label></td>
		<td><input type="text" name="year"></input></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="Submit" name="submit" value="Go"></input></td>
	</tr>
</form>
</table>

</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>