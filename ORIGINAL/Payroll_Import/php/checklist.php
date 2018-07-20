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
<h3>Input Year to View Checklist</h3>
<br>
<form id="Home" action="checklist_exec.php" method="post">
	
<table>
	<tr>
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