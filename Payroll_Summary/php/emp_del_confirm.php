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
<div id="main">

<?php

$id = $_GET['id'];

include 'dbconn.php';
$result = $conn->query("SELECT * FROM employees WHERE id = '".$id."'");
echo "<h3>Are you sure you want to delete this entry?</h3>";
echo "<table>";
while($row = $result->fetch_assoc()){
 			

	    	echo '<tr>';
	    	echo '<td>Employee ID: </td>';
			echo '<td><input readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Last Name: </td>';
			echo '<td><input readonly type="text" value="'.$row['lastname'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>First Name: </td>';
			echo '<td><input readonly type="text" value="'.$row['firstname'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Middle Name: </td>';
			echo '<td><input readonly type="text" value="'.$row['middlename'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Position: </td>';
			echo '<td><input readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Salary Grade: </td>';
			echo '<td><input readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Action: </td>';
			echo '<td><a href = "emp_del.php?id='.$row['id'].'">Confirm</a></td>';
			echo '</tr>';
			
}
	   		echo "</table>";
echo "<hr>";
echo "<h3><a href = 'portal.php'>Go Back</a></h3>";

mysqli_close($conn);
?>


	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>