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
<h3>Payslip</h3>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<?php
	$id = $_GET['id'];
	$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
	
	while ($row = $result->fetch_assoc()) {
		# code...
		echo "<table>";
		echo "<tr>
					<td><label>ID: </label></td>
					<td><input readonly class='tb_size_large' type ='text' value='".$row['id']."'/></td>
			  </tr>
			  <tr>
			  		<td><label>Name: </label></td>
					<td><input readonly class='tb_size_large' type ='text' value='".$row['lastname'].", ".$row['firstname']." ".$row['middlename']."'/></td>
			  </tr>
			  <tr>
			  		<td><label>Position: </label></td>
					<td><input readonly class='tb_size_large' type ='text' value='".$row['position']."'/></td>
			  </tr>
			  <tr>
			  		<td><label>Division: </label></td>
					<td><input readonly class='tb_size_large' type ='text' value='".$row['division']."'/></td>
			  </tr>
			  <tr>
			  		<td><label>Office: </label></td>
					<td><input readonly class='tb_size_large' type ='text' value='".$row['office']."'/></td>
			  </tr>";
		echo "</table>";
	}
	echo "<hr>";
		
	    $result2 = $conn->query("SELECT DISTINCT payroll_data.year FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' ORDER BY payroll_data.year DESC ");
	    echo "<h3>Current Records</h3>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>Year</th>";
	    echo "<th>Months</th>";
	    echo "<th>Entries</th>";
	    echo "</tr>";
	    
	    while($row = $result2->fetch_assoc()){
	    	
	    		# code...
	    	echo '<tr>';
	    	echo '<td><label>'.$row['year'].': </label></td>';
	   		echo '<td><input class = "tb_size10" readonly type="text" value="';
	   		$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' AND year = ".$row['year']." ORDER BY month_num ASC");
	   		
	   		while($row2 = $result3->fetch_assoc()){
	   			echo $row2['month'].", ";
	   		}

	   		echo '"</input></td>';
	   		echo "<td>".$result3->num_rows."</td>";
	    	echo '</tr>';
	   		
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";


	echo "<hr>";
	echo "<h3>View Payslip</h3>";
	echo '<table>
			<form action="indi_payslip_exec.php?id='.$id.'" method="post">
			<tr>
				<td><label>Input Month: </label></td>
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
			</tr>
			<tr>
				<td><label>Input Year: </label></td>
				<td><input type="text" name="year"></input></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="Submit" name="submit" value="Go"></input></td>
			</tr>
		</form>
		</table>';
	
?>



</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>