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
</script>
<body>

<div class="for_print">
	<?php 
	$year = $_POST['year'];
	$month = $_POST['month'];
	$division = $_POST['division'];
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

		$result = $conn->query("SELECT * FROM employees");
		
		while ($row2 = $result->fetch_assoc()) {
			# code...

			$result2 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row2['id']."' AND payroll_data.year = '".$year."' AND payroll_data.month_num = '".$month_var."' AND employees.division ='".$division."'");

			while ($row = $result2->fetch_assoc()) {
				
			$format_var1 = str_replace(number_format($row['pera'], 2),'₱'.number_format($row['pera'], 2),number_format($row['pera'], 2));
			$format_var2 = str_replace(number_format($row['monthly_salary'], 2),'₱'.number_format($row['monthly_salary'], 2),number_format($row['monthly_salary'], 2));
			$format_var3 = str_replace(number_format($row['gross_amount_earned'], 2),'₱'.number_format($row['gross_amount_earned'], 2),number_format($row['gross_amount_earned'], 2));
			$format_var4 = str_replace(number_format($row['taxwh'], 2),'₱'.number_format($row['taxwh'], 2),number_format($row['taxwh'], 2));
			$format_var5 = str_replace(number_format($row['gsis_cont'], 2),'₱'.number_format($row['gsis_cont'], 2),number_format($row['gsis_cont'], 2));
			$format_var6 = str_replace(number_format($row['phic_cont'], 2),'₱'.number_format($row['phic_cont'], 2),number_format($row['phic_cont'], 2));
			$format_var7 = str_replace(number_format($row['hdmf_cont'], 2),'₱'.number_format($row['hdmf_cont'], 2),number_format($row['hdmf_cont'], 2));
			$format_var8 = str_replace(number_format($row['hdmf_mp'], 2),'₱'.number_format($row['hdmf_mp'], 2),number_format($row['hdmf_mp'], 2));
			$format_var9 = str_replace(number_format($row['hdmf_cal'], 2),'₱'.number_format($row['hdmf_cal'], 2),number_format($row['hdmf_cal'], 2));
			$format_var10 = str_replace(number_format($row['hdmf_loan'], 2),'₱'.number_format($row['hdmf_loan'], 2),number_format($row['hdmf_loan'], 2));
			$format_var11 = str_replace(number_format($row['hdmf_hsg'], 2),'₱'.number_format($row['hdmf_hsg'], 2),number_format($row['hdmf_hsg'], 2));
			$format_var12 = str_replace(number_format($row['cons'], 2),'₱'.number_format($row['cons'], 2),number_format($row['cons'], 2));
			$format_var13 = str_replace(number_format($row['emr'], 2),'₱'.number_format($row['emr'], 2),number_format($row['emr'], 2));
			$format_var14 = str_replace(number_format($row['eduass_loan'], 2),'₱'.number_format($row['eduass_loan'], 2),number_format($row['eduass_loan'], 2));
			$format_var15 = str_replace(number_format($row['plreg'], 2),'₱'.number_format($row['plreg'], 2),number_format($row['plreg'], 2));
			$format_var16 = str_replace(number_format($row['plopt'], 2),'₱'.number_format($row['plopt'], 2),number_format($row['plopt'], 2));
			$format_var17 = str_replace(number_format($row['opt_life'], 2),'₱'.number_format($row['opt_life'], 2),number_format($row['opt_life'], 2));
			$format_var18 = str_replace(number_format($row['rel'], 2),'₱'.number_format($row['rel'], 2),number_format($row['rel'], 2));
			$format_var19 = str_replace(number_format($row['philam'], 2),'₱'.number_format($row['philam'], 2),number_format($row['philam'], 2));
			$format_var20 = str_replace(number_format($row['caremco_cap'], 2),'₱'.number_format($row['caremco_cap'], 2),number_format($row['caremco_cap'], 2));
			$format_var21 = str_replace(number_format($row['caremco_loan'], 2),'₱'.number_format($row['caremco_loan'], 2),number_format($row['caremco_loan'], 2));
			$format_var22 = str_replace(number_format($row['caremco_canteen'], 2),'₱'.number_format($row['caremco_canteen'], 2),number_format($row['caremco_canteen'], 2));
			$format_var23 = str_replace(number_format($row['allowance'], 2),'₱'.number_format($row['allowance'], 2),number_format($row['allowance'], 2));
			$format_var24 = str_replace(number_format($row['total_deduct'], 2),'₱'.number_format($row['total_deduct'], 2),number_format($row['total_deduct'], 2));
			$format_var25 = str_replace(number_format($row['first_q'], 2),'₱'.number_format($row['first_q'], 2),number_format($row['first_q'], 2));
			$format_var26 = str_replace(number_format($row['carea'], 2),'₱'.number_format($row['carea'], 2),number_format($row['carea'], 2));
			$format_var27 = str_replace(number_format($row['cutofffirst'], 2),'₱'.number_format($row['cutofffirst'], 2),number_format($row['cutofffirst'], 2));
			$format_var28 = str_replace(number_format($row['cutoffsecond'], 2),'₱'.number_format($row['cutoffsecond'], 2),number_format($row['cutoffsecond'], 2));
			$format_var29 = str_replace(number_format($row['ecc'], 2),'₱'.number_format($row['ecc'], 2),number_format($row['ecc'], 2));
			$format_var30 = str_replace(number_format($row['gsis'], 2),'₱'.number_format($row['gsis'], 2),number_format($row['gsis'], 2));
			$format_var31 = str_replace(number_format($row['hdmf_cont_gs'], 2),'₱'.number_format($row['hdmf_cont_gs'], 2),number_format($row['hdmf_cont_gs'], 2));
			$format_var32 = str_replace(number_format($row['phic_gs'], 2),'₱'.number_format($row['phic_gs'], 2),number_format($row['phic_gs'], 2));
			echo "<div class='page-break'>";
			echo "<br>";
			echo "<table>";
			echo "<tr>
					<td class='second, mid' colspan = '2'><label>Payroll slip for ".$row['month']." ".$row['year']."</label></td>
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
					<td><label>Division/Unit: </label></td>
					<td class='second'><label class = 'bold'>".$row['division']."</label></td>
				  </tr>
				  <tr>
					<td><label>Office: </label></td>
					<td class='second'><label class = 'bold'>".$row['office']."</label></td>
				  </tr>
				  <tr>
					<td><label>PERA: </label></td>
					<td class='second'><label>".$format_var1."</td>
				  </tr>
				  <tr>
					<td><label>Monthly Salary: </label></td>
					<td class='second'><label>".$format_var2."</td>
				  </tr>
				  <tr>
					<td><label>Gross Amount Earned: </label></td>
					<td class='second'><label>".$format_var3."</td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Deductions</label></td>
				  </tr>
				  <tr>
					<td><label>Tax W/held: </label></td>
					<td class='second'><label>".$format_var4."</td>
				  </tr>
				  <tr>
					<td><label>GSIS Cont</label></td>
					<td class='second'><label>".$format_var5."</td>
				  </tr>
				  <tr>
					<td><label>PHIC Cont</label></td>
					<td class='second'><label>".$format_var6."</td>
				  </tr>
				  <tr>
					<td><label>HDMF Cont</label></td>
					<td class='second'><label>".$format_var7."</td>
				  </tr>
				  <tr>
					<td><label>HDMF MP2EF</label></td>
					<td class='second'><label>".$format_var8."</td>
				  </tr>
				  <tr>
					<td><label>HDMF CAL2</label></td>
					<td class='second'><label>".$format_var9."</td>
				  </tr>
				  <tr>
					<td><label>HDMF Loan</label></td>
					<td class='second'><label>".$format_var10."</td>
				  </tr>
				  <tr>
					<td><label>HDMF HSG</label></td>
					<td class='second'><label>".$format_var11."</td>
				  </tr>
				  <tr>
					<td><label>CONSOLOAN</label></td>
					<td class='second'><label>".$format_var12."</td>
				  </tr>
				  <tr>
					<td><label>EMRGYLN</label></td>
					<td class='second'><label>".$format_var13."</td>
				  </tr>
				  <tr>
					<td><label>EDUASS Loan</label></td>
					<td class='second'><label>".$format_var14."</td>
				  </tr>
				  <tr>
					<td><label>PLREG</label></td>
					<td class='second'><label>".$format_var15."</td>
				  </tr>
				  <tr>
					<td><label>PLOPT</label></td>
					<td class='second'><label>".$format_var16."</td>
				  </tr>
				  <tr>
					<td><label>OPT.LIFE</label></td>
					<td class='second'><label>".$format_var17."</td>
				  </tr>
				  <tr>
					<td><label>REL</label></td>
					<td class='second'><label>".$format_var18."</td>
				  </tr>
				  <tr>
					<td><label>PHIL-AM</label></td>
					<td class='second'><label>".$format_var19."</td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO (Cap. Share)</label></td>
					<td class='second'><label>".$format_var20."</td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO Loan</label></td>
					<td class='second'><label>".$format_var21."</td>
				  </tr>
				  <tr>
					<td><label>CAREA</label></td>
					<td class='second'><label>".$format_var26."</td>
				  </tr>
				  <tr>
					<td><label>CAREMPCO Canteen</label></td>
					<td class='second'><label>".$format_var22."</td>
				  </tr>
				  <tr>
					<td><label>Disallowance</label></td>
					<td class='second'><label>".$format_var23."</td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Totals</label></td>
				  </tr>
				  <tr>
					<td><label>Total Deduction</label></td>
					<td class='second'><label>".$format_var24."</td>
				  </tr>
				  <tr>
					<td><label>1-15</label></td>
					<td class='second'>".$format_var27."<label></td>
				  </tr>
				  <tr>
					<td><label>16-31</label></td>
					<td class='second'>".$format_var28."<label></td>
				  </tr>
				  <tr>
					<td><label>Net Take Home Pay</label></td>
					<td class='second'><label>".$format_var25."</td>
				  </tr>
				  <tr>
					<td class = 'mid' colspan = '2'><label>Government Shares</label></td>
				  </tr>
				  <tr>
					<td><label>GSIS</label></td>
					<td class='second'>".$format_var30."<label></td>
				  </tr>
				  <tr>
					<td><label>ECC</label></td>
					<td class='second'>".$format_var29."<label></td>
				  </tr>
				  <tr>
					<td><label>HDMF CONT GS</label></td>
					<td class='second'>".$format_var31."<label></td>
				  </tr>
				  <tr>
					<td><label>PHIC GS</label></td>
					<td class='second'>".$format_var32."<label></td>
				  </tr>
				  ";
			echo "</table>";
			echo "<br>";
			echo "</div>";
			}
		}
		

	}

?>
</div>



<?php
	
	mysqli_close($conn);
?>
</body>
</html>