<?php
require('db.php');

if(isset($_POST['submit'])){
	$commodity = $_POST['commodity'];

	foreach($commodity as $comm){
		$com = "INSERT INTO commodity (commodity_name) VALUES ('$comm')";
		$qry = $conn->query($com) or trigger_error(mysqli_error($conn)." ".$com);
	}
	if($qry){
		session_start();
		$_SESSION['add'] = "Added successfully";
		header("location:../commodity.php");
		exit();
	}
}