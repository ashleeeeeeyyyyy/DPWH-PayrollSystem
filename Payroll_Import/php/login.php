<?php
	session_start();
		include 'dbconn.php';
		$username = $_POST['uname'];
		$password = $_POST['pword'];
		$query = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . $password.'";';
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_array($result); 
	        
	        $_SESSION['username'] = $row['username'];
	        $_SESSION['password'] = $row['password'];
			//$_SESSION['scope'] = $row['scope'];
	        //$_SESSION['logged'] = TRUE;
	        //$_SESSION['id'] = $row['iduser'];
	        //$_SESSION['full_name'] = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
	        //$_SESSION['title'] = 'RAUT'. $row['scope'];
	        header("Location: import_form.php");
		}else{
			echo "<script>alert('Invalid Credentials! Please Enter Again.');window.location.href='../';</script>";
			exit();
			header("Location: ../");
		}
		mysqli_close($conn);
?>