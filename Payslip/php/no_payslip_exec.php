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
		include 'universal_footer.php';
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
<button onclick="myFunction()" class="print">Save as PDF</button>
<script>
function myFunction() {
    window.print();
}
$(document).ready(function(){
	var head = $('table thead tr');
	$( "tbody tr:nth-child(10n+10)" ).after(head.clone());
});
</script>
<body>

<div class="for_print">
	<?php 
	$year = $_POST['year'];
	$month = $_POST['month'];
	$month_var;

	if ($month == "----------" || $year == "") {
		# code...
		echo "Error";
	}else{

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
		$format_var = '₱0.00';

		//$result = $conn->query("SELECT * FROM employees");
		
		//while ($row2 = $result->fetch_assoc()) {
			# code...

			$result2 = $conn->query("SELECT * FROM employees WHERE id NOT IN (SELECT id FROM payroll_data WHERE month_num = '{$month_var}' AND year = '{$year}')");

			while ($row = $result2->fetch_assoc()) {
				
			echo "<div class='page-break'>";
			echo "<br>";
			echo "<table>";
			echo "<tr>
					<td class='second, mid' colspan = '2'><label>Payroll slip for ".$month." ".$year."</label></td>
				  </tr>
				  <tr>
					<td class='first'><label>Employee ID: </label></td>
					<td class='second'><label class = 'bold'>".$row['id']."</label></td>
				  </tr>
				  <tr>
					<td><label>Name: </label></td>
					<td class='second'><label class = 'bold'>".$row['lastname'].", ".$row['firstname']." ".$row['middlename']."</label></td>
				  </tr>
				  <tr>
					<td><label>Designation: </label></td>
					<td class='second'><label class = 'bold'>".$row['position']."</label></td>
				  </tr>
				  <tr>
					<td><label>Division: </label></td>
					<td class='second'><label class = 'bold'>".$row['division']."</label></td>
				  </tr>
				  <tr>
					<td><label>Office: </label></td>
					<td class='second'><label class = 'bold'>".$row['office']."</label></td>
				  </tr>
				  <tr>
					<td><label>PERA: </label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>Monthly Salary: </label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>Gross Amount Earned: </label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Deductions</label></td>
				  </tr>
				  <tr>
					<td><label>Tax W/held: </label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>GSIS Cont</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>PHIC Cont</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF Cont</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF MP2EF</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF CAL2</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF Loan</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF HSG</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>CONSOLOAN</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>EMRGYLN</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>EDUASS Loan</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>PLREG</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>PLOPT</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>OPT.LIFE</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>REL</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>PHIL-AM</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO (Cap. Share)</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO Loan</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>CAREA</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO Canteen</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>Disallowance</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Totals</label></td>
				  </tr>
				  <tr>
					<td><label>Total Deduction</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>1-15</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>16-31</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>Net Take Home Pay</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Government Shares</label></td>
				  </tr>
				  <tr>
					<td><label>GSIS</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>ECC</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>HDMF CONT GS</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  <tr>
					<td><label>PHIC GS</label></td>
					<td class='second'><label>".$format_var."</label></td>
				  </tr>
				  ";
			echo "</table>";
			echo "<br>";
			echo "</div>";
			}
		//}
		

	}

?>
</div>



<?php
	
	mysqli_close($conn);
?>
</body>
</html>