<!DOCTYPE html>
<html>
<head>
	<title>DPWH-CAR</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: php/portal.php');
		# code...
	}

?>
<body>
<h2>Payroll Slip System</h2>
	<div id = "login_body">
		<form id="login" action="php/login.php" method="post">
			<table id="login_form">
				<tr>
					<td><label for="log_username">Username</label></td>
					<td><input type="text" name="uname" /><br></td>
				</tr>
				<tr>
					<td><label for="log_password">Password</label></td>
					<td><input type="password" name="pword" /><br></td>
				</tr>
				<tr>
					<td></td>
					<td><input id="login_btn" type="submit" value="Login" /></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>