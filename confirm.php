<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$postData = file_get_contents('php://input');

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
	
