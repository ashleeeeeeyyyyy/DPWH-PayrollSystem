<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Checklist</title>
		<link rel="stylesheet" href="../../CSS/style1.css">
        <link rel="stylesheet" href="../../CSS/font.css">
	</head>

	<body>
		<nav class="navbar navbar-expand-sm navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="Navbar">
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="import_form.php">UPLOAD CSV FILE</a></li>
                        <li><a href="delete_monthly.php">DELETE MONTHLY ENTRY</a></li>
                        <li><a href="checklist.php">CHECKLIST</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
		</nav>

		<h2 style="text-align: center;">View Checklist</h2><hr>

		<div class="container-fluid">
			<div class="row">
				<form id="Home" action="checklist_exec.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="margin-left:42%;">
								<h3 style="text-align: center;">Input Year</h3>
								<input type="text" class="form-control" maxlength = "4" name="year" placeholder="INPUT YEAR HERE"><br>
							</div>

							<div class="col-md-6" style="margin-left:47%;">
								<button type="submit" class="btn btn-primary" name="submit" value="Go">Search</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>