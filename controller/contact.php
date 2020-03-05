<?php
include('../vendor/autoload.php');

if(isset($_POST['send'])){
	$contact = $_POST['contact'];
	$message = $_POST['message'];

	$sid = 'AC58b20e49ce2d452c9f5d59904f82feba';
	$token = '2d0c34bbe084a213a871be18ee8cef13';

	$client = new Twilio\Rest\Client($sid,$token);
	$m = $client->message->create(
		$contact,array(
			'from' => '+89524572',
			'body' => $message
		)
	);
	if($m->sid){
		echo "message sent";
	}
	else{
		echo "error";
	}
}
?>