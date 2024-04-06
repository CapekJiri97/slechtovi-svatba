<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$postData = file_get_contents('php://input');

	// anti XSS protection
	$postData = htmlspecialchars($postData, ENT_QUOTES, "UTF-8");

	$date = date("Y-m-d G:i:s");
	$inc_ip_address = $_SERVER['REMOTE_ADDR'];

	$postData = $postData . ";" . $date . ";" . $inc_ip_address;

	$filename = "data.txt";
	
	$file = fopen($filename, 'a');

	if($file){
		fwrite($file, $postData.PHP_EOL);
		fclose($file);
	}
	else{
		http_response_code(500);
	}
}
else{
	http_response_code(405);
}
	
