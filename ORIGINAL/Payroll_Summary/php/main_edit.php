<!DOCTYPE html>
<html>
<head>
	<a href="trials.php">Trials</a>
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
<div id="main">
<?php
	
	$connection = mysqli_connect("localhost", "root", "", "raut");
	if (isset($_GET['submit'])) {
	$id = $_GET['did'];
	$ano = $_GET['dno'];
	$leavetype = $_GET['em_lt'];
	$mode = $_GET['em_m'];
	$datefrom = $_GET['em_datef'];
	$dateto = $_GET['em_datet'];
	$days0 = $_GET['em_day'];
	$comm = $_GET['em_com'];
	$query = $connection->query("update absences set
	leave_type='$leavetype', mode='$mode', date_from='$datefrom',
	date_to='$dateto', no_days='$days0', comment='$comm' where no='$ano'");
	}
	
	//$query = $connection->query("select * from employees");
	//while ($row = $query->fetch_assoc()) {
	//echo "<b><a href='update.php?update={$row['id']}'>{$row['lastname']}</a></b>";
	//echo "<br />";
	//}

?>
<?php



if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = $connection->query("select * from absences where no=$update");
	echo "<table>";
	echo "<tr></th>";
	echo "<th></th>";
	echo "<th>Current</th>";
	echo "<th>Changes</th>";
	echo "</tr>";
	while ($row = $query1->fetch_assoc()) {
		echo "<form class='form' method='get'>";
		echo "<h2>Update Absence Information</h2>";
		echo "<tr>";
		echo "<td><label>" . "Employee ID: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='did' value='{$row['id']}' />";
		echo "<td><input readonly class='input' type='hidden' name='dno' value='{$row['no']}' /></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Leave Type: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='dname' value='{$row['leave_type']}' />";
		echo "<td>
					<select name = 'em_lt'>
						<option>----------</option>
						<option>Vacation Leave</option>
						<option>Sick Leave</option>
						<option>Rehabilitaion Leave</option>
						<option>Maternity Leave</option>
						<option>Magna Carta</option>
						<option>Solo Parent Leave</option>
						<option>Special Leave Privilege</option>
						<option>CTO</option>
						<option>AWOL</option>
						<option>Study Leave</option>
						<option>Paternity Leave</option>
					</select>
			</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Mode: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='demail' value='{$row['mode']}' />";
		echo "<td>
					<select name = 'em_m'>
						<option>----------</option>
						<option>With Pay</option>
						<option>Without Pay</option>
					</select>
				</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Date From: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='dmobile' value='{$row['date_from']}' />";
		echo "<td><input type='date' name='em_datef'></input></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Date To: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='daddress'value='{$row['date_to']}'>";
		echo "<td><input type='date' name='em_datet'></input></td>";
		echo "</input>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Days: " . "</label>" . "<br />";
		echo "<td><input readonly class='input' type='text' name='dsg'value='{$row['no_days']}'>";
		echo "<td><input type='text' name='em_day'></input></td>";
		echo "</input>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label>" . "Comment: " . "</label>" . "<br />";
		echo "<td><textarea readonly class='input' name='dsg'>".$row['comment']."</textarea></td>";
		echo "<td><textarea name='em_com'></textarea></textarea></td>";
		echo "</input>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "<td>";
		echo "<td><input class='addbtn' type='submit' name='submit' value='Update' />";
		echo "</tr>";
		echo "</form>";
		echo '<form id="atu" action="emp_absence_view2.php?id='.$row['id'].'&no='.$row['no'].'" method="post">
				<input class="backbtn" type="submit" value="Back"></input>
			</form>
		';
}
	echo "</table>";
}
if (isset($_GET['submit'])) {
	if($leavetype == '----------' || $mode == '----------'|| $days0 == ''){
		echo "<h2>Please Complete Blank Fields</h2>";
		echo '';
		echo "<form id='atu' action='emp_absence_edit.php?update=".$ano."' method='post'>
				<input class='backbtn' type='submit' value='Back'></input>
			</form>";
	
	}else{
	echo '<h3>Data Updated Successfuly......!!</h3>';
	$id = $_GET['did'];
	echo "<form id='atu' action='emp_absence_edit.php?update=".$ano."' method='post'>
				<input class='backbtn' type='submit' value='Back'></input>
			</form>";
	}
}


?>


	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>