<?php
require('db.php');

if(isset($_POST['submit'])){
	$eqp_id = $_POST['eq'];
	$bfcry_id = $_POST['bf'];
	$area_id = $_POST['area_id'];
	$date_borrowed = $_POST['db'];
	$date_return = $_POST['dr'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
	$dc_id = $_POST['dc_id'];

	$ins = "INSERT INTO transaction (eqp_id,bfcry_id,dc_id,reason,date_borrowed,date_return,status,state) VALUES ('$eqp_id','$bfcry_id','$dc_id','$reason','$date_borrowed','$date_return','$status',0)";
	$qry = $conn->query($ins) or trigger_error(mysqli_error($conn)." ".$ins);

	if($qry){
		session_start();
		$_SESSION['add'] = "Request sent successfully!";
		header("location:../equipment_trans.php");

	}
	else{
		echo "error";
	}

}