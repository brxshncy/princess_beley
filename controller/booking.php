<?php
require('db.php');

if(isset($_POST['confirm'])){
	$e_id = $_POST['e_id'];
	$bf = $_POST['bf'];
	$reason = $_POST['reason'];
	$date_borrow = $_POST['date_borrow'];
	$date_return = $_POST['date_return'];
}