<?php
require('db.php');
if(isset($_POST['submit'])){
	$benefeciaries = $_POST['benefeciaries'];
	$specific_area  = $_POST['specific_area'];
	$dc_id = $_POST['dc_id'];

	$ins = "INSERT INTO benefeciaries (benefeciaries,specific_area,dc_id) VALUES ('$benefeciaries','$specific_area','$dc_id')";
	$qry = $conn->query($ins) or trigger_error(mysqli_error($conn)." ".$ins);

	if($qry){
		session_start();
		$_SESSION['add'] = "Beneficiaries saved";
		header("location:../beneficiaries.php");
	}
	else{
		echo "error";
	}
}