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

<?php
/*
		$id = $_GET['id'];
		$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
	    
	    echo "<table>";
	    while($row = $result->fetch_assoc()){
	    	echo "<td class='format'><label >Employee ID: </label></td>";
	    	echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['id'].'"</input></td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo "<td class='format'><label>Full Name: </label></td>";
	    	echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo "<td class='format'><label>Division: </label></td>";
	    	echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['division'].'"</input></td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo "<td class='format'><label>Position: </label></td>";
	    	echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['position'].'"</input></td>';
	    	echo '</tr>';
	    	echo '<tr>';
	    	echo "<td class='format'><label>Salary Grade: </label></td>";
	    	echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
	    	echo '</tr>';
	    }
	    echo "</table>";
	    */

?>

<br>
<h3>Select Payroll Summary Record</h3>
<br>
		<?php
			echo '<form id="Home" action="annual_report.php" method="post">';
		?>

<table>
	<tr>
		<td>Input Year: </td>
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