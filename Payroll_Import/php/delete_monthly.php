<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Monthly Entry</title>
		<link rel="stylesheet" href="../../CSS/style1.css">
		<link rel="stylesheet" href="../../CSS/font.css">
	</head>
	
	<body>
        <nav class="navbar navbar-inverse">
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

		<h2 style="text-align:center;">Delete Monthly</h2><hr>

		<table class="import">
            <div class="container-fluid">
                <div class="row">
					<form id="Home" action="delete_monthly_confirm.php" method="post">
                        <div class="col-md-12">
                            <div class="col-md-2" style="margin-left:42%;">
                                <h3 style="text-align:center;">Select Month</h3>
                                <select class="form-control" name="month">
                                    <option>---------------------------------------------------------</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>

                                <h3 style="text-align:center;">Input Year</h3>
                                <input type="text" class="form-control" name="year" placeholder="Input here"><br>
                            </div>
                                
                            <div class="col-md-6" style="margin-left:47%;">
                                <button type="submit" class="btn btn-primary" name="importSubmit" value="Go">Select</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </table>
    </body>
</html>