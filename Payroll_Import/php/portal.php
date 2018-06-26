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
	<style type="text/css">
		#inner_main tr:hover{
			background: #020066;
			transition: .2s;
		}
	</style>
<body>
<?php 
	include 'search_main.php';
?>
<div id="main">
<div id="inner_main">
<?php
	

	$result = $conn->query("SELECT * FROM employees ORDER BY lastname ASC");
	    
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
			echo '<td><a href = "emp_del_confirm.php?id='.$row['id'].'">Delete</a></td>';
			echo '</tr>';
	    }
	    echo "</table>";
?>


	
</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>