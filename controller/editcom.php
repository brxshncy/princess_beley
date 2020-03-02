<?php
require('db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$c=  $_POST['c'];
	$a = "UPDATE commodity SET commodity_name = '$c' WHERE id ='$id'";
	$q = $conn->query($a) or trigger_error(mysqli_error($conn)." ".$a);

	if($q){
		session_start();
		$_SESSION['add'] = "Updated successfully!";
		header("Location:../commodity.php");
	}
}