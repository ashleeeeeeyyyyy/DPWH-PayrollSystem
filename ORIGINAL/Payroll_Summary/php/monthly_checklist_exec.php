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
<h3>Input Year to View</h3>
<br>
<form id="Home" action="monthly_checklist_exec.php" method="post">
	
<table>
	<tr>
		<td>Month: </td>
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

		$month = $_POST['month'];
		$month_var;


		if ($month == 'January') {
		    # code...
		    $month_var = 1;
		}elseif ($month == 'February') {
		    # code...
		    $month_var = 2;
		}elseif ($month == 'March') {
		    # code...
		    $month_var = 3;
		}elseif ($month == 'April') {
		    # code...
		    $month_var = 4;
		}elseif ($month == 'May') {
		    # code...
		    $month_var = 5;
		}elseif ($month == 'June') {
		    # code...
		    $month_var = 6;
		}elseif ($month == 'July') {
		    # code...
		    $month_var = 7;
		}elseif ($month == 'August') {
		    # code...
		    $month_var = 8;
		}elseif ($month == 'September') {
		    # code...
		    $month_var = 9;
		}elseif ($month == 'October') {
		    # code...
		    $month_var = 10;
		}elseif ($month == 'November') {
		    # code...
		    $month_var = 11;
		}elseif ($month == 'December') {
		    # code...
		    $month_var = 12;
		}


		$year = $_POST['year'];
	    $result2 = $conn->query("SELECT * FROM employees WHERE id NOT IN (SELECT id FROM payroll_data WHERE month = '{$month}' AND year = '{$year}') ORDER BY lastname ASC");
	    echo "<h3>Current Records without ".$month." inputs for ".$year."</h3>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>ID</th>";
	    echo "<th>Full Name</th>";
	   // echo "<th>Months</th>";
	    //echo "<th>Entries</th>";
	    echo "<th>Action</th>";
	    echo "</tr>";
	    
	    while($row = $result2->fetch_assoc()){
	    	
	    		# code...
	    	echo '<tr>';
	    	echo '<td><input class = "tb_size0" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
	   		//echo '<td><input class = "tb_size10" readonly type="text" value="';
	   		//$result3 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row['id']."' AND payroll_data.year = '".$year."' ORDER BY month_num ASC");
	   		
	   		//while($row2 = $result3->fetch_assoc()){
	   		//	echo $row2['month'].", ";
	   		//}

	   		//echo '"</input></td>';
	   		//echo "<td>".$result3->num_rows."</td>";
	   		echo "<td><a href='encode.php?id=".$row['id']."'>Encode</a></td>";
	   		//echo "<td><a href = 'view_individually.php?id=".$row['id']."&year=".$row['year']."'>View</a></td>";
	    	echo '</tr>';
	   		
			//echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			//echo "<td><a href ='view_monthly.php?id={$row['id']}'>View Annual Report</a></td>";
			
	    }
	    echo "</table>";

?>
<hr>
<br>
<br>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>