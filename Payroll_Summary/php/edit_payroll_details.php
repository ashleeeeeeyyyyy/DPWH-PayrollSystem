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
<!--
$query2 = 'insert into payroll_data
				(id,month,year,pera,monthly_salary,
					gross_amount_earned,taxwh,gsis_cont,phic_cont,hdmf_cont,
					hdmf_mp,hdmf_cal,hdmf_loan,hdmf_hsg,cons,
					emr,eduass_loan,plreg,plopt,opt_life,
					rel,philam,caremco_cap,caremco_loan,caremco_canteen,
					allowance,total_deduct,first_q,second_q)
				values ("'.$id.'","'.$month.'","'.$year.'","'.$pera.'","'.$msalary.'","'.$gae.'",
						"'.$taxwh.'","'.$gsis.'","'.$phic.'","'.$hdmf.'","'.$hdmfmp2.'","'.$hdmfcal.'",
						"'.$hdmfloan.'","'.$hdmfhsg.'","'.$cons.'","'.$emr.'","'.$eduass.'","'.$plreg.'",
						"'.$plopt.'","'.$opt.'","'.$rel.'","'.$philam.'","'.$caremco.'","'.$caremcoln.'",
						"'.$caremcoctn.'","'.$all.'","'.$total.'","'.$tb1.'","'.$tb16.'");';

-->



<div id="main">

<?php
	if (isset($_GET['submit'])) {
	$no = $_GET['did'];
	$pera = $_GET['tb_pera'];
	$msalary = $_GET['tb_msalary'];
	//$gae = $_POST['tb_gae'];
	$taxwh = $_GET['tb_taxwh'];
    $gsis = $_GET['tb_gsis'];
    $phic = $_GET['tb_phic'];
    $hdmf = $_GET['tb_hdmf'];
    $hdmfmp2 = $_GET['tb_hdmfmp2'];
    $hdmfcal = $_GET['tb_hdmfcal'];
    $hdmfloan = $_GET['tb_hdmfloan'];
    $hdmfhsg = $_GET['tb_hdmfhsg'];
    $cons = $_GET['tb_cons'];
    $emr = $_GET['tb_emr'];
    $eduass = $_GET['tb_eduass'];
    $plreg = $_GET['tb_plreg'];
    $plopt = $_GET['tb_plopt'];
    $opt = $_GET['tb_opt'];
    $rel = $_GET['tb_rel'];
    $philam = $_GET['tb_philam'];
    $caremco = $_GET['tb_caremco'];
    $caremcoln = $_GET['tb_caremcoln'];
    $caremcoctn = $_GET['tb_caremcoctn'];
    $all = $_GET['tb_all'];

    //$var1 = str_replace(',',"", str_replace('₱',"", $id));
	//$var2 = str_replace(',',"", str_replace('₱',"", $month));
	//$var3 = str_replace(',',"", str_replace('₱',"", $year));
	$var4 = str_replace(',',"", str_replace('₱',"", $pera));
	$var5 = str_replace(',',"", str_replace('₱',"", $msalary));
	//$var6 = str_replace(',',"", str_replace('₱',"", $gae));
	$var7 = str_replace(',',"", str_replace('₱',"", $taxwh));
	$var8 = str_replace(',',"", str_replace('₱',"", $gsis));
	$var9 = str_replace(',',"", str_replace('₱',"", $phic));
	$var10 = str_replace(',',"", str_replace('₱',"", $hdmf));
	$var11 = str_replace(',',"", str_replace('₱',"", $hdmfmp2));
	$var12 = str_replace(',',"", str_replace('₱',"", $hdmfcal));
	$var13 = str_replace(',',"", str_replace('₱',"", $hdmfloan));
	$var14 = str_replace(',',"", str_replace('₱',"", $hdmfhsg));
	$var15 = str_replace(',',"", str_replace('₱',"", $cons));
	$var16 = str_replace(',',"", str_replace('₱',"", $emr));
	$var17 = str_replace(',',"", str_replace('₱',"", $eduass));
	$var18 = str_replace(',',"", str_replace('₱',"", $plreg));
	$var19 = str_replace(',',"", str_replace('₱',"", $plopt));
	$var20 = str_replace(',',"", str_replace('₱',"", $opt));
	$var21 = str_replace(',',"", str_replace('₱',"", $rel));
	$var22 = str_replace(',',"", str_replace('₱',"", $philam));
	$var23 = str_replace(',',"", str_replace('₱',"", $caremco));
	$var24 = str_replace(',',"", str_replace('₱',"", $caremcoln));
	$var25 = str_replace(',',"", str_replace('₱',"", $caremcoctn));
	$var26 = str_replace(',',"", str_replace('₱',"", $all));
	//$var27 = str_replace(',',"", str_replace('₱',"", $total));
	//$var28 = str_replace(',',"", str_replace('₱',"", $tb1));
	//$var29 = str_replace(',',"", str_replace('₱',"", $tb16));

	$comp =  $var4 + $var5;
	$deduct = $var7 + $var8 + $var9 + $var10 + $var11 + $var12 + $var13 + $var14 + $var15 + $var16
				 + $var17 + $var18 + $var19 + $var20 + $var21 + $var22 + $var23 + $var24 + $var25 + $var26;

	$income = $comp - $deduct;


	$query = $conn->query("update payroll_data set

							pera = '$var4',
							monthly_salary = '$var5',
							gross_amount_earned = '$comp',
							taxwh = '$var7',
							gsis_cont = '$var8',
							phic_cont = '$var9',
							hdmf_cont = '$var10',
							hdmf_mp = '$var11',
							hdmf_cal = '$var12',
							hdmf_loan = '$var13',
							hdmf_hsg = '$var14',
							cons = '$var15',
							emr = '$var16',
							eduass_loan = '$var17',
							plreg = '$var18',
							plopt = '$var19',
							opt_life = '$var20',
							rel = '$var21',
							philam = '$var22',
							caremco_cap = '$var23',
							caremco_loan = '$var24',
							caremco_canteen = '$var25',
							allowance = '$var26',
							total_deduct = '$deduct',
							first_q = '$income'

							where item_number='$no'");
	}
	echo mysqli_error($conn);
	//$query = $conn->query("select * from employees");
	//while ($row = $query->fetch_assoc()) {
	//echo "<b><a href='update.php?update={$row['id']}'>{$row['lastname']}</a></b>";
	//echo "<br />";
	//}
?>
<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$id = $_GET['id'];
$year = $_GET['year'];
$month = $_GET['month'];
$query1 = $conn->query("select * from payroll_data where id='{$id}'");
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
		$format_var23 = str_replace(number_format($row['allowance'], 2),'₱'.number_format($row['allowance'], 2),number_format($row['allowance'], 2));
		$format_var24 = str_replace(number_format($row['total_deduct'], 2),'₱'.number_format($row['total_deduct'], 2),number_format($row['total_deduct'], 2));
		$format_var25 = str_replace(number_format($row['first_q'], 2),'₱'.number_format($row['first_q'], 2),number_format($row['first_q'], 2));

		echo "<form method='get'>";
		echo "<input readonly class='input' type='hidden' name='did' value='{$row['item_number']}' />";
		echo "<input readonly class='input' type='hidden' name='did2' value='{$row['id']}' />";
		echo '

		<table id="input">
			<table class="input">
				<tr>
					<th colspan="4">Compensation</th>
				</tr>
				<tr>
					<td><label>PERA: </label></td>
					<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_pera" value ='.$format_var1.'></input></td>
					<td><label>Monthly Salary: </label></td>
					<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_msalary" value ='.$format_var2.'></input></td>
				</tr>
			</table>
			<table class="input">
			<br>
			<tr>
				<th colspan="8">Deductions</th>
			</tr>
			<tr>
				<td><label>TAX W/HELD: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_taxwh" value ='.$format_var4.'></input></td>
				<td><label>GSIS CONT: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gsis" value ='.$format_var5.'></input></td>
				<td><label>PHIC CONT: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_phic" value ='.$format_var6.'></input></td>
				<td><label>HDMF CONT: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmf" value ='.$format_var7.'></input></td>
				
			</tr>
			<tr>
				<td><label>HDMF (MP2EF): </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfmp2" value ='.$format_var8.'></input></td>
				<td><label>HDMF (CAL2): </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfcal" value ='.$format_var9.'></input></td>
				<td><label>HDMF LOAN: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfloan" value ='.$format_var10.'></input></td>
				<td><label>HDMF HSG LOAN: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfhsg" value ='.$format_var11.'></input></td>
			</tr>
			<tr>
				<td><label>CONSOLIDATION: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_cons" value ='.$format_var12.'></input></td>
				<td><label>EMRGLYN: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_emr" value ='.$format_var13.'></input></td>
				<td><label>EDUASS LOAN: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_eduass" value ='.$format_var14.'></input></td>
				<td><label>PLREG: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plreg" value ='.$format_var15.'></input></td>
			</tr>
			<tr>
				<td><label>PLOPT: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plopt" value ='.$format_var16.'></input></td>
				<td><label>OPT.LIFE: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_opt" value ='.$format_var17.'></input></td>
				<td><label>REL: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_rel" value ='.$format_var18.'></input></td>
				<td><label>PHIL-AM: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_philam" value ='.$format_var19.'></input></td>
				
			</tr>
			<tr>
				<td><label>CAREMCO (Cap Share): </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremco" value ='.$format_var20.'></input></td>
				<td><label>CAREMCO LOAN (E/R): </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoln" value ='.$format_var21.'></input></td>
				<td><label>CAREMCO (CANTEEN): </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoctn" value ='.$format_var22.'></input></td>
				<td><label>ALLOWANCE/LWOP: </label></td>
				<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_all" value ='.$format_var23.'></input></td>
				
			</tr>
			</table>
			<table class="input">
			<br>

			</table>
			<table class="input">
			<tr>
				<td colspan="1"><input class="addbtn" type="submit" name="submit" value="Update" /></td>
			</tr>
			</table>
			</table>
		</table>

		</form>

		';

}
	echo "</table>";
}
if (isset($_GET['submit'])) {
	$no = $_GET['did2'];
	echo "<hr>";
	echo "<br>";
	echo '<h3>Data Updated Successfuly......!!</h3>';
	echo "<br>";
	echo '<h3><a href="encode.php?id='.$no.'">Back</a></h3>';
	echo "<br>";
	echo "<hr>";
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