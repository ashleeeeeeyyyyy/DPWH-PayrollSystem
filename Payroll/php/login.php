<?php
	session_start();
		include '../../Includes/dbconn.php';
		$username = $_POST['uname'];
		$password = $_POST['pword'];
		$query = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . $password.'";';
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_array($result); 
	        
	        $_SESSION['username'] = $row['username'];
	        $_SESSION['password'] = $row['password'];
	        header("Location: portal.php");
		}else{
			echo "<script>alert('Invalid Credentials! Please Enter Again.');window.location.href='../';</script>";
			exit();
			header("Location: ../");
		}
		mysqli_close($conn);
?>