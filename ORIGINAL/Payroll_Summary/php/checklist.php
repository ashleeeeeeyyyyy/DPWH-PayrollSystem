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
<h3><a href='portal.php'>Go Back</a></h3>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>