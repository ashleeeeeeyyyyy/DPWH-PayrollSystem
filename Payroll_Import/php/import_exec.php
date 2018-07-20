<?php
    include '../../Includes/session_check.php';
    include '../../Includes/dbconn.php';
    include '../../Includes/bootstrap.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Import</title>
        <link rel="stylesheet" href="../../CSS/style2.css">
    </head>

    <body>
        <a href="test.php"></a>

        <div id="main">
            <div id="inner_main">
                    <?php
                    //load the database configuration file
                    $month = $_POST['month'];
                    $month_var;
                    $year = $_POST['year'];
                    $count = 0;

                    if ($month == 'January') {
                        # code...
                        $month_var = 1;
                    }elseif ($month == 'February') {
                        # code...
                        $month_var = 2;
                    }elseif ($month == 'March') {
                        # code...
                        $month_var = 3;
                    }elseif ($month == 'April') {
                        # code...
                        $month_var = 4;
                    }elseif ($month == 'May') {
                        # code...
                        $month_var = 5;
                    }elseif ($month == 'June') {
                        # code...
                        $month_var = 6;
                    }elseif ($month == 'July') {
                        # code...
                        $month_var = 7;
                    }elseif ($month == 'August') {
                        # code...
                        $month_var = 8;
                    }elseif ($month == 'September') {
                        # code...
                        $month_var = 9;
                    }elseif ($month == 'October') {
                        # code...
                        $month_var = 10;
                    }elseif ($month == 'November') {
                        # code...
                        $month_var = 11;
                    }elseif ($month == 'December') {
                        # code...
                        $month_var = 12;
                    }

                    if ($month == '----------' || $year == '') {
                        # code...
                        echo "Error";
                    }else{
                    $result = $conn->query("SELECT * FROM payroll_data WHERE month_num = ".$month_var." AND year = '".$year."'");
                    if ($result->num_rows > 0) {
                        # code...
                        echo "in database";
                        $qstring = '?status=exist';
                    }else{
                    if(isset($_POST['importSubmit'])){
                        
                        //validate whether uploaded file is a csv file
                        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                                
                                //open uploaded csv file with read only mode
                                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                                
                                //skip first line
                                fgetcsv($csvFile);
                                
                                //parse data from csv file line by line
                                while(($line = fgetcsv($csvFile)) !== FALSE){
                                    //check whether member already exists in database with same email
                                // $prevQuery = "SELECT month_num, year FROM payroll_data WHERE id = '".$line[0]."'";
                                    //$prevResult = $conn->query($prevQuery);
                                    //if($prevResult->num_rows > 0){
                                        //update member data
                                        //$db->query("UPDATE members SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
                                    // $qstring = '?status=existing_file';
                                //  }else{
                                        //insert member data into database
                                        //$db->query("INSERT INTO members (id, name, email, phone, created, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."')");

                                        

                                        //echo "Total Compensation: " .$comp;
                                        //echo "<br>";
                                        ////echo "Total Deduction: " .$deduct;
                                        //echo "<br>";
                                        //echo "Total Income: " .$income;

                                        //"'.str_replace(',',"", str_replace('₱',"", $gae)).'",
                                        $conn->query("insert into payroll_data
                                                    (id,month,month_num,year,pera,monthly_salary,
                                                        gross_amount_earned,taxwh,gsis_cont,phic_cont,hdmf_cont,
                                                        hdmf_mp,hdmf_cal,hdmf_loan,hdmf_hsg,cons,
                                                        emr,eduass_loan,plreg,plopt,opt_life,
                                                        rel,philam,caremco_cap,caremco_loan,caremco_canteen, carea,
                                                        allowance,total_deduct,cutofffirst,cutoffsecond,first_q,ecc,gsis,hdmf_cont_gs,phic_gs)
                                                    values ('".$line[3]."',
                                                            '".$month."',
                                                            '".$month_var."',
                                                            '".$year."',
                                                            '".$line[4]."',
                                                            '".$line[5]."',
                                                            '".$line[6]."',
                                                            '".$line[7]."',
                                                            '".$line[8]."',
                                                            '".$line[9]."',
                                                            '".$line[10]."',
                                                            '".$line[11]."',
                                                            '".$line[12]."',
                                                            '".$line[13]."',
                                                            '".$line[14]."',
                                                            '".$line[15]."',
                                                            '".$line[16]."',
                                                            '".$line[17]."',
                                                            '".$line[18]."',
                                                            '".$line[19]."',
                                                            '".$line[20]."',
                                                            '".$line[21]."',
                                                            '".$line[22]."',
                                                            '".$line[23]."',
                                                            '".$line[24]."',
                                                            '".$line[25]."',
                                                            '".$line[26]."',
                                                            '".$line[27]."',
                                                            '".$line[28]."',
                                                            '".$line[29]."',
                                                            '".$line[30]."',
                                                            '".$line[31]."',
                                                            '".$line[32]."',
                                                            '".$line[33]."',
                                                            '".$line[34]."',
                                                            '".$line[35]."')");
                                        $count = $count + 1;
                                // }
                                }
                                
                                //close opened csv file
                                fclose($csvFile);

                                $qstring = '?status=succ&count='.$count.'&month='.$month.'&year='.$year;
                            }else{
                                $qstring = '?status=err';
                            }
                        }else{
                            $qstring = '?status=invalid_file';
                        }
                    }
                    }
                    }
                    //redirect to the listing page
                    header("Location: import.php".$qstring);
                ?>
            </div>
        </div>
    </body>
</html>