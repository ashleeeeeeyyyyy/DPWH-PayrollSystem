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
		$keyword = $_POST['keyword'];
		$categ = $_POST['categ_op_search'];
		$categ_var;

		if ($year == '' || $keyword == '') {
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
		if ($categ == "Employee ID") {
			# code...
			$categ_var = 'id';
		}elseif ($categ == "Last Name") {
			# code...
			$categ_var = 'lastname';
		}elseif ($categ == "First Name") {
			# code...
			$categ_var = 'firstname';
		}elseif ($categ == "Middle Name") {
			# code...
			$categ_var = 'middlename';
		}elseif ($categ == "Division") {
			# code...
			$categ_var = 'division';
		}elseif ($categ == "Office") {
			# code...
			$categ_var = 'office';
		}elseif ($categ == "Position") {
			# code...
			$categ_var = 'position';
		}elseif ($categ == "Salary Grade") {
			# code...
			$categ_var = 'salarygrade';
		}

	    $result2 = $conn->query("SELECT * FROM employees WHERE {$categ_var} LIKE '{$keyword}%'");
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