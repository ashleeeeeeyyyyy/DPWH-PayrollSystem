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
<h3>Individual Payslip (Whole Year)</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<h3>Select Month and Input Year</h3>

<table>
	<form action="indi_payslip_form.php" method="post">
	<tr>
			<td>
				<label>Category: </label>
			</td>
			<td>
				<select name="categ_op_search">
					<option>Last Name</option>
					<option>First Name</option>
					<option>Middle Name</option>
					<option>Division</option>
					<option>Employee ID</option>
					<option>Office</option>
					<option>Position</option>
					<option>Salary Grade</option>
				</select>
			</td>
			<td>
			</td>
			
		</tr>
		
		
		<tr>
			<td>
				<label>Keyword: </label>
			</td>
			<td>
				<input type="text" name='keyword'></input>
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