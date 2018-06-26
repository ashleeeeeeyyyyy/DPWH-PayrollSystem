<!DOCTYPE html>
<html>
<head>
	<!--
	<a href="trials.php">Trials</a>
	-->
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
<div id="inner_main">
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
<div class="container">
    <br>
    
    <br>
    <div class="panel panel-default">
    <!--
        <div class="panel-heading">
            Members list
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Members</a>
        </div>

    -->
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
                    <td></td>
                    <td><input style="height: 20px;" type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT"></input></td>
                </tr>
            </table>
           
            </form>
            <br>
            <br>
            <?php if(!empty($statusMsg)){
                echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
                
            } ?>
            <br>
            <?php

            ?>
        </div>
    </div>
</div>

	
</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>