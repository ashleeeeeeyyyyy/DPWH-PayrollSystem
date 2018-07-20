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
<h3>Employee Detail</h3>
<?php
		$id = $_GET['id'];
		$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
	    
	    echo "<table>";
	    
	    while($row = $result->fetch_assoc()){
	    	echo '<tr>';
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
	    	
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";

?>
<hr>
<h3>Select Payroll Summary Record (Print View)</h3>
		<?php
			echo '<form id="Home" action="view_monthly.php?id='.$id.'" method="post">';
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
<h3>Add Monthly Payroll Summary Record</h3>
<br>
		<?php
			echo '<form id="Home" action="encode_payroll.php?id='.$id.'" method="post">';
		?>

<table>
	<tr>
		<td>Select Month: </td>
		<td>
			<select name = "month">
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
<?php
		
		$id = $_GET['id'];
	    $result2 = $conn->query("SELECT DISTINCT payroll_data.year FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' ORDER BY payroll_data.year DESC ");
	    echo "<h3>Current Records</h3>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th></th>";
	    echo "<th></th>";
	    echo "<th>Months</th>";
	    echo "<th>Entries</th>";
	    echo "<th>Action</th>";
	    echo "</tr>";
	    
	    while($row = $result2->fetch_assoc()){
	    	
	    		# code...
	    	echo '<tr>';
	    	echo "<td class='format'><label >Current data for the year </label></td>";
	    	echo '<td><label>'.$row['year'].': </label></td>';
	   		echo '<td><input class = "tb_size10" readonly type="text" value="';
	   		$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."' AND year = ".$row['year']." ORDER BY month_num ASC");
	   		
	   		while($row2 = $result3->fetch_assoc()){
	   			echo $row2['month'].", ";
	   		}

	   		echo '"</input></td>';
	   		echo "<td>".$result3->num_rows."</td>";
	   		echo "<td><a href = 'view_individually.php?id=".$id."&year=".$row['year']."'>View</a></td>";
	    	echo '</tr>';
	   		
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";

?>
<hr>

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>