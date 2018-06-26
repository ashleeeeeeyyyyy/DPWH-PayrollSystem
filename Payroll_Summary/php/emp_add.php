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
<div id="main2">
<br>
<h3>Add Employee Form</h3>
<br>
<form id="atu" action="emp_add_exec.php" method="post">
		<table>
			<tr>
				<td>Employee ID: </td>
				<td><input type="text" maxlength = "7" name="em_id"></input></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td><input type="text" name="em_lname"></input></td>
			</tr>
			<tr>
				<td>First Name: </td>
				<td><input type="text" name="em_fname"></input></td>
			</tr>
			<tr>
				<td>Middle Name: </td>
				<td><input type="text" name="em_mname"></input></td>
			</tr>
			<tr>
			<td><label>Division: </label><br />
			<td>
					<select name = 'em_div'>
						<option>----------</option>
						<option>ADMINISTRATIVE</option>
						<option>B.B.K.N.</option>
						<option>CONSTRUCTION</option>
						<option>E.M.D.</option>
						<option>FINANCE</option>
						<option>J.I.C.A.</option>
						<option>WEIGHBRIDGE</option>
						<option>O.R.D.</option>
						<option>PLANNING AND DESIGN</option>
						<option>Q.A.H.D.</option>
						<option>MAINTENANCE</option>
					</select>
				</td>
			</tr>
			<tr>
			<td><label>Office: </label><br />
			<td>
					<select name = 'em_off'>
						<option>----------</option>
						<option>CAR Regional Office</option>
						<option>Abra DEO</option>
						<option>Apayao First DEO</option>
						<option>Apayao Second DEO</option>
						<option>Baguio DEO</option>
						<option>Benguet First DEO</option>
						<option>Benguet Second</option>
						<option>Ifugao First DEO</option>
						<option>Ifugao Second DEO</option>
						<option>Upper Kalinga DEO</option>
						<option>Lower Kalinga DEO</option>
						<option>Mountain Province First DEO</option>
						<option>Mountain Province Second DEO</option>
						<option>Mt. Province Area Equipment Section</option>
						<option>Benguet Area Equipment Section</option>
						<option>Abra Area Equipment Section</option>
						<option>Ifugao Area Equipment Section</option>
						<option>Kalinga Area Equipment Section</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Position: </td>
				<td><input type="text" name="em_pos"></input></td>
			</tr>
			<tr>
				<td>Salary Grade: </td>
				<td><input type="text" name="em_sg"></input></td>
			</tr>
			<tr>
				<td>Action: </td>
				<td><input class = "addbtn" type="submit" value="Add"></input></td>
			</tr>

	</table>
	</form>
	<hr>
	<h3><a href = 'portal.php'>Go Back</a></h3>


	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>