<?php
require('db.php');

if(isset($_POST['accept'])){
		$t_id = $_POST['t_id'];
		$e_id = $_POST['e_id'];
 $s = "UPDATE transaction  SET state = 1 where id ='$t_id'";
 $qry = $conn->query($s) or trigger_error(mysqli_error($conn)." ".$s);
 if($qry){
 	$g  = "UPDATE equipment SET availability = 1 WHERE id ='$e_id'";
 	$qry_1 = $conn->query($g) or trigger_error(mysqli_error($conn)." ".$g);
 	if($qry_1){
 		session_start();
 		$_SESSION['add'] = "Request Accepted";
 		header("location:../equipment_req.php");
 	}
 	else{
 		echo "errors";
 	}
 }
 else{
 	echo "err";
 }
}