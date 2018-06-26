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
<h3>List View</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<div>
	<h3>List View</h3>
		<form id="Home" action="list_view_exec.php" method="post">
	
	<table>
	<tr>
		<td>Year: </td>
		<td><input type="text" maxlength = "4" name="year"></input><input type="submit" value="Go"></input></td>
	</tr>
	</table>

	</form>
	<hr>
	</div>
	<?php 
		include 'list_view_ss_menu.php';
	 ?>




</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>