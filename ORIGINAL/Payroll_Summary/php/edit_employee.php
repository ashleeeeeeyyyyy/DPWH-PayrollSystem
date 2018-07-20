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

<?php
	if (isset($_GET['submit'])) {
	$id = $_GET['did'];
	$lname = $_GET['lname'];
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$position = $_GET['posi'];
	$divi = $_GET['em_div'];
	$office = $_GET['em_off'];
	$sg = $_GET['dsg'];
	$query = $conn->query("update employees set
	lastname='$lname', firstname='$fname', middlename='$mname', division='$divi',
	position='$position', salarygrade='$sg', office = '$office' where id='$id'");
	}
	//$query = $conn->query("select * from employees");
	//while ($row = $query->fetch_assoc()) {
	//echo "<b><a href='update.php?update={$row['id']}'>{$row['lastname']}</a></b>";
	//echo "<br />";
	//}
?>

<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = $conn->query("select * from employees where id='{$update}'");
	echo "<table>";
	while ($row = $query1->fetch_assoc()) {
		echo "<form class='form' method='get'>";
		echo "<h2>Update Employee Information</h2>";
		echo "<td><label>" . "Employee ID: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='did' value='{$row['id']}' />";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Last Name: " . "</label>" . "<br />";
		echo "<td><input class='input' type='text' name='lname' value='{$row['lastname']}' />";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "First Name: " . "</label>" . "<br />";
		echo "<td><input class='input' type='text' name='fname' value='{$row['firstname']}' />";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Middle Name: " . "</label>" . "<br />";
		echo "<td><input class='input' type='text' name='mname' value='{$row['middlename']}' />";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Division: " . "</label>" . "<br />";
		echo "<td>
					<select name = 'em_div'>
						<option>{$row['division']}</option>
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
				</td>";
		echo "</tr>";
		echo "<td><label>Office: </label><br />
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
				</td>";
		echo "<tr>";
		echo "<td><label>" . "Position: " . "</label>" . "<br />";
		echo "<td><input class='input' type='text' name='posi'value='{$row['position']}'>";
		echo "</input>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Salary Grade: " . "</label>" . "<br />";
		echo "<td><input class='input' type='text' name='dsg'value='{$row['salarygrade']}'>";
		echo "</input>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "<td><input class='addbtn' type='submit' name='submit' value='Update' />";
		echo "</tr>";
		echo "</form>";
}
	echo "</table>";
}
if (isset($_GET['submit'])) {
	$id = $_GET['did'];
	echo "<br>";
	echo '<h3>Data Updated Successfuly!!</h3>';
	echo "<br>";
}
?>
<hr>
<h3><a href='portal.php'>Go Back</a></h3>

	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>
