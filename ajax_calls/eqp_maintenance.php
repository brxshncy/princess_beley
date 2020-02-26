<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$eqp = "SELECT * FROM equipment WHERE id ='$id'";
	$qry = $conn->query($eqp) or trigger_error(mysqli_error($conn)." ".$eqp);
	$a = mysqli_fetch_assoc($qry);

	echo json_encode($a);
}