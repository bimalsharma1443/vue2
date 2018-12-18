<?php 

$message =array();
$request_body = file_get_contents('php://input');
$_POST = (array) json_decode($request_body);

if(!isset($_POST['name']) || empty($_POST['name'])) {
	$message['name'] = "please enter name";
}


if(!isset($_POST['age']) || empty($_POST['age'])) {
	$message['age'] = "please enter age";
}

if(!empty($message)) {
	http_response_code(423);
	echo json_encode($message);
	die;
}else {
	echo json_encode($_POST);
	die;
}