<?php
require('../controller/db.php');
$res = array();
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$update = "SELECT * FROM equipment WHERE id ='$id'";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
	$a = mysqli_fetch_assoc($qry);

	echo json_encode($a);

}