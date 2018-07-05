<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: php/import_form.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DPWH-CAR Payroll Import</title>
		<?php
			include '../Includes/login_link.php';
		?>
	</head>

	<body>
		<div class="row">
			<div class="col s12 m4 offset-m4">
				<div class="card">	
					<form class="login" action="php/login.php" method="post">
						<div class="card-action blue white-text center-align">
							<img src="../IMAGES/logo.png">
							<h2>
								DPWH<br>	
								Payroll Import</h2>
						</div>

						<div class="card-content">
							<div class="form-field">
								<label for="log_username">Username</label>
								<input type="text" name="uname">
							</div><br>

							<div class="form-field">
								<label for="log_password">Password</label>
								<input type="password" name="pword">
							</div><br>

							<div class="form-field">
								<button class="btn-large waves-effect waves-dark blue" style="width:100%;" id="login_btn">Login</button>
							</div><br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>