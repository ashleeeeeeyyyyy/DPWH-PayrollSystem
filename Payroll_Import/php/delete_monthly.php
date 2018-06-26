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
<div id="sub">
<br>
<h3>Input Month and Year to Delete from Records</h3>
<br>
<form id="Home" action="delete_monthly_confirm.php" method="post">
	
<table>
	<tr>
		<td>Month: </td>
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
		<td>Year: </td>
		<td><input type="text" maxlength = "4" name="year"></input></td>
		<td><input type="submit" value="Go"></input></td>
	</tr>
	<tr>
		
	</tr>
</table>

</form>
<hr>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>