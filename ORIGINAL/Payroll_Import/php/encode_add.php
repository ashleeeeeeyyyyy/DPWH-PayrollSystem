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
	$id = $_GET['id'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	$pera = $_POST['tb_pera'];
	$msalary = $_POST['tb_msalary'];
	//$gae = $_POST['tb_gae'];
	$taxwh = $_POST['tb_taxwh'];
    $gsis = $_POST['tb_gsis'];
    $phic = $_POST['tb_phic'];
    $hdmf = $_POST['tb_hdmf'];
    $hdmfmp2 = $_POST['tb_hdmfmp2'];
    $hdmfcal = $_POST['tb_hdmfcal'];
    $hdmfloan = $_POST['tb_hdmfloan'];
    $hdmfhsg = $_POST['tb_hdmfhsg'];
    $cons = $_POST['tb_cons'];
    $emr = $_POST['tb_emr'];
    $eduass = $_POST['tb_eduass'];
    $plreg = $_POST['tb_plreg'];
    $plopt = $_POST['tb_plopt'];
    $opt = $_POST['tb_opt'];
    $rel = $_POST['tb_rel'];
    $philam = $_POST['tb_philam'];
    $caremco = $_POST['tb_caremco'];
    $caremcoln = $_POST['tb_caremcoln'];
    $caremcoctn = $_POST['tb_caremcoctn'];
    $carea = $_POST['tb_carea'];
    $all = $_POST['tb_all'];
    $gs = $_POST['tb_gs'];
    $ecc = $_POST['tb_ecc'];
    $hcg = $_POST['tb_hcg'];
    $pg = $_POST['tb_pg'];
    $m_num;
    //$total = $_POST['tb_total'];
    //$tb1 = $_POST['tb_1'];
    //$tb16 = $_POST['tb_16'];


	$result2 = $conn->query("SELECT * FROM payroll_data WHERE id ='".$id."' AND month = '".$month."' AND year = '".$year."'");
	

	if ($result2->num_rows == 1) {

		echo "<h3>Entry already exists</h3>";
		echo "<h3><a href='encode.php?id='".$id."'>Go Back</a></h3>";

	}else{

    if ($month == 'January') {
    	# code...
    	$m_num = 1;
    }elseif ($month == 'February') {
    	# code...
    	$m_num = 2;
    }elseif ($month == 'March') {
    	# code...
    	$m_num = 3;
    }elseif ($month == 'April') {
    	# code...
    	$m_num = 4;
    }elseif ($month == 'May') {
    	# code...
    	$m_num = 5;
    }elseif ($month == 'June') {
    	# code...
    	$m_num = 6;
    }elseif ($month == 'July') {
    	# code...
    	$m_num = 7;
    }elseif ($month == 'August') {
    	# code...
    	$m_num = 8;
    }elseif ($month == 'September') {
    	# code...
    	$m_num = 9;
    }elseif ($month == 'October') {
    	# code...
    	$m_num = 10;
    }elseif ($month == 'November') {
    	# code...
    	$m_num = 11;
    }elseif ($month == 'December') {
    	# code...
    	$m_num = 12;
    }




    $var1 = str_replace(',',"", str_replace('₱',"", $id));
	$var2 = str_replace(',',"", str_replace('₱',"", $month));
	$var3 = str_replace(',',"", str_replace('₱',"", $year));
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
	$var27 = str_replace(',',"", str_replace('₱',"", $carea));
	$var26 = str_replace(',',"", str_replace('₱',"", $all));
	$var28 = str_replace(',',"", str_replace('₱',"", $gs));
	$var29 = str_replace(',',"", str_replace('₱',"", $ecc));
	$var30 = str_replace(',',"", str_replace('₱',"", $hcg));
	$var31 = str_replace(',',"", str_replace('₱',"", $pg));
	//$var27 = str_replace(',',"", str_replace('₱',"", $total));
	//$var28 = str_replace(',',"", str_replace('₱',"", $tb1));
	//$var29 = str_replace(',',"", str_replace('₱',"", $tb16));

	$comp =  $var4 + $var5;
	$deduct = $var7 + $var8 + $var9 + $var10 + $var11 + $var12 + $var13 + $var14 + $var15 + $var16
				 + $var17 + $var18 + $var19 + $var20 + $var21 + $var22 + $var23 + $var24 + $var25 + $var26 + $var27;

	$income = $comp - $deduct;
	$cutoff = $comp / '2';
	//echo "Total Compensation: " .$comp;
	//echo "<br>";
	////echo "Total Deduction: " .$deduct;
	//echo "<br>";
	//echo "Total Income: " .$income;

	//"'.str_replace(',',"", str_replace('₱',"", $gae)).'",
	$query2 = 'insert into payroll_data
				(id,month,year,pera,monthly_salary,
					gross_amount_earned,taxwh,gsis_cont,phic_cont,hdmf_cont,
					hdmf_mp,hdmf_cal,hdmf_loan,hdmf_hsg,cons,
					emr,eduass_loan,plreg,plopt,opt_life,
					rel,philam,caremco_cap,caremco_loan,caremco_canteen, carea,
					allowance,total_deduct,first_q,month_num,gsis,ecc,hdmf_cont_gs,
					phic_gs,cutofffirst,cutoffsecond)
				values ("'.str_replace(',',"", str_replace('₱',"", $id)).'",
						"'.str_replace(',',"", str_replace('₱',"", $month)).'",
						"'.str_replace(',',"", str_replace('₱',"", $year)).'",
						"'.str_replace(',',"", str_replace('₱',"", $pera)).'",
						"'.str_replace(',',"", str_replace('₱',"", $msalary)).'",
						"'.$comp.'",
						"'.str_replace(',',"", str_replace('₱',"", $taxwh)).'",
						"'.str_replace(',',"", str_replace('₱',"", $gsis)).'",
						"'.str_replace(',',"", str_replace('₱',"", $phic)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hdmf)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hdmfmp2)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hdmfcal)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hdmfloan)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hdmfhsg)).'",
						"'.str_replace(',',"", str_replace('₱',"", $cons)).'",
						"'.str_replace(',',"", str_replace('₱',"", $emr)).'",
						"'.str_replace(',',"", str_replace('₱',"", $eduass)).'",
						"'.str_replace(',',"", str_replace('₱',"", $plreg)).'",
						"'.str_replace(',',"", str_replace('₱',"", $plopt)).'",
						"'.str_replace(',',"", str_replace('₱',"", $opt)).'",
						"'.str_replace(',',"", str_replace('₱',"", $rel)).'",
						"'.str_replace(',',"", str_replace('₱',"", $philam)).'",
						"'.str_replace(',',"", str_replace('₱',"", $caremco)).'",
						"'.str_replace(',',"", str_replace('₱',"", $caremcoln)).'",
						"'.str_replace(',',"", str_replace('₱',"", $caremcoctn)).'",
						"'.str_replace(',',"", str_replace('₱',"", $carea)).'",
						"'.str_replace(',',"", str_replace('₱',"", $all)).'",
						"'.$deduct.'",
						"'.$income.'",
						"'.$m_num.'",
						"'.str_replace(',',"", str_replace('₱',"", $gs)).'",
						"'.str_replace(',',"", str_replace('₱',"", $ecc)).'",
						"'.str_replace(',',"", str_replace('₱',"", $hcg)).'",
						"'.str_replace(',',"", str_replace('₱',"", $pg)).'",
						"'.$cutoff.'",
						"'.$cutoff.'");';


	if ($conn->query($query2) === true){
		echo "<h3>New record Created Sucessfully</h3>";
		echo "<h3><a href='encode.php?id=".$id."'>Go Back</a></h3>";
	} else {
		echo "Error: " .$sql. "<br>" .$conn->error;
	}

	}

	    

?>


</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>

</html>