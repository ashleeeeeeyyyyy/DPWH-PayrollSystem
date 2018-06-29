<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
    <head>

        <title></title>
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
                        <li><a href="portal.php">UPLOAD CSV FILE</a></li>
                            <li><a href="portal.php">DELETE MONTHLY ENTRY</a></li>
                            <li><a href="portal.php">CHECKLIST</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

    <div class="container">
        <br>
        
        <br>
        <div class="panel panel-default">
        <h3>Upload CSV File</h3>
        <br>
            <div class="panel-body">
                <form action="import_exec.php" method="post" enctype="multipart/form-data" id="importFrm">
                <table class="import">
                    <tr>
                        <td colspan="2"><input style="height: 20px;" type="file" name="file" /></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Select Month: </label>
                        </td>
                        <td>
                            <select name="month">
                                <option>----------</option>
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
                        </td>
                    </tr>
                    <tr>
                        <td><label>Input Year: </label></td>
                        <td><input type="text" name="year"></input></td>
                    </tr>
                    <tr>
                        <td></label></td>
                        <td><input style="height: 20px;" type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT"></input></td>
                    </tr>
                </table>
            
                </form>
                <br>
                <br>
            
            </div>
        </div>
    </div>
    </body>
</html>