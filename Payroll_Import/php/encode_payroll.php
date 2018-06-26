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
		$month = $_POST['month'];
		$year = $_POST['year'];
		$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");

		$verify = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE payroll_data.id = '{$id}' AND payroll_data.month = '{$month}' AND payroll_data.year = '{$year}'");

		if ($year == '') {
			# code...
			echo "<br>";
			echo "<h3>Please Enter Year</h3>";
			echo "<br>";
			echo "<div id='anchor'><a href ='encode.php?id=".$id."'>Go Back</a></div>";
		}elseif ($verify->num_rows == 1) {
			//header('Location: encode.php?id='.$id.'');
			# code...
			while($row = $result->fetch_assoc()){
				echo "<br>";
				echo "<h3>".$month." Entry Already Exist for ".$row['lastname'].', '.$row['firstname'].' '.$row['middlename']."</h3>";
				echo "<br>";
				//echo "<h3>Do you want to go to Edit page instead?</h3>";
				echo "<h3>Please go back to previous page</h3>";
				echo "<h3>and Check Details</h3>";
				echo "<br>";
				echo "<div id='anchor'><a href ='encode.php?id=".$id."'>Go Back</a></div>";
			}
			
		}else{


		echo "<br>";
	    echo "<h3>Data for the month of ".$month." year ".$year."</h3>";
	    echo "<h4>(Please Input '0' (Zero) on Blank Fields to avoid database errors)</h4>";
	    echo "<br>";
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>Emp ID</th>";
	    echo "<th>Full Name</th>";
	    echo "<th>Division</th>";
	    echo "<th>Position</th>";
	    echo "<th>SG</th>";
	    echo "</tr>";
	    while($row = $result->fetch_assoc()){
	    	echo '<tr>';
			echo '<td><input class = "tb_size0" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$row['division'].'"</input></td>';
			echo '<td><input class = "tb_size3" readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '<td><input class = "tb_size4" readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
			echo '</tr>';
	    }
	    echo "</table>";
	    echo "<br>";
	    include 'encode_form.php';
	    }
	    
	    

?>


</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>

<script type="text/javascript">

	function formatCurrency(num) {
		num = num.toString().replace(/\₱|\,/g,'');
		if(isNaN(num))
			num = "0";
			sign = (num == (num = Math.abs(num)));
			num = Math.floor(num*100+0.50000000001);
			cents = num%100;
			num = Math.floor(num/100).toString();
		if(cents<10)
			cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
			num = num.substring(0,num.length-(4*i+3))+','+
			num.substring(num.length-(4*i+3));
		return (((sign)?'':'-') + '₱' + num + '.' + cents);
	}



</script>

</html>