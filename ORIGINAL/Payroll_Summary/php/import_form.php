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

	
</div>
</div>

<?php
	include 'universal_footer.php';
	mysqli_close($conn);
?>
</body>
</html>