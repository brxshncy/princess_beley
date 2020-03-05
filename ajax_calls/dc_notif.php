<?php
require('../controller/db.php');

if(isset($_POST['i'])){

	$u = "UPDATE transaction SET dc_notif = 1 ";
	$qry = $conn->query($u) or trigger_error(mysqli_error($conn)." ".$u);
	if($qry){
		echo "yes";
	}
}