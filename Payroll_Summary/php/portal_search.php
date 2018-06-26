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
<div id="inner_main">
<?php
		$sort = $_POST['categ_op_search'];
	    $keyword = $_POST['keyword'];
	    $sort_var;

	    if ($sort == 'Employee ID') {
	    	# code...
	    	$sort_var = 'id';
	    } elseif ($sort == 'Last Name') {
	    	# code...
	    	$sort_var = 'lastname';
	    }elseif ($sort == 'First Name') {
	    	# code...
	    	$sort_var = 'firstname';
	    }elseif ($sort == 'Last Name') {
	    	# code...
	    	$sort_var = 'middlename';
	    }elseif ($sort == 'Division') {
	    	# code...
	    	$sort_var = 'division';
	    }elseif ($sort == 'Position') {
	    	# code...
	    	$sort_var = 'position';
	    }elseif ($sort == 'Salary Grade') {
	    	# code...
	    	$sort_var = 'salarygrade';
	    }

	  if ($sort == '----------' || $keyword =='') 
	  {
	  	# code...
	  	echo "<h2>Invalid Inputs</h2>";
	  }
	else{

	$result = $conn->query("SELECT * FROM employees WHERE {$sort_var} LIKE '%{$keyword}%'");
	    
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>Emp ID</th>";
	    echo "<th>Full Name</th>";
	    echo "<th>Division</th>";
	    echo "<th>Office</th>";
	    echo "<th>Position</th>";
	    echo "<th>SG</th>";
	    echo "<th>View</th>";
	    echo "<th>Payroll</th>";
	    echo "<th>Edit</th>";
	    echo "<th>Delete</th>";
	    echo "</tr>";
	    while($row = $result->fetch_assoc()){
	    	echo '<tr>';
			echo '<td><input class = "tb_size0" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$row['division'].'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$row['office'].'"</input></td>';
			echo '<td><input class = "tb_size3" readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '<td><input class = "tb_size4" readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
			echo '<td><a href = "view_summary.php?id='.$row['id'].'">View</a></td>';
			echo '<td><a href = "encode.php?id='.$row['id'].'">Encode</a></td>';
			echo "<td><a href ='edit_employee.php?update={$row['id']}'>Edit</a></td>";
			echo '<td><a href = "#?id='.$row['id'].'">Delete</a></td>';
			echo '</tr>';
	    }
	    echo "</table>";
	}


?>


	
</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>