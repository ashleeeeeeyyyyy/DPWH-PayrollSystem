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

include 'dbconn.php';
$result = $conn->query("SELECT * FROM employees WHERE id = '".$id."'");

echo "<table>";
while($row = $result->fetch_assoc()){
 			

	    	echo '<tr>';
	    	echo '<td>Employee ID: </td>';
			echo '<td><input readonly type="text" value="'.$row['id'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Last Name: </td>';
			echo '<td><input readonly type="text" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'"</input></td>';
			echo '</tr>';;
			echo '<tr>';
			echo '<td>Position: </td>';
			echo '<td><input readonly type="text" value="'.$row['position'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Salary Grade: </td>';
			echo '<td><input readonly type="text" value="'.$row['salarygrade'].'"</input></td>';
			echo '</tr>';
			echo '<tr>';
			//echo '<td>Action: </td>';
			//echo '<td><a href = "emp_del.php?id='.$row['id'].'">Confirm</a></td>';
			echo '</tr>';
			
}
	   		echo "</table>";
	   		echo "<hr>";

	   		$id = $_GET['id'];
			$month = $_GET['month'];
			$year = $_GET['year'];
			$query1 = $conn->query("select * from payroll_data where id='{$id}' AND month_num = '{$month}' AND year = '{$year}'");
				echo "<table>";
				while ($row = $query1->fetch_assoc()) {
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
					$format_var26 = str_replace(number_format($row['carea'], 2),'₱'.number_format($row['carea'], 2),number_format($row['carea'], 2));
					$format_var23 = str_replace(number_format($row['allowance'], 2),'₱'.number_format($row['allowance'], 2),number_format($row['allowance'], 2));
					$format_var24 = str_replace(number_format($row['total_deduct'], 2),'₱'.number_format($row['total_deduct'], 2),number_format($row['total_deduct'], 2));
					$format_var25 = str_replace(number_format($row['first_q'], 2),'₱'.number_format($row['first_q'], 2),number_format($row['first_q'], 2));
					$format_var27 = str_replace(number_format($row['ecc'], 2),'₱'.number_format($row['ecc'], 2),number_format($row['ecc'], 2));
					$format_var28 = str_replace(number_format($row['gsis'], 2),'₱'.number_format($row['gsis'], 2),number_format($row['gsis'], 2));
					$format_var29 = str_replace(number_format($row['hdmf_cont_gs'], 2),'₱'.number_format($row['hdmf_cont_gs'], 2),number_format($row['hdmf_cont_gs'], 2));
					$format_var30 = str_replace(number_format($row['phic_gs'], 2),'₱'.number_format($row['phic_gs'], 2),number_format($row['phic_gs'], 2));

					echo "<form method='get'>";
					//echo "<input readonly class='input' type='hidden' name='did' value='{$row['item_number']}' />";
					echo "<input readonly class='input' type='hidden' name='did2' value='{$row['id']}' />";
					echo "<input readonly class='input' type='hidden' name='did3' value='{$row['month_num']}' />";
					echo "<input readonly class='input' type='hidden' name='did4' value='{$row['year']}' />";
					echo "<h3>Are you sure you want to delete this entry?</h3>";
					echo '

					<table id="input">
						<table class="input">
							<tr>
								<th colspan="4">Compensation</th>
							</tr>
							<tr>
								<td><label>PERA: </label></td>
								<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_pera" value ='.$format_var1.'></input></td>
								<td><label>Monthly Salary: </label></td>
								<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_msalary" value ='.$format_var2.'></input></td>
							</tr>
						</table>
						<table class="input">
						<br>
						<tr>
							<th colspan="8">Deductions</th>
						</tr>
						<tr>
							<td><label>TAX W/HELD: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_taxwh" value ='.$format_var4.'></input></td>
							<td><label>GSIS CONT: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gsis" value ='.$format_var5.'></input></td>
							<td><label>PHIC CONT: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_phic" value ='.$format_var6.'></input></td>
							<td><label>HDMF CONT: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmf" value ='.$format_var7.'></input></td>
							
						</tr>
						<tr>
							<td><label>HDMF (MP2EF): </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfmp2" value ='.$format_var8.'></input></td>
							<td><label>HDMF (CAL2): </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfcal" value ='.$format_var9.'></input></td>
							<td><label>HDMF LOAN: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfloan" value ='.$format_var10.'></input></td>
							<td><label>HDMF HSG LOAN: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfhsg" value ='.$format_var11.'></input></td>
						</tr>
						<tr>
							<td><label>CONSOLIDATION: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_cons" value ='.$format_var12.'></input></td>
							<td><label>EMRGLYN: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_emr" value ='.$format_var13.'></input></td>
							<td><label>EDUASS LOAN: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_eduass" value ='.$format_var14.'></input></td>
							<td><label>PLREG: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plreg" value ='.$format_var15.'></input></td>
						</tr>
						<tr>
							<td><label>PLOPT: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plopt" value ='.$format_var16.'></input></td>
							<td><label>OPT.LIFE: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_opt" value ='.$format_var17.'></input></td>
							<td><label>REL: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_rel" value ='.$format_var18.'></input></td>
							<td><label>PHIL-AM: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_philam" value ='.$format_var19.'></input></td>
							
						</tr>
						<tr>
							<td><label>CAREMCO (Cap Share): </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremco" value ='.$format_var20.'></input></td>
							<td><label>CAREMCO LOAN (E/R): </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoln" value ='.$format_var21.'></input></td>
							<td><label>CAREMCO (CANTEEN): </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoctn" value ='.$format_var22.'></input></td>
							<td><label>CAREA: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_carea" value ='.$format_var26.'></input></td>
							
						</tr>
						<tr>
							
							<td><label>DISALLOWANCE/LWOP: </label></td>
							<td><input readonly type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_all" value ='.$format_var23.'></input></td>
							
						</tr>
						<tr>
							<th colspan="8">Government Shares</th>
						</tr>
						<tr>
							<td><label>GSIS: </label></td>
							<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gs" value ='.$format_var28.'></input></td>
							<td><label>ECC: </label></td>
							<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_ecc" value ='.$format_var27.'></input></td>
							<td><label>HDMF CONT GS: </label></td>
							<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hcg" value ='.$format_var29.'></input></td>
							<td><label>PHIC GS: </label></td>
							<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_pg" value ='.$format_var30.'></input></td>
						</tr>
						</table>
						<table class="input">
						<br>

						</table>
						<table class="input">
						<tr>
							<td colspan="1"><a href="data_delete_exec.php?id='.$id.'&month='.$month.'&year='.$year.'">Confirm</a></td>
						</tr>
						</table>
						</table>
					</table>

					</form>

					';

}
	echo "</table>";






echo "<hr>";
echo "<h3><a href = 'view_individually.php?id=".$id."&year=".$year."'>Go Back</a></h3>";

?>


	

</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>