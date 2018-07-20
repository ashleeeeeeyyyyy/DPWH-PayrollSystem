<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../CSS/style2.css">
		<a class = 'hide' href = 'portal.php'>Go Back</a>
	</head>

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
		<table id="annual">
			<?php
			$year = $_POST['year'];
			$result = $conn->query("SELECT * FROM employees ORDER BY lastname ASC");
				while($row2 = $result->fetch_assoc()){
					echo "<div class = 'page-break'>";
						echo "<br>";
						echo "<h3>".$year." Payroll Summary Record</h3>";
						echo "<table>";
						echo "<tr>";
						echo '<td><label>ID Number: </label></td>';
						echo '<td><label><b>'.$row2['id'].'</b></label></td>';
						echo "</tr>";
						echo "<tr>";
						echo '<td><label>Full Name: </label></td>';
						echo '<td><label><b>'.$row2['lastname'].', '.$row2['firstname'].' '.$row2['middlename'].'</b></label></td>';
						echo "</tr>";
						echo "<tr>";
						echo '<td><label>Division: </label></td>';
						echo '<td><label><b>'.$row2['division'].'</b></label></td>';
						echo "</tr>";
						echo "<tr>";
						echo '<td><label>Office: </label></td>';
						echo '<td><label><b>'.$row2['office'].'</b></label></td>';
						echo "</tr>";
						echo "<tr>";
						echo '<td><label>Position: </label></td>';
						echo '<td><label><b>'.$row2['position'].'</b></label></td>';
						echo "</tr>";
						echo '<br>';
						echo "</table>";
						echo "<table id = 'result'>";
						echo "
							<tr>
								<th></th>
								<th colspan = 3>Compensation</th>
								<th colspan = 21>Deductions</th>
								<th colspan = 2>Monthly Salary</th>
							</tr>

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
								<th>CONS.</th>
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
								<th>CAREA</th>
								<th>DIS-ALLWNCE / LWOP</th>
								<th>Total Deductions</th>
								<th>Total Amount Earned</th>
							</tr>";
						$result2 = $conn->query("SELECT * FROM payroll_data LEFT JOIN employees ON payroll_data.id = employees.id WHERE employees.id ='".$row2['id']."' AND payroll_data.year = '".$year."' ORDER BY month_num ASC");
					
						while($row = $result2->fetch_assoc()){
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
							
							echo "<tr>";
							echo '<td><b><input class = "tb_size2" readonly type="text" value="'.$row['month'].'"</input></b></td>';
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
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var26.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var22.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var23.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var24.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$format_var25.'"</input></td>';
							echo "</tr>";
						}

							$var1  = $conn->query("SELECT SUM(pera) AS total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var2  = $conn->query("SELECT SUM(monthly_salary) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var3  = $conn->query("SELECT SUM(gross_amount_earned) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var4  = $conn->query("SELECT SUM(taxwh) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var5  = $conn->query("SELECT SUM(gsis_cont) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var6  = $conn->query("SELECT SUM(phic_cont) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var7  = $conn->query("SELECT SUM(hdmf_cont) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var8  = $conn->query("SELECT SUM(hdmf_mp) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var9  = $conn->query("SELECT SUM(hdmf_cal) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var10 = $conn->query("SELECT SUM(hdmf_loan) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var11 = $conn->query("SELECT SUM(hdmf_hsg) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var12 = $conn->query("SELECT SUM(cons) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var13 = $conn->query("SELECT SUM(emr) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var14 = $conn->query("SELECT SUM(eduass_loan) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var15 = $conn->query("SELECT SUM(plreg) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var16 = $conn->query("SELECT SUM(plopt) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var17 = $conn->query("SELECT SUM(opt_life) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var18 = $conn->query("SELECT SUM(rel) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var19 = $conn->query("SELECT SUM(philam) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var20 = $conn->query("SELECT SUM(caremco_cap) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var21 = $conn->query("SELECT SUM(caremco_loan) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var22 = $conn->query("SELECT SUM(caremco_canteen) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var23 = $conn->query("SELECT SUM(allowance) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var24 = $conn->query("SELECT SUM(total_deduct) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var25 = $conn->query("SELECT SUM(first_q) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");
							$var26 = $conn->query("SELECT SUM(carea) as total FROM payroll_data WHERE id = '{$row2['id']}' AND year = '".$year."'");

							$var1_numf = number_format($var1->fetch_object()->total, 2);
							$var2_numf = number_format($var2->fetch_object()->total, 2);
							$var3_numf = number_format($var3->fetch_object()->total, 2);
							$var4_numf = number_format($var4->fetch_object()->total, 2);
							$var5_numf = number_format($var5->fetch_object()->total, 2);
							$var6_numf = number_format($var6->fetch_object()->total, 2);
							$var7_numf = number_format($var7->fetch_object()->total, 2);
							$var8_numf = number_format($var8->fetch_object()->total, 2);
							$var9_numf = number_format($var9->fetch_object()->total, 2);
							$var10_numf = number_format($var10->fetch_object()->total, 2);
							$var11_numf = number_format($var11->fetch_object()->total, 2);
							$var12_numf = number_format($var12->fetch_object()->total, 2);
							$var13_numf = number_format($var13->fetch_object()->total, 2);
							$var14_numf = number_format($var14->fetch_object()->total, 2);
							$var15_numf = number_format($var15->fetch_object()->total, 2);
							$var16_numf = number_format($var16->fetch_object()->total, 2);
							$var17_numf = number_format($var17->fetch_object()->total, 2);
							$var18_numf = number_format($var18->fetch_object()->total, 2);
							$var19_numf = number_format($var19->fetch_object()->total, 2);
							$var20_numf = number_format($var20->fetch_object()->total, 2);
							$var21_numf = number_format($var21->fetch_object()->total, 2);
							$var22_numf = number_format($var22->fetch_object()->total, 2);
							$var23_numf = number_format($var23->fetch_object()->total, 2);
							$var24_numf = number_format($var24->fetch_object()->total, 2);
							$var25_numf = number_format($var25->fetch_object()->total, 2);
							$var26_numf = number_format($var26->fetch_object()->total, 2);
			
							$var1_strf = str_replace($var1_numf, '₱'.$var1_numf, $var1_numf);
							$var2_strf = str_replace($var2_numf, '₱'.$var2_numf, $var2_numf);
							$var3_strf = str_replace($var3_numf, '₱'.$var3_numf, $var3_numf);
							$var4_strf = str_replace($var4_numf, '₱'.$var4_numf, $var4_numf);
							$var5_strf = str_replace($var5_numf, '₱'.$var5_numf, $var5_numf);
							$var6_strf = str_replace($var6_numf, '₱'.$var6_numf, $var6_numf);
							$var7_strf = str_replace($var7_numf, '₱'.$var7_numf, $var7_numf);
							$var8_strf = str_replace($var8_numf, '₱'.$var8_numf, $var8_numf);
							$var9_strf = str_replace($var9_numf, '₱'.$var9_numf, $var9_numf);
							$var10_strf = str_replace($var10_numf, '₱'.$var10_numf, $var10_numf);
							$var11_strf = str_replace($var11_numf, '₱'.$var11_numf, $var11_numf);
							$var12_strf = str_replace($var12_numf, '₱'.$var12_numf, $var12_numf);
							$var13_strf = str_replace($var13_numf, '₱'.$var13_numf, $var13_numf);
							$var14_strf = str_replace($var14_numf, '₱'.$var14_numf, $var14_numf);
							$var15_strf = str_replace($var15_numf, '₱'.$var15_numf, $var15_numf);
							$var16_strf = str_replace($var16_numf, '₱'.$var16_numf, $var16_numf);
							$var17_strf = str_replace($var17_numf, '₱'.$var17_numf, $var17_numf);
							$var18_strf = str_replace($var18_numf, '₱'.$var18_numf, $var18_numf);
							$var19_strf = str_replace($var19_numf, '₱'.$var19_numf, $var19_numf);
							$var20_strf = str_replace($var20_numf, '₱'.$var20_numf, $var20_numf);
							$var21_strf = str_replace($var21_numf, '₱'.$var21_numf, $var21_numf);
							$var22_strf = str_replace($var22_numf, '₱'.$var22_numf, $var22_numf);
							$var23_strf = str_replace($var23_numf, '₱'.$var23_numf, $var23_numf);
							$var24_strf = str_replace($var24_numf, '₱'.$var24_numf, $var24_numf);
							$var25_strf = str_replace($var25_numf, '₱'.$var25_numf, $var25_numf);
							$var26_strf = str_replace($var26_numf, '₱'.$var26_numf, $var26_numf);

							echo "<tr>";
							echo '<td><b><input class = "tb_size2" readonly type="text" value="Total"</input></b></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var1_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var2_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var3_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var4_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var5_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var6_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var7_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var8_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var9_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var10_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var11_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var12_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var13_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var14_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var15_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var16_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var17_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var18_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var19_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var20_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var21_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var22_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var26_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var23_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var24_strf.'"</input></td>';
							echo '<td><input class = "tb_size2" readonly type="text" value="'.$var25_strf.'"</input></td>';				
							echo "</tr>";
							echo "</table>";
							echo "<hr>";
					echo "</div>";
				}	
			?>
		</table>
	</div>
	</body>
</html>