<?php

echo "<form action='encode_add.php?id=".$id."&month=".$month."&year=".$year."' method='post'>";

?>

<table id="input">
	<table class="input">
		<tr>
			<th colspan="4">Compensation</th>
		</tr>
		<tr>
			<td><label>PERA: </label></td>
			<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_pera"></input></td>
			<td><label>Monthly Salary: </label></td>
			<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_msalary"></input></td>
			<!--
			<td><label>Gross Amount earned: </label></td>
			<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gae"></input></td>
			-->
		</tr>
	</table>
	<table class="input">
	<br>
	<tr>
		<th colspan="8">Deductions</th>
	</tr>
	<tr>
		<td><label>TAX W/HELD: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_taxwh"></input></td>
		<td><label>GSIS CONT: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gsis"></input></td>
		<td><label>PHIC CONT: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_phic"></input></td>
		<td><label>HDMF CONT: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmf"></input></td>
		
	</tr>
	<tr>
		<td><label>HDMF (MP2EF): </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfmp2"></input></td>
		<td><label>HDMF (CAL2): </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfcal"></input></td>
		<td><label>HDMF LOAN: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfloan"></input></td>
		<td><label>HDMF HSG LOAN: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hdmfhsg"></input></td>
	</tr>
	<tr>
		<td><label>CONSOLIDATION: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_cons"></input></td>
		<td><label>EMRGLYN: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_emr"></input></td>
		<td><label>EDUASS LOAN: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_eduass"></input></td>
		<td><label>PLREG: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plreg"></input></td>
	</tr>
	<tr>
		<td><label>PLOPT: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_plopt"></input></td>
		<td><label>OPT.LIFE: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_opt"></input></td>
		<td><label>REL: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_rel"></input></td>
		<td><label>PHIL-AM: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_philam"></input></td>
		
	</tr>
	<tr>
		<td><label>CAREMCO (Cap Share): </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremco"></input></td>
		<td><label>CAREMCO LOAN (E/R): </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoln"></input></td>
		<td><label>CAREMCO (CANTEEN): </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_caremcoctn"></input></td>
		<td><label>CAREA: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_carea"></input></td>
		
	</tr>
	<tr>
		<td><label>DISALLOWANCE/LWOP: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_all"></input></td>
		
	</tr>
	</table>
	<table class="input">
	<br>
	<tr>
		<th colspan="8">Government Shares</th>
	</tr>
	<tr>
		<td><label>GSIS: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_gs"></input></td>
		<td><label>ECC: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_ecc"></input></td>
		<td><label>HDMF CONT GS: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_hcg"></input></td>
		<td><label>PHIC GS: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_pg"></input></td>
	</tr>
	<!--
	<tr>
		<td><label>Total Deduction: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_total"></input></td>
		<td><label>1-15: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_1"></input></td>
		<td><label>16-31: </label></td>
		<td><input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_16"></input></td>
	</tr>
	-->
	</table>
	<table class="input">
	<tr>
		<td colspan="1"><input type="submit" value="► ► ► Submit" class="enterbtn"></input></td>
	</tr>
	</table>
	</table>
</table>

</form>