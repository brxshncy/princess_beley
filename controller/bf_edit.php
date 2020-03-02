<?php
require('db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$gc = $_POST['gc'];
	$area = $_POST['area'];


	$uy = "UPDATE benefeciaries SET 
	benefeciaries = '$gc',
	specific_area = '$area'
	WHERE id = '$id'
	";
	$qry = $conn->query($uy) or trigger_error(mysqli_error($conn)." ".$uy);
	if($qry){
		session_start();
		$_SESSION['add'] = "Updated successfully";
		header("location:../beneficiaries.php");
	}
	else{
		echo "error";
	}
}

?>