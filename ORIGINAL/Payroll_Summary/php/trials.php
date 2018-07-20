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

<form action = "convert.php" method="post">
		<input type="text" onBlur="this.value=formatCurrency(this.value)" name="tb_trial"></input>
		<input type="submit"></input>
</form>



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