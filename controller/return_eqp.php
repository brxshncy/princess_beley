<?php

require('db.php');

if(isset($_POST['confirm'])){
	$t_id = $_POST['t_id'];

	$ins = "INSERT INTO return_equipment (transaction_id,date_return) VALUES ('$t_id',CURDATE())";
	$qry = $conn->query($ins) or trigger_error(mysqli_error($conn)." ".$ins);

	if($qry){
		session_start();
		$_SESSION['update'] = "Recorded successfully";
		header("location:../equipment_status.php");
	}
}