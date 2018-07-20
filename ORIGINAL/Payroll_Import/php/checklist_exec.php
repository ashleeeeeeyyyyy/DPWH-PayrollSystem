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
<h3>Input Year to View</h3>
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
<?php

		

		$year = $_POST['year'];
	    $result2 = $conn->query("SELECT * FROM employees ORDER BY lastname ASC ");
	    echo "<h3>Current Records for ".$year."</h3>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>ID</th>";
	    echo "<th>Full Name</th>";
	    echo "<th>Months</th>";
	    echo "<th>Entries</th>";
	    echo "</tr>";
	    
	    while($row = $result2->fetch_assoc()){
	    	
	    		# code...
	    	echo '<tr>';
	    	echo '<td><input class = "tb_size0" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
	   		echo '<td><input class = "tb_size10" readonly type="text" value="';
	   		$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row['id']."' AND payroll_data.year = '".$year."' ORDER BY month_num ASC");
	   		
	   		while($row2 = $result3->fetch_assoc()){
	   			echo $row2['month'].", ";
	   		}

	   		echo '"</input></td>';
	   		echo "<td>".$result3->num_rows."</td>";
	   		//echo "<td><a href = 'view_individually.php?id=".$row['id']."&year=".$row['year']."'>View</a></td>";
	    	echo '</tr>';
	   		
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";

?>
<hr>
<h3><a href='portal.php'>Go Back</a></h3>
<br>
<br>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>