
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
		$var0 = $_POST['tb_trial'];
		$var = '123,123';
		echo str_replace(',',"", str_replace('₱',"", $var0));
	?>

</div>
</body>
<script type="text/javascript">

	
</script>
</html>