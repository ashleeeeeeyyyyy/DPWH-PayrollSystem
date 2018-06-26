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
	<div id="list_view">
	<?php
		$year = $_POST['year'];
		$sort = $_POST['sort_op'];
		$sort_var;
		$sortor = $_POST['sort_or'];
		$sort_or;

		if ($year == '') {
			# code...
			echo "<h3>Please Complete Blank Fields</h3>";
		}else{


						//<option>Employee ID</option>
						//<option>Last Name</option>
						//<option>First Name</option>
						//<option>Middle Name</option>
						//<option>Division</option>
						//<option>Office</option>
						//<option>Position</option>
						//<option>Salary Grade</option>
		if ($sort == "Employee ID") {
			# code...
			$sort_var = 'id';
		}elseif ($sort == "Last Name") {
			# code...
			$sort_var = 'lastname';
		}elseif ($sort == "First Name") {
			# code...
			$sort_var = 'firstname';
		}elseif ($sort == "Middle Name") {
			# code...
			$sort_var = 'middlename';
		}elseif ($sort == "Division") {
			# code...
			$sort_var = 'division';
		}elseif ($sort == "Office") {
			# code...
			$sort_var = 'office';
		}elseif ($sort == "Position") {
			# code...
			$sort_var = 'position';
		}elseif ($sort == "Salary Grade") {
			# code...
			$sort_var = 'salarygrade';
		}

		if ($sortor == "Ascending") {
			# code...
			$sort_or = 'ASC';
		}elseif ($sortor == "Descending") {
			# code...
			$sort_or = 'DESC';
		}

	    $result2 = $conn->query("SELECT * FROM employees ORDER BY {$sort_var} {$sort_or} ");
	    echo "<h3>Existing Payslips for ".$year."</h3>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>ID</th>";
	    echo "<th>Full Name</th>";
	    echo "<th>Position</th>";
	    echo "<th>Division</th>";
	    echo "<th>Office</th>";
	    echo "<th>Months</th>";
	    echo "<th>Entries</th>";
	    echo "</tr>";
	    
	    while($row = $result2->fetch_assoc()){
	    	
	    		# code...
	    	echo '<tr>';
	    	echo '<td><input class = "tb_size_small" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size_medium" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
			echo '<td><input class = "tb_size_medium" readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '<td><input class = "tb_size_small" readonly type="text" value="'.$row['division'].'"</input></td>';
			echo '<td><input class = "tb_size_small" readonly type="text" value="'.$row['office'].'"</input></td>';
	   		echo '<td><input class = "tb_size10" readonly type="text" value="';
	   		$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row['id']."' AND payroll_data.year = '".$year."' ORDER BY month_num ASC");
	   		
	   		while($row2 = $result3->fetch_assoc()){
	   			echo $row2['month'].", ";
	   		}

	   		echo '"</input></td>';
	   		echo "<td style = 'text-align: center;'>".$result3->num_rows."</td>";
	   		//echo "<td><a href = 'view_individually.php?id=".$row['id']."&year=".$row['year']."'>View</a></td>";
	    	echo '</tr>';
	   		
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";
	}
	    ?>
</div>

</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>