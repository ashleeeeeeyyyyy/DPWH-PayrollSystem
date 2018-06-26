

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
<h3>Employee Detail</h3>
<?php
		$id = $_GET['id'];
		$result = $conn->query("SELECT * FROM employees WHERE id = '{$id}'");
	    
	    echo "<table>";
	    echo "<tr>";
	    echo "<th>Emp ID</th>";
	    echo "<th>Full Name</th>";
	    echo "<th>Division</th>";
	    echo "<th>Position</th>";
	    echo "<th>SG</th>";
	    echo "<th>Action</th>";
	    echo "</tr>";
	    while($row = $result->fetch_assoc()){
	    	echo '<tr>';
			echo '<td><input class = "tb_size0" readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '<td><input class = "tb_size1" readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$row['division'].'"</input></td>';
			echo '<td><input class = "tb_size3" readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '<td><input class = "tb_size4" readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
			echo "<td><a href ='#?update={$row['id']}'>View Annual Report</a></td>";
			echo '</tr>';
	    }
	    echo "</table>";

?>
<hr>
<h3>Add Monthly Payroll Summary Record</h3>
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
		<td><input type="text" name="year"></input></td>
		
		<td><input type="submit" value="Go"></input></td>
	</tr>
	<tr>
		
	</tr>
</table>

</form>


<div>
	<table id="annual">
	<hr>
	<h3>Current Annual Payroll Summary Record</h3>
	<tr>
		<th>Month</th>
		<th>PERA</th>
		<th>Monthly Salary</th>
		<th>Gross Amount Earned</th>
		<th>TAX W/HELD</th>
		<th>GSIS CONT</th>
		<th>PHIC CONT</th>
		<th>HDMF CONT</th>
		<th>HDMF (MP2EF)</th>
		<th>HDMF (CAL2)</th>
		<th>HDMF LOAN</th>
		<th>HDMF HSG LOAN</th>
		<th>CONSOLIDATION</th>
		<th>EMRGYLN</th>
		<th>EDUASS LOAN</th>
		<th>PLREG</th>
		<th>PLOPT</th>
		<th>OPT.LIFE</th>
		<th>REL</th>
		<th>PHIL-AM</th>
		<th>CAREMCO (Cap Share)</th>
		<th>CAREMCO LOAN (E/R)</th>
		<th>CAREMCO (CANTEEN)</th>
		<th>ALLOWANCE / LWOP</th>
		<th>Total Deductions</th>
		<th>1-15</th>
		<th>16-31</th>
	</tr>
	<?php
		
		$result = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$id."'");
		

		
		while($row = $result->fetch_assoc()){

				$var1  = $conn->query("SELECT SUM(pera) AS total FROM payroll_data WHERE id = '{$row['id']}'");
				$var2  = $conn->query("SELECT SUM(monthly_salary) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var3  = $conn->query("SELECT SUM(gross_amount_earned) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var4  = $conn->query("SELECT SUM(taxwh) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var5  = $conn->query("SELECT SUM(gsis_cont) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var6  = $conn->query("SELECT SUM(phic_cont) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var7  = $conn->query("SELECT SUM(hdmf_cont) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var8  = $conn->query("SELECT SUM(hdmf_mp) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var9  = $conn->query("SELECT SUM(hdmf_cal) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var10 = $conn->query("SELECT SUM(hdmf_loan) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var11 = $conn->query("SELECT SUM(hdmf_hsg) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var12 = $conn->query("SELECT SUM(cons) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var13 = $conn->query("SELECT SUM(emr) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var14 = $conn->query("SELECT SUM(eduass_loan) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var15 = $conn->query("SELECT SUM(plreg) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var16 = $conn->query("SELECT SUM(plopt) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var17 = $conn->query("SELECT SUM(opt_life) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var18 = $conn->query("SELECT SUM(rel) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var19 = $conn->query("SELECT SUM(philam) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var20 = $conn->query("SELECT SUM(caremco_cap) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var21 = $conn->query("SELECT SUM(caremco_loan) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var22 = $conn->query("SELECT SUM(caremco_canteen) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var23 = $conn->query("SELECT SUM(allowance) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var24 = $conn->query("SELECT SUM(total_deduct) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var25 = $conn->query("SELECT SUM(first_q) as total FROM payroll_data WHERE id = '{$row['id']}'");
				$var26 = $conn->query("SELECT SUM(second_q) as total FROM payroll_data WHERE id = '{$row['id']}'");

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
				$format_var26 = str_replace(number_format($row['second_q'], 2),'₱'.number_format($row['second_q'], 2),number_format($row['second_q'], 2));




				//str_replace(number_format($row['pera'], 2),'₱'.number_format($row['pera'], 2),number_format($row['pera'], 2))

				echo "<tr>";
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$row['month'].'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var1.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var2.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var3.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var4.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var5.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var6.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var7.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var8.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var9.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var10.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var11.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var12.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var13.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var14.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var15.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var16.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var17.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var18.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var19.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var20.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var21.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var22.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var23.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var24.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var25.'"</input></td>';
				echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var26.'"</input></td>';
				

				echo "</tr>";
			}
			$var1_res = $var1;
			$var2_res = $var2;
			$var3_res = $var3;
			$var4_res = $var4;
			$var5_res = $var5;
			$var6_res = $var6;
			$var7_res = $var7;
			$var8_res = $var8;
			$var9_res = $var9;
			$var10_res = $var10;
			$var11_res = $var11;
			$var12_res = $var12;
			$var13_res = $var13;
			$var14_res = $var14;
			$var15_res = $var15;
			$var16_res = $var16;
			$var17_res = $var17;
			$var18_res = $var18;
			$var19_res = $var19;
			$var20_res = $var20;
			$var21_res = $var21;
			$var22_res = $var22;
			$var23_res = $var23;
			$var24_res = $var24;
			$var25_res = $var25;
			$var26_res = $var26;

			$total_format_var1 = str_replace(number_format($var1_res, 2),'₱'.number_format($var1_res, 2),number_format($var1_res, 2));
			$total_format_var2 = str_replace(number_format($var2_res, 2),'₱'.number_format($var2_res, 2),number_format($var2_res, 2));
			$total_format_var3 = str_replace(number_format($var3_res, 2),'₱'.number_format($var3_res, 2),number_format($var3_res, 2));
			$total_format_var4 = str_replace(number_format($var4_res, 2),'₱'.number_format($var4_res, 2),number_format($var4_res, 2));
			$total_format_var5 = str_replace(number_format($var5_res, 2),'₱'.number_format($var5_res, 2),number_format($var5_res, 2));
			$total_format_var6 = str_replace(number_format($var6_res, 2),'₱'.number_format($var6_res, 2),number_format($var6_res, 2));
			$total_format_var7 = str_replace(number_format($var7_res, 2),'₱'.number_format($var7_res, 2),number_format($var7_res, 2));
			$total_format_var8 = str_replace(number_format($var8_res, 2),'₱'.number_format($var8_res, 2),number_format($var8_res, 2));
			$total_format_var9 = str_replace(number_format($var9_res, 2),'₱'.number_format($var9_res, 2),number_format($var9_res, 2));
			$total_format_var10 = str_replace(number_format($var10_res, 2),'₱'.number_format($var10_res, 2),number_format($var10_res, 2));
			$total_format_var11 = str_replace(number_format($var11_res, 2),'₱'.number_format($var11_res, 2),number_format($var11_res, 2));
			$total_format_var12 = str_replace(number_format($var12_res, 2),'₱'.number_format($var12_res, 2),number_format($var12_res, 2));
			$total_format_var13 = str_replace(number_format($var13_res, 2),'₱'.number_format($var13_res, 2),number_format($var13_res, 2));
			$total_format_var14 = str_replace(number_format($var14_res, 2),'₱'.number_format($var14_res, 2),number_format($var14_res, 2));
			$total_format_var15 = str_replace(number_format($var15_res, 2),'₱'.number_format($var15_res, 2),number_format($var15_res, 2));
			$total_format_var16 = str_replace(number_format($var16_res, 2),'₱'.number_format($var16_res, 2),number_format($var16_res, 2));
			$total_format_var17 = str_replace(number_format($var17_res, 2),'₱'.number_format($var17_res, 2),number_format($var17_res, 2));
			$total_format_var18 = str_replace(number_format($var18_res, 2),'₱'.number_format($var18_res, 2),number_format($var18_res, 2));
			$total_format_var19 = str_replace(number_format($var19_res, 2),'₱'.number_format($var19_res, 2),number_format($var19_res, 2));
			$total_format_var20 = str_replace(number_format($var20_res, 2),'₱'.number_format($var20_res, 2),number_format($var20_res, 2));
			$total_format_var21 = str_replace(number_format($var21_res, 2),'₱'.number_format($var21_res, 2),number_format($var21_res, 2));
			$total_format_var22 = str_replace(number_format($var22_res, 2),'₱'.number_format($var22_res, 2),number_format($var22_res, 2));
			$total_format_var23 = str_replace(number_format($var23_res, 2),'₱'.number_format($var23_res, 2),number_format($var23_res, 2));
			$total_format_var24 = str_replace(number_format($var24_res, 2),'₱'.number_format($var24_res, 2),number_format($var24_res, 2));
			$total_format_var25 = str_replace(number_format($var25_res, 2),'₱'.number_format($var25_res, 2),number_format($var25_res, 2));
			$total_format_var26 = str_replace(number_format($var26_res, 2),'₱'.number_format($var26_res, 2),number_format($var26_res, 2));

			echo "<tr>";
			echo '<td><input class = "tb_size2" readonly type="text" value="Total"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var1.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var2.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var3.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var4.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var5.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var6.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var7.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var8.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var9.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var10.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var11.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var12.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var13.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var14.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var15.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var16.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var17.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var18.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var19.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var20.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var21.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var22.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var23.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var24.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var25.'"</input></td>';
			echo '<td><input class = "tb_size2" readonly type="text" value="'.$total_format_var26.'"</input></td>';

			echo "</tr>";
			

	?>
	</table>
	<hr>
</div>


</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>