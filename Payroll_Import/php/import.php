<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Payroll Import</title>
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

        <?php
            //load the database configuration file
            error_reporting(0);
            $count = $_GET['count'];
            $month = $_GET['month'];
            $year = $_GET['year'];
            if(!empty($_GET['status'])){
                switch($_GET['status']){
                    case 'succ':
                        $statusMsgClass = 'alert-success';
                        $statusMsg = "<h3>Records has been inserted successfully.</h3><br>;
                                    <h3>".$count." Entries has been added for the month of ".$month." year ".$year."</h3>";
                        break;
                    case 'err':
                        $statusMsgClass = 'alert-danger';
                        $statusMsg = '<h3>Some problem occurred, please try again.</h3>';
                        break;
                    case 'invalid_file':
                        $statusMsgClass = 'alert-danger';
                        $statusMsg = '<h3>Please upload a valid CSV file.</h3>';
                        break;
                    case 'existing_file':
                        $statusMsgClass = 'alert-danger';
                        $statusMsg = '<h3>File already Exist.</h3>';
                        break;
                    case 'exist':
                        $statusMsgClass = 'alert-danger';
                        $statusMsg = '<h3>File already in Database.</h3>';
                        break;
                    default:
                        $statusMsgClass = '';
                        $statusMsg = '';
                }
            }
        ?>
    
        <?php if(!empty($statusMsg)){
            echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
        }
        ?>
    </body>
</html>