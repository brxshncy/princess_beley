<?php
require('db.php');

if(isset($_POST['submit'])){
	$username = mysqli_escape_string($conn,$_POST['username']);
	$password = mysqli_escape_string($conn,$_POST['password']);
	$user_type = $_POST['user_type'];

	if($user_type == 'Admin'){
		$select = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
		$qry = $conn->query($select) or trigger_error(mysqli_error($conn)." ".$select);

		if(mysqli_num_rows($qry) == 1){
			header("location:../dashboard.php");
		}
		else{
			session_start();
			$_SESSION['err'] = "Invalid admin log in credentials";
			header("location:../index.php");
		}
	}
	else if($user_type == 'Staff'){
		$staff = "SELECT * FROM staff where username = '$username' AND  password='$password'";
		$qry_1 = $conn->query($staff) or trigger_error(miysqli_error($conn)." ".$staff);

		if(mysqli_num_rows($qry_1) == 1){
		
			header("location:../staff_dashboard.php");
		}
		else{
			session_start();
			$_SESSION['err'] = "Invalid staff log in credentials";
			header("location:../index.php");
		}
	}
	else if($user_type == 'dc'){
		$dc = "SELECT * FROM district_coordinator WHERE username = '$username' AND password = '$password'";
		$qry_2 = $conn->query($dc) or trigger_error(mysqli_error($conn)." ".$dc);
		

		if(mysqli_num_rows($qry_2) >= 1 ){
				$a= mysqli_fetch_assoc($qry_2);
				if($a['status'] == 0){
					session_start();
					$_SESSION['id'] = $a['id'];
					header("location:../dc_dashboard.php");
				}
				else if($a['status'] == 1){
					session_start();
					$_SESSION['err'] = "Sorry this account has been deactivated";
					header("location:../index.php");
				}
		}
		else{
			session_start();
					$_SESSION['err'] = "Invalid District Coordinator log in credentials";
					header("location:../index.php");
		}
	}

	
	
}
?>